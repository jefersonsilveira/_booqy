<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\ClientException;
use Symfony\Component\DomCrawler\Crawler;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;

class BookmarkController extends Controller
{
    public function index(Request $request, $uuid)
    {
        $data = Session::all();
        
        $category = new Category;
        $user = User::find($data['user']['id']);
        $category = Category::where('uuid', $uuid)->first();
        
        if($category === null){
            return redirect()->back()->with('error', 'Categoria não encontrada');
        }

        $categories = $user->categories;
        $bookmarks = Bookmark::where('category_id', $category->id)->get();

        return Inertia::render('Bookmark', [
            'user' => $data['user'],
            'categories' => $categories,
            'category' => $category,
            'bookmarks' => $bookmarks
        ]);

    }

    public function store(Request $request)
    {
        $isChecked = $request->input('isChecked');
        // dd(!$request->filled('name'));
        $rules = [
            'link' => 'required|url|max:255',
            'name' => 'required|max:255',
        ];

        $messages = [
            'link.required' => 'O campo link é obrigatório.',
            'link.url' => 'Envie um formato de link válido.',
            'link.max' => 'O campo link deve possuir no máximo 255 caracteres.',
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O campo nome deve possuir no máximo 255 caracteres.',
        ];

        if ($isChecked) {
            $rules['name'] = 'nullable|max:255';
        }

        $request->validate($rules, $messages);

        $categoryId = Category::where('uuid', $request->uuid_category)->value('id');

        $bookmark = new Bookmark;

        $url = $request->link;
        $siteName = "";
        $description = "";
        $statusCode = 200;
        $message = 'OK';

        $validator = Validator::make($request->all(), $rules, $messages);

// dd($isChecked.'-'.!$request->filled('name'));
        if($isChecked && !$request->filled('name')){
            try {
                $client = new Client();
                $response = $client->get($url);
                $html = $response->getBody()->getContents();
                $crawler = new Crawler($html);
                
                if ($crawler->filter('title')->count() > 0) {
                    $siteName = $crawler->filter('title')->text();
                } elseif ($crawler->filter('meta[property="og:site_name"]')->count() > 0) {
                        $siteName = $crawler->filter('meta[property="og:site_name"]')->attr('content');
                } else {
                    $siteName = '';
                }

                if ($crawler->filter('meta[property="og:description"]')->count() > 0) {
                    $description = $crawler->filter('meta[property="og:description"]')->attr('content');
                } elseif ($crawler->filter('meta[name="description"]')->count() > 0) {
                    $description = $crawler->filter('meta[name="description"]')->attr('content');
                } else {
                    $description = '';
                }
                $statusCode = $response->getStatusCode();
                $message = $response->getReasonPhrase();
                
            } catch (RequestException $e) {
                //echo "Ocorreu um erro durante a solicitação HTTP: " . $e->getMessage();
                $statusCode = $e->getResponse()->getStatusCode();
                $message = $e->getResponse()->getReasonPhrase();
            }  
            //dd(($statusCode != 200).' - '.$isChecked .' - '. $siteName);
            if (($statusCode != 200 && $isChecked) || ($siteName == "" && !$request->filled('name'))) {
                $validator->sometimes('link', 'required', function ($input) {
                    return $input->statusCode != 200;
                });

                $isChecked = false;

                $validator->after(function ($validator) use ($message) {
                    $validator->errors()->add('name', 'Não foi possível carregar dados deste link. Informe um nome para este favorito.');
                    $validator->errors()->add('notChecked', true);
                    $validator->errors()->add('getLink', true);
                });
            }
        }

        $validator->validate();
        
        $dados = [
            'statusCode' => $statusCode,
            'message' => $message,
            'siteName' => $siteName,
            'description' => $description,
        ];

        $bookmark = $bookmark->create([
                    'uuid' => (string) Str::uuid(),
                    'category_id' => $categoryId,
                    'link' => $request->link,
                    'name' => $isChecked && $dados['siteName'] ? $dados['siteName'] : $request->name,
                    'note' => $isChecked && $dados['description'] ? substr($dados['description'], 0, 255) : substr($request->note, 0, 255),
                ]);
        return redirect()->back()->with('success', 'Favorito criado com sucesso');
        //return redirect()->route('dashboard.list.bookmark')->with('success', 'Favorito criado com sucesso!');
        
    }

    public function getlink_(Request $request)
    {
        $name = 'Jeff';
        $link = 'https://jef.com.br';

        return inertia()->render('Bookmark', [
            'dadosLink' => [
                'name' => $name,
                'link' => $link
            ]
        ]);
    }

    public function getlink__(Request $request)
    {
      
        $url = $request->link;
        $uuid_category = $request->uuid_category;
        
        $siteName = "";
        $description = "";
        $statusCode = 200;
        $message = 'OK';

        try {
            $client = new Client();
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);
            
            if ($crawler->filter('title')->count() > 0) {
                $siteName = $crawler->filter('title')->text();
            } elseif ($crawler->filter('meta[property="og:site_name"]')->count() > 0) {
                    $siteName = $crawler->filter('meta[property="og:site_name"]')->attr('content');
            } else {
                $siteName = 'N/A';
            }

            if ($crawler->filter('meta[property="og:description"]')->count() > 0) {
                $description = $crawler->filter('meta[property="og:description"]')->attr('content');
            } elseif ($crawler->filter('meta[name="description"]')->count() > 0) {
                $description = $crawler->filter('meta[name="description"]')->attr('content');
            } else {
                $description = 'N/A';
            }
            $statusCode = $response->getStatusCode();
            $message = $response->getReasonPhrase();
            
        } catch (RequestException $e) {
            //echo "Ocorreu um erro durante a solicitação HTTP: " . $e->getMessage();
            $statusCode = $e->getResponse()->getStatusCode();
            $message = $e->getResponse()->getReasonPhrase();
        }  

        if ($statusCode != 200) {
            $validator->sometimes('link', 'required', function ($input) {
                return $input->statusCode != 200;
            });
            $isChecked = false;

            $validator->after(function ($validator) use ($message) {
                $validator->errors()->add('name', 'Não foi possível carregar dados do site informado. Informe manualmente.');
            });
        }
               
        $dados = [
            'name' => 'Jeff',
            'link' => 'https://jef.com.br'
        ];
    
        return inertia('Bookmark')->with('dadosLink', $dados);
    }

    public function update(Request $request)
    {
        $request->validate([
            'link' => 'required|url|max:255',
            'name' => 'required|max:255',
        ], [
            'link.required' => 'O campo link é obrigatório.',
            'link.url' => 'Envie um formato de link válido.',
            'link.max' => 'O campo link deve possuir no máximo 255 caracteres.',
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O campo nome deve possuir no máximo 255 caracteres.',
        ]);
        
        try {
            $bookmarkId = Bookmark::where('uuid', $request->uuid_bookmark)->value('id');
            $bookmark = Bookmark::findOrFail($bookmarkId);
            $bookmark->link = $request->input('link');
            $bookmark->name = $request->input('name');
            $bookmark->note = $request->input('note');
            $bookmark->save();
            return redirect()->back()->with('success', 'Favorito atualizada com sucesso');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Favorito não encontrada');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar o Favorito');
        }
    }

    public function asFeatured(Request $request, Bookmark $bookmark)
    {
        $bookmark->featured = $request->input('featured');
        $bookmark->save();

        return redirect()->back()->with('success', 'Bookmark destacado com sucesso!');
    }

    public function delete(Request $request)
    {
        try {
            $uuid = $request->uuid_bookmark;
            $bookmark = Bookmark::where('uuid', $uuid)->firstOrFail();
            $bookmark->delete();
            
            return redirect()->back()->with('success', 'Favorito excluído com sucesso');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Favorito não encontrado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir o Favorito');
        }
    }     
}
