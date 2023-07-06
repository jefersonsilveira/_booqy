<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function index()
    {
        $data = Session::all();
        $user = array_key_exists('user', $data) ? $data['user'] : null;
        $status = true;

        return Inertia::render('Index', [
            'user' => $user,
            'status' => $status
        ]);
    }

    // public function show()
    // {
    //     $user = "Jeff!";
    //     dd($user);
    //     return inertia('Index', [
    //         'user' => $user
    //     ]);

    // }


}
