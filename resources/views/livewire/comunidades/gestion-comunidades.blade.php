<div class="d-flex flex-column align-items-center bg-body-secondary p-4 rounded shadow-sm">
    <h3 class="mb-4 text-primary">Gestión de Direcciones</h3>

    <!-- Campo de ingreso para dirección -->
    <div class="mb-3 w-50">
        <label for="direccion" class="form-label fw-bold">Nueva Dirección</label>
        <input 
            type="text" 
            id="direccion"
            class="form-control border-primary rounded-pill" 
            placeholder="Escriba una dirección" 
            wire:model="direccion">
    </div>

    <!-- Botón para guardar la dirección -->
    <div class="mb-3 w-50">
        <button 
            class="btn btn-primary w-100 fw-bold rounded-pill" 
            wire:click="guardarDireccion">
            <i class="fas fa-save"></i> Guardar Dirección
        </button>
    </div>

    <!-- Tabla de direcciones -->
    @if(count($direcciones) > 0)
        <table class="table table-bordered table-hover w-75 mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>#</th>
                    <th>Dirección</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($direcciones as $index => $direccion)
                    <tr>
                        <td>
                            <span class="badge bg-secondary">{{ $index + 1 }}</span>
                        </td>
                        <td>{{ $direccion->direccion }}</td>
                        <td class="text-center">
                            <!-- Botón de editar -->
                            <button 
                                class="btn btn-outline-info rounded-pill btn-sm"
                                wire:click="editarDireccion({{ $direccion->idDireccion }})">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-dark w-75 mt-4 text-center" role="alert">
            <span class="badge bg-info">Sin resultados</span>
            No se encontraron direcciones registradas.
        </div>
    @endif

</div>
