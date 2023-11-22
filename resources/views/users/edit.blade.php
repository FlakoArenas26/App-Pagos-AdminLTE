@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="text-center my-3 py-3">Editar Usuario</h1>
                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                            placeholder="Nombre">
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Email">
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Nueva contraseña">
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirmar contraseña">
                    </div>

                    <h2 class="text-center my-3 py-2">Listado de Roles</h2>
                    @foreach ($roles as $role)
                        <div>
                            <label for="role_{{ $role->id }}">
                                <input type="checkbox" name="roles[]" id="role_{{ $role->id }}"
                                    value="{{ $role->id }}" {{ in_array($role->id, $userRoles) ? 'checked' : '' }}>
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-warning btn-lg">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
