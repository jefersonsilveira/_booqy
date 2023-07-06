<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        if(!Auth::check()) 
        {
            return Inertia::render('Register');
        } 
        else 
        {
            return redirect()->route('dashboard.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'privacyPolicy' => 'accepted'
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O campo e-mail já está cadastrado.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter no mínimo :min caracteres.',
            'password.confirmed' => 'A confirmação de senha não corresponde.',
            'privacyPolicy.accepted' => 'Aceite os Termos e a Política de Privacidade.'
        ]);

        $user = new User;

        $user = $user->create([
                    'uuid' => (string) Str::uuid(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);

        return redirect()->route('login.index')->with('success', 'Usuário criado com sucesso!');
    }
}
