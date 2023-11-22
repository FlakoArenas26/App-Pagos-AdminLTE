<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // Mostrar lista de usuarios
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Mostrar el perfil de un usuario
        return view('users.show', compact('user'));
    }

    public function create()
    {
        // Mostrar formulario para crear un nuevo usuario
        return view('auth.register');
    }

    // public function store(Request $request)
    // {
    //     // Validar y almacenar el nuevo usuario en la base de datos
    //     // (Aquí deberías agregar lógica de validación según tus necesidades)
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:8',
    //     ]);

    //     User::create($request->all());

    //     return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    // }
    public function store(Request $request)
    {
        return app(\App\Http\Controllers\Auth\RegisterController::class)->register($request);
    }

    public function edit(User $user)
    {
        // Mostrar formulario para editar un usuario existente
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->has('roles')) {
            $user->roles()->sync($request->input('roles'));
        } else {
            $user->roles()->detach(); // Si no se selecciona ningún rol, eliminar los roles existentes.
        }

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        try {
            // Intentar eliminar los pagos asociados al usuario
            $user->payments()->delete();

            // Intentar eliminar al usuario de la base de datos
            $user->delete();

            return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
        } catch (QueryException $e) {
            // Si hay una excepción, es probable que haya una restricción de clave foránea
            return redirect()->route('users.index')->with('danger', 'No se puede eliminar el usuario. Elimine primero los registros relacionados en la tabla de pagos.');
        }
    }
}
