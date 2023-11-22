<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link">
        <i class="fas fa-user"></i>
        <p>Usuarios</p>
    </a>
</li>
{{-- <li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link">
        <i class="fas fa-lock"></i>
        <p>Roles</p>
    </a>
</li> --}}
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
