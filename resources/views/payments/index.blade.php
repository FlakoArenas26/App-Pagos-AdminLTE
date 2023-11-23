@extends('layouts.app')


@section('content')
    <div class="alert my-3">
        @if (session('success'))
            <div id="successAlert" class="container mt-3">
                <div class="alert alert-success col-6 mx-auto text-center alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('successAlert').style.display = 'none';
                }, 5000); // Oculta la alerta después de 5 segundos (5000 milisegundos)
            </script>
        @endif

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
    <div class="table-title my-3 py-2">
        <h1 class="text-center">Historial de Pagos</h1>
    </div>
    <div class="row mx-4">
        <div class="col-md-6 my-3 d-flex justify-content-start">
            <a href="{{ route('payments.create') }}" class="btn btn-success">Registrar Nuevo Pago</a>
        </div>
        <div class="col-md-6 my-3 d-flex justify-content-end">
            <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
        </div>
    </div>

    <div class="table-responsive mx-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID de Pago</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Servicio</th>
                    <th class="text-center">Monto</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    @if ($payment->user_id === Auth::id())
                        <!-- Filtrar pagos por el usuario logueado -->
                        <tr>
                            <td class="text-center">{{ $payment->id }}</td>
                            <td class="text-center">{{ $payment->user->name }}</td>
                            <td class="text-center">
                                @foreach ($payment->services as $service)
                                    {{ $service->name }}
                                    @if (!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-center">
                                @foreach ($payment->services as $service)
                                    ${{ number_format($service->amount, 0, ',', '.') }} COP
                                    <!-- Formato de moneda colombiana -->
                                    @if (!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                                <hr> <!-- Línea divisoria entre los montos de servicios y el monto total del pago -->
                                <strong>Total Pago:</strong>
                                ${{ number_format($payment->services->sum('amount'), 0, ',', '.') }} COP
                            </td>
                            <td class="text-center">{{ $payment->date }}</td>
                            <td class="text-center">
                                <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info">Ver Detalles</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
