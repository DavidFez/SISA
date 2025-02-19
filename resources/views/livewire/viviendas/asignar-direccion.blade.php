
<div>
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-success fs-6" data-bs-toggle="modal" data-bs-target="#modalAsignarDireccion">
        Asignar Dirección
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalAsignarDireccion" tabindex="-1" aria-labelledby="modalAsignarDireccionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAsignarDireccionLabel">Direcciones Disponibles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($direcciones as $direccion)
                                <tr>
                                    <td>
                                        <h5><span class="badge text-bg-dark">{{ $direccion->direccion }}</span></h5>
                                    </td>
                                    <td>
                                        <button wire:click="asignarDireccion({{ $direccion->idDireccion }})" class="btn btn-sm btn-success fs-6">
                                            <i class="fas fa-map-marker-alt me-1"></i> Asignar Dirección
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