@extends('layouts.app')

@section('content')
    <div class="container my-5 py-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center mb-0">Detalles del Pago</h1>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">ID del Pago:</th>
                                    <td class="text-end">{{ $payment->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Usuario:</th>
                                    <td class="text-end">{{ $payment->user->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Servicios:</th>
                                    <td class="text-end">
                                        @foreach ($payment->services as $service)
                                            {{ $service->name }} -
                                            ${{ number_format($service->amount, 0, ',', '.') }} COP<br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Monto Total:</th>
                                    <td class="text-end">
                                        ${{ number_format($payment->services->sum('amount'), 0, ',', '.') }} COP</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fecha:</th>
                                    <td class="text-end">{{ $payment->date }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <div class="button-download-pdf my-3 py-1">
                            <a href="{{ route('payments.download-pdf', $payment->id) }}" target="_blank"
                                class="btn btn-success mb-3">Descargar Recibo en PDF</a>
                        </div>
                    </div>

                </div>
                <div class="button-back my-3 py-1">
                    <a href="{{ route('payments.index') }}" class="btn btn-primary">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection
