<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>App-Pagos</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* Estilos personalizados */
        .container-wrapper {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 5px;
            text-align: center;
        }

        .login-btn {
            background-color: #4caf50;
            color: white;
        }

        .register-btn {
            background-color: #2196f3;
            color: white;
        }

        .container-fluid p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 15px;
            text-align: center;
        }

        h3 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>

</head>

<body class="antialiased">
    <div
        class="relative flex justify-center items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="container-wrapper">
            <div class="container mx-auto px-4">
                <div class="mb-8">
                    <h3 class="text-3xl font-semibold mb-4">¡Bienvenido a nuestra plataforma de pagos!</h3>
                    <p class="text-center mb-4">Gestiona usuarios, roles y servicios, realiza pagos seguros y rápidos.
                    </p>
                    <p class="text-center mb-8">Inicia sesión si ya tienes una cuenta o regístrate para disfrutar de
                        todas
                        las
                        ventajas.</p>
                </div>

                <div class="flex justify-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        @else
                            <div class="card">
                                <a href="{{ route('login') }}"
                                    class="block login-btn py-2 px-4 font-semibold rounded-md text-center hover:bg-green-600 transition duration-300">Ingresar</a>
                            </div>

                            @if (Route::has('register'))
                                <div class="card">
                                    <a href="{{ route('register') }}"
                                        class="block register-btn py-2 px-4 font-semibold rounded-md text-center hover:bg-blue-600 transition duration-300">Registrarse</a>
                                </div>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
