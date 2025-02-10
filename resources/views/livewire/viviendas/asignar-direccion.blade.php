
<div>
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAsignarDireccion">
        Asignar Dirección
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalAsignarDireccion" tabindex="-1" aria-labelledby="modalAsignarDireccionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAsignarDireccionLabel">Asignar Dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($direcciones as $direccion)
                                <tr>
                                    <td>{{ $direccion->idDireccion }}</td>
                                    <td>{{ $direccion->direccion }}</td>
                                    <td>
                                        <button wire:click="asignarDireccion({{ $direccion->idDireccion }})" class="btn btn-sm btn-success">
                                            Asignar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
</div>