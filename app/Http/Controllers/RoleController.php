<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        // Obtener lista de roles y usuarios
        $roles = Role::all();
        $users = User::all(); // Obtener todos los usuarios

        return view('roles.index', compact('roles', 'users'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all(); // Si necesitas los roles para alguna lógica en la vista

        return view('roles.create-rol', compact('users', 'roles'));
    }

}
