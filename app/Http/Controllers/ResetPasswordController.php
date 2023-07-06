<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResetPasswordController extends Controller
{
    public function create(Request $request, $token)
    {
        // Aqui você pode adicionar a lógica para exibir o formulário de redefinição de senha ou processar a redefinição de senha.

        // Exemplo de código para exibir o formulário usando Inertia:
        return Inertia::render('Auth/ResetPassword', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'password' => 'required|min:3|confirmed',
        ],[
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter no mínimo :min caracteres.',
            'password.confirmed' => 'A confirmação de senha não corresponde.',
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password),
                'remember_token' => null,
            ])->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login.index')->with('success', 'Senha redefinida com sucesso. Faça login com sua nova senha.');
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }
    }
}