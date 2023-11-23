@extends('layouts.app')




@section('content')
    <div class="alert my-3">
        @if (session('danger'))
            <div id="dangerAlert" class="container mt-3">
                <div class="alert alert-danger col-6 mx-auto text-center alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('dangerAlert').style.display = 'none';
                }, 5000); // Oculta la alerta después de 5 segundos (5000 milisegundos)
            </script>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Lista de Usuarios</h1>
                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a> --}}
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="delete-form" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
