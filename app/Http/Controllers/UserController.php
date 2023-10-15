<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()) {
            return view('users.create');
        } else {
            return redirect()->to('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return view("users.message", ['msg' => "Se Ha Modificado Un Nuevo Usuario."]);
            //return redirect()->to('/users')->with('success', 'Se ha actualizado un Nuevo usuario.');
            //return redirect()->to('/')->with('success', 'Se ha registrado un Nuevo Alumno.');
        } else {
            return redirect()->to('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()) {
            $user = User::find($id);
            return view('users.edit', compact('user'));
        } else {
            return redirect()->to('/');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,' . $id,
            ]);

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return view("users.message", ['msg' => "Se Ha Modificado Un Usuario."]);
            //return redirect()->to('/users')->with('success', 'Se ha actualizado el usuario.');
            //return redirect()->to('/')->with('success', 'Se ha modificado los datos del alumno.');
        } else {
            return redirect()->to('/');
        }
    }

    public function cambiarContrasena($id)
    {
        $user = User::findOrFail($id);
        return view('user.cambiar_contrasena', compact('user'));
    }

    public function actualizarContrasena(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:5|confirmed',
        ]);

        $user = User::findOrFail($id);

        // Actualizar la contraseña del usuario con la nueva contraseña
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('usuarios.show', $user->id)
            ->with('success', 'Contraseña del usuario ' . $user->name . ' actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()) {
            $user = User::find($id);
            $user->delete();

            return view("users.message", ['msg' => "Se Ha Eliminado Un Usuario."]);
            //return redirect()->to('/users')->with('success', 'Se ha eliminado un usuario.');
            //return redirect()->to('/')->with('success', 'Se ha eliminado los datos del alumno.');
        } else {
            return redirect()->to('/');
        }
    }
}
