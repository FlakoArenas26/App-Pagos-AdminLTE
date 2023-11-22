@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Lista de Roles</h1>

                <!-- Botón para crear un nuevo rol -->
                <a href="{{ route('roles.create-rol') }}" class="btn btn-primary mb-3">Crear Nuevo Rol</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí iterarías sobre la lista de roles para mostrarlos -->
                        <!-- Ejemplo de cómo mostrar los roles -->
                        @foreach ($roles as $rol)
                            <tr>
                                <td>{{ $rol->id }}</td>
                                <td>{{ $rol->name }}</td>
                                <td>{{ $users->name }}</td>
                                <td>
                                    <!-- Enlaces para editar, ver y eliminar roles -->
                                    {{-- <a href="{{ route('roles.show', $rol->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('roles.destroy', $rol->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de eliminar este rol?')">Eliminar</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
