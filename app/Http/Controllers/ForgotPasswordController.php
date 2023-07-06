<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Inertia\Inertia;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return Inertia::render('Auth/ForgotPassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ],[
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.exists' => 'O email fornecido não está cadastrado.',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->back()->with('success', 'Um e-mail de redefinição de senha foi enviado para o seu endereço de e-mail.');
        } else {
            return redirect()->back()->withErrors(['email' => __($status)]);
        }
    }
}