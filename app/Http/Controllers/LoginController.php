<?php

namespace App\Http\Controllers;

// use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        if(!Auth::check()) 
        {
            return Inertia::render('Login');
        } 
        else 
        {
            return redirect()->route('dashboard.index');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter no mínimo :min caracteres.',
        ]);

        $remember = $request->filled('remember');
        
        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember);

        if (!$auth)
        {
            return redirect()->back()->withErrors(['errors'=>'Dados inválidos.']);
        } else {
            $user = auth()->user();
            session(['user' => $user]);
            //return Inertia::render('dashboard', $data);

            return redirect()->route('dashboard.index');

            //return redirect()->route('dashboard.index', $user)->with('success', 'Usuário criado com sucesso!');
        }

        // dd($auth);

        // $data = [
        //     'message' => 'Olá, mundo!',
        //     'user' => Auth::user(),
        // ];

        // return Inertia::render('dashboard', $data);

        // return redirect()->route('login.index')->withErros(['error' => 'Dados inválidos.']);
        // return redirect()->route('login.index')->with('success', 'Usuário criado com sucesso!');
        
        
    }
}
