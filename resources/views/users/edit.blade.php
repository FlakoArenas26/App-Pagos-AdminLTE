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

                    <div class="row">
                        <div class="col-12 text-center">
                            <!-- Quitamos el div innecesario -->
                            <button type="submit" class="btn btn-warning btn-lg">Actualizar Usuario</button>
                            <!-- El botón debe estar centrado ahora -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
