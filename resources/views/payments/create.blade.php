@extends('layouts.app')

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

@section('content')
    <div class="form-create">
        <h1 class="text-center">Registrar Nuevo Pago</h1>
        <div class="row mx-4">
            <div class="col-md-6 my-3 d-flex justify-content-start"></div>
            <div class="col-md-6 my-3 d-flex justify-content-end">
                <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
            </div>
        </div>

        <form class="col col-4 mx-auto" action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <input type="text" id="user_id" class="form-control" value="{{ auth()->user()->name }}" readonly>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            </div>


            <div class="mb-3">
                <h5>Servicios</h5>
                <div class="form-check">
                    @foreach ($services as $service)
                        <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}"
                            id="service_{{ $service->id }}">
                        <label class="form-check-label" for="service_{{ $service->id }}">
                            {{ $service->name }} - {{ number_format($service->amount, 0, ',', '.') }} COP
                        </label><br>
                    @endforeach
                </div>
            </div>

            <!-- Mostrar lista de servicios seleccionados y total con formato -->
            <div class="mb-3">
                <h5>Servicios Seleccionados:</h5>
                <ul id="selectedServicesList"></ul>
                <p><strong>Total: </strong><span id="totalAmount">0</span> COP</p>
            </div>

            <button type="submit" class="btn btn-success">Registrar Pago</button>
        </form>
    </div>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox][name="services[]"]');
        const selectedServicesList = document.getElementById('selectedServicesList');
        let totalAmount = 0;

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                const serviceId = this.value;
                const serviceName = this.nextElementSibling.textContent.split(' - ')[0];
                const serviceAmount = parseFloat(this.nextElementSibling.textContent.replace(/\D/g, ''));

                if (this.checked) {
                    totalAmount += serviceAmount;
                    const listItem = document.createElement('li');
                    listItem.textContent =
                        `${serviceName} - ${serviceAmount.toLocaleString('es-CO', { style: 'currency', currency: 'COP', minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(/\sCOP/, '')}`;
                    selectedServicesList.appendChild(listItem);
                } else {
                    totalAmount -= serviceAmount;
                    const items = selectedServicesList.getElementsByTagName('li');
                    for (let i = 0; i < items.length; i++) {
                        if (items[i].textContent.includes(serviceName)) {
                            selectedServicesList.removeChild(items[i]);
                            break;
                        }
                    }
                }
                document.getElementById('totalAmount').textContent = totalAmount.toLocaleString('es-CO', {
                    style: 'currency',
                    currency: 'COP',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).replace(/\sCOP/, '');
            });
        });
    </script>
@endsection
