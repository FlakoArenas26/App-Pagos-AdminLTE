<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recibo de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        h1 {
            padding: 10px;
            text-align: center;
        }

        th {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        td {
            padding: 10px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        td.text-end {
            text-align: end;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Recibo de Pago</h1>
    <table>
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
</body>

</html>
