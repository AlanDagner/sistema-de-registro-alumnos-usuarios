<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function create()
    {
        //return view('auth.login');
        return response(view('auth.login'))->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o Contraseña es incorrecto, vuelve a intentarlo',
            ]);
        }
        return redirect()->to('/');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
