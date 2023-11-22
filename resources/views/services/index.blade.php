@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Lista de Servicios</h1>
                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Nuevo Servicio</a> --}}

                <div class=" my-3">
                    <a href="{{ route('services.create') }}" class="btn btn-success">Nuevo Servicio</a>
                </div>
                <div class=" my-3 text-md-end">
                    <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
                </div>

                <div class="row row-cols-1 row-cols-md-4 mx-4">
                    @foreach ($services as $service)
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-title">
                                    <h5 class="card-title text-center mt-2">{{ $service->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-center">Valor:
                                        {{ number_format($service->amount, 0, ',', '.') }} COP</p>
                                    <div class="text-center">
                                        <a href="{{ route('services.edit', $service) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('services.destroy', $service) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const isConfirmed = confirm('¿Estás seguro de querer eliminar este usuario?');

                if (isConfirmed) {
                    this.closest('.delete-form').submit();
                }
            });
        });
    </script> --}}
@endsection
