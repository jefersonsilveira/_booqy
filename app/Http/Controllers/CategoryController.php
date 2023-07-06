<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = Session::all();
        dd($request->name);
        //dd($data['user']->id); 

        //return Inertia::render('Dashboard', $data);
    }

    public function store(Request $request)
    {

        //dd($request->name);
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
        ]);

        $category = new Category;

        $data = Session::all();
        
        $category = $category->create([
                    'uuid' => (string) Str::uuid(),
                    'user_id' => $data['user']->id,
                    'name' => $request->name
                ]);

        //return redirect()->back();
        return redirect()->route('dashboard.index')->with('success', 'Categoria criada com sucesso!');
    }
}
