<div class="d-flex flex-column align-items-center bg-body-secondary p-4 rounded shadow-sm">
    <h3 class="mb-4 text-primary">Listado de Comunidades</h3>

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
            class="btn btn-success w-100 fw-bold rounded-pill" 
            wire:click="guardarDireccion">
            <i class="fas fa-save"></i> Guardar Dirección
        </button>
    </div>

    <!-- Tabla de direcciones -->
    @if(count($direcciones) > 0)
        <table class="table table-bordered table-hover w-75 mt-4">
            <thead class="table-dark">
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
                            <h5><span class="badge bg-dark">{{ $index + 1 }}</span></h5>
                        </td>
                        <td>
                            <h5><span class="badge bg-dark">{{ $direccion->direccion }}</span></h5>
                        </td>
                        <td class="text-center">
                            <!-- Botón de editar -->
                            <button 
                                class="btn btn-outline-primary rounded-pill btn-sm fs-6"
                                wire:click="editarDireccion({{ $direccion->idDireccion }})">
                                <i class="fas fa-edit"></i> Editar
                            </button>

                            <button 
                                class="btn btn-outline-danger rounded-pill btn-sm fs-6"
                                onclick="confirmarEliminacion({{ $direccion->idDireccion }})">
                                <i class="fas fa-trash-alt"></i> Eliminar
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

    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: "¿ESTÁ SEGURO?",
                text: "Debe asegurarse de que la dirección no esté asignada",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarDireccion', { id: id });
                }
            });
        }
    
        document.addEventListener('DOMContentLoaded', function () {

            Livewire.on('alertaExito', mensaje => {
                Swal.fire({
                    position: "top-end",
                    title: "Eliminado con Éxito",
                    icon: "success",
                    text: mensaje,
                    showConfirmButton: false,
                    timer: 3500
                });
            });

            Livewire.on('ErrorDeleteDir', mensaje => {
                Swal.fire({
                    position: "top-end",
                    title: "Error al Eliminar",
                    icon: "error",
                    text: mensaje,
                    showConfirmButton: true,
                });
            });

            Livewire.on('ResEditDir', mensaje => {
                Swal.fire({
                    position: "top-end",
                    title: "Guardado con Éxito",
                    icon: "success",
                    text: mensaje,
                    showConfirmButton: false,
                    timer: 3500
                });
            });

            Livewire.on('ResSaveDir', mensaje => {
                Swal.fire({
                    position: "top-end",
                    title: "Agregado con Éxito",
                    icon: "success",
                    text: mensaje,
                    showConfirmButton: false,
                    timer: 3500
                });
            });
        });
    </script>

</div>
