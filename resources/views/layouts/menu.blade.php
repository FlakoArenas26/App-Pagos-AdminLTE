<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">

    {{-- /* El código `@can('users.index')` es una directiva de Laravel Blade que verifica si el usuario
actualmente autenticado tiene la capacidad de acceder a la ruta `users.index`. */ --}}
    @can('users.index')
        <a href="{{ route('users.index') }}" class="nav-link">
            <i class="fas fa-user"></i>
            <p>Usuarios</p>
        </a>
    @endcan

</li>
<li class="nav-item">
    <a href="{{ route('services.index') }}" class="nav-link">
        <i class="fas fa-file-invoice-dollar"></i>
        <p>Servicios</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('payments.index') }}" class="nav-link">
        <i class="fas fa-shopping-cart"></i>
        <p>Pagos</p>
    </a>
</li>
