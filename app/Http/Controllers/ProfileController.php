<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return Inertia::render('Profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ];
        
        if ($request->hasFile('profile_photo')) {
            $rules['profile_photo'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
        }
        
        $messages = [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O campo e-mail já está cadastrado.',
            'profile_photo.image' => 'O campo foto do perfil deve ser uma imagem.',
            'profile_photo.mimes' => 'O campo foto do perfil deve ter o formato JPEG, PNG, JPG ou GIF.',
            'profile_photo.max' => 'O campo foto do perfil não pode ser maior que 2MB.'
        ];
        
        $request->validate($rules, $messages);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->hasFile('profile_photo')) {
            
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $imagePath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $imagePath;
        }

        $user->save();

        // Atualizar os dados da sessão
        $request->session()->put('user', $user);

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required|min:3',
            'password' => 'required|confirmed|min:3',
        ],[
            'current_password.required' => 'O campo senha atual é obrigatório.',
            'current_password.min' => 'O campo senha atual deve ter no mínimo :min caracteres.',
            'password.confirmed' => 'A confirmação de senha não corresponde.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter no mínimo :min caracteres.',
            'password.confirmed' => 'A confirmação de senha não corresponde.',
        ]);

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'A senha atual não corresponde.']);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'Senha atualizada com sucesso!');
    }
}
