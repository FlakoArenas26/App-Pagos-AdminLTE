@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Crear Nuevo Rol</h1>

                <div class="container my-3 py-3">
                    <div class="col col-md-6">
                        <!-- Dropdown para seleccionar usuario -->
                        <select name="user_id" class="form-control mb-3">
                            <option value="">Seleccione un usuario</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        <!-- Dropdown para seleccionar rol -->
                        <select name="role" class="form-control mb-3">
                            <option value="">Seleccione un rol</option>
                            <option value="Admin">Admin</option>
                            <option value="Cliente">Cliente</option>
                            <option value="Invitado">Invitado</option>
                        </select>

                        <!-- Checkboxes para los permisos -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="show_users_list"
                                id="verUsuariosPermiso" name="permissions[]">
                            <label class="form-check-label" for="verUsuariosPermiso">
                                Ver lista de usuarios
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="edit_users"
                                id="editarUsuariosPermiso" name="permissions[]">
                            <label class="form-check-label" for="editarUsuariosPermiso">
                                Editar usuarios
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="delete_users"
                                id="eliminarUsuariosPermiso" name="permissions[]">
                            <label class="form-check-label" for="eliminarUsuariosPermiso">
                                Eliminar Usuarios
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Ver lista de roles" id="verRolesPermiso"
                                name="permissions[]">
                            <label class="form-check-label" for="verRolesPermiso">
                                Ver lista de roles
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Crear nuevo rol" id="crearRolPermiso"
                                name="permissions[]">
                            <label class="form-check-label" for="crearRolPermiso">
                                Crear nuevo rol
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Editar rol" id="editarRolPermiso"
                                name="permissions[]">
                            <label class="form-check-label" for="editarRolPermiso">
                                Editar rol
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Eliminar rol" id="eliminarRolPermiso"
                                name="permissions[]">
                            <label class="form-check-label" for="eliminarRolPermiso">
                                Eliminar rol
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Ver lista de servicios"
                                id="verServiciosPermiso" name="permissions[]">
                            <label class="form-check-label" for="verServiciosPermiso">
                                Ver lista de servicios
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Crear Servicio" id="crearServicioPermiso"
                                name="permissions[]">
                            <label class="form-check-label" for="crearServicioPermiso">
                                Crear Servicio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Editar servicio"
                                id="editarServicioPermiso" name="permissions[]">
                            <label class="form-check-label" for="editarServicioPermiso">
                                Editar servicio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Eliminar servicio"
                                id="eliminarServicioPermiso" name="permissions[]">
                            <label class="form-check-label" for="eliminarServicioPermiso">
                                Eliminar servicio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Ver Historial de pagos"
                                id="verHistorialPagosPermiso" name="permissions[]">
                            <label class="form-check-label" for="verHistorialPagosPermiso">
                                Ver Historial de pagos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Crear nuevo pago"
                                id="crearPagoPermiso" name="permissions[]">
                            <label class="form-check-label" for="crearPagoPermiso">
                                Crear nuevo pago
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Ver detalles del pago"
                                id="verDetallesPagoPermiso" name="permissions[]">
                            <label class="form-check-label" for="verDetallesPagoPermiso">
                                Ver detalles del pago
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Descargar PDF pago"
                                id="descargarPDFPagoPermiso" name="permissions[]">
                            <label class="form-check-label" for="descargarPDFPagoPermiso">
                                Descargar PDF pago
                            </label>
                        </div>
                        <!-- Agrega más checkboxes según tus necesidades -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
