<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
// use Illuminate\Http\Redirect;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $data = Session::all();
        
        $category = new Category;
        // $user = User::find($data['user']['id']);

        if (array_key_exists('user', $data)) {
            $user = User::find($data['user']['id']);
        } else {
            Auth::logout();
            return Redirect::route('login.index')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        $categories = $user->categories;

        $categoryIds = Category::where('user_id', $data['user']['id'])->pluck('id')->toArray();
        
        $bookmarks = Bookmark::whereIn('category_id', $categoryIds)->get();

        return Inertia::render('Dashboard', [
            'user' => $data['user'],
            'categories' => $categories,
            'bookmarks' => $bookmarks
        ]);
    }

    public function findCategory($uuid)
    {
        $dadosCategory = Category::where('uuid', $uuid)->first();
        
    }

    public function storeCategory(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'O nome da categoria é obrigatório.',
        ]);
        
        $category = new Category;

        $data = Session::all();
        
        $category = $category->create([
                    'uuid' => (string) Str::uuid(),
                    'user_id' => $data['user']->id,
                    'name' => $request->name
                ]);

        return redirect()->route('dashboard.create.category')->with('success', 'Categoria criada com sucesso!');
        
    }

    // public function storeBookmark(Request $request)
    // {
        
    //     $request->validate([
    //         'link' => 'required|url|max:255',
    //         'name' => 'required|max:255',
    //     ], [
    //         'link.required' => 'O campo link é obrigatório.',
    //         'link.url' => 'Envie um formato de link válido.',
    //         'link.max' => 'O campo link deve possuir no máximo 255 caracteres.',
    //         'name.required' => 'O campo nome é obrigatório.',
    //         'name.max' => 'O campo nome deve possuir no máximo 255 caracteres.',
    //     ]);

    //     $categoryId = Category::where('uuid', $request->uuid_category)->value('id');

    //     $bookmark = new Bookmark;
        
    //     $bookmark = $bookmark->create([
    //                 'uuid' => (string) Str::uuid(),
    //                 'category_id' => $categoryId,
    //                 'link' => $request->link,
    //                 'name' => $request->name,
    //                 'note' => $request->note,
    //             ]);

    //     return redirect()->route('dashboard.index')->with('success', 'Favorito criado com sucesso!');
        
    // }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'O nome da categoria é obrigatório.',
        ]);

        try {
            $categoryId = Category::where('uuid', $request->uuid_category)->value('id');
            $category = Category::findOrFail($categoryId);
            $category->name = $request->input('name');
            $category->save();
            return redirect()->back()->with('success', 'Categoria atualizada com sucesso');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Categoria não encontrada');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar a categoria');
        }
    }

    public function deleteCategory(Request $request)
    {
        try {
            $uuid = $request->uuid_category;
            $category = Category::where('uuid', $uuid)->firstOrFail();
            $category->bookmarks()->delete();
            $category->delete();
            
            return redirect()->back()->with('success', 'Categoria excluída com sucesso');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Categoria não encontrada');
        } catch (\Exception $e) {
            dd('erro');
            return redirect()->back()->with('error', 'Erro ao excluir a categoria');
        }
    }

    // public function updateBookmark(Request $request)
    // {
    //     $request->validate([
    //         'link' => 'required|url|max:255',
    //         'name' => 'required|max:255',
    //     ], [
    //         'link.required' => 'O campo link é obrigatório.',
    //         'link.url' => 'Envie um formato de link válido.',
    //         'link.max' => 'O campo link deve possuir no máximo 255 caracteres.',
    //         'name.required' => 'O campo nome é obrigatório.',
    //         'name.max' => 'O campo nome deve possuir no máximo 255 caracteres.',
    //     ]);
        
    //     try {
    //         $bookmarkId = Bookmark::where('uuid', $request->uuid_bookmark)->value('id');
    //         $bookmark = Bookmark::findOrFail($bookmarkId);
    //         $bookmark->link = $request->input('link');
    //         $bookmark->name = $request->input('name');
    //         $bookmark->note = $request->input('note');
    //         $bookmark->save();
    //         return redirect()->back()->with('success', 'Favorito atualizada com sucesso');
    //     } catch (ModelNotFoundException $e) {
    //         return redirect()->back()->with('error', 'Favorito não encontrada');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Erro ao atualizar o Favorito');
    //     }
    // }

    // public function deleteBookmark(Request $request)
    // {
    //     try {
    //         $uuid = $request->uuid_bookmark;
    //         $bookmark = Bookmark::where('uuid', $uuid)->firstOrFail();
    //         $bookmark->delete();
            
    //         return redirect()->back()->with('success', 'Favorito excluído com sucesso');
    //     } catch (ModelNotFoundException $e) {
    //         return redirect()->back()->with('error', 'Favorito não encontrado');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Erro ao excluir o Favorito');
    //     }
    // }

}
