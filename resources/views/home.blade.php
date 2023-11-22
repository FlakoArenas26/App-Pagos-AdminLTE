@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 my-3">
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert" id="welcomeAlert">
                    <strong>Bienvenido!</strong>
                    @auth
                        <span id="username">{{ Auth::user()->name }}</span>
                    @endauth
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h3>¡Bienvenido a nuestra plataforma de pagos!</h3>
                    <p>Una aplicación que te permite gestionar usuarios, roles y servicios, además de realizar pagos de
                        forma segura y rápida. ¡Crea, administra y controla tus transacciones en un solo lugar!</p>
                    <p>¡Comienza a disfrutar de todas las ventajas que nuestra plataforma tiene para
                        ofrecerte!</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .container-fluid p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        h3 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
@endsection
