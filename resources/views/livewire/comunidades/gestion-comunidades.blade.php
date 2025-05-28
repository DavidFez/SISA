<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top">
            <h3 class="mb-0">Listado de Comunidades</h3>
        </div>

        <div class="card-body bg-light d-flex flex-column align-items-center">
            <!-- Campo de ingreso para dirección -->
            <div class="mb-3" style="width: 60%;">
                <label for="direccion" class="form-label fw-bold">Nueva Dirección</label>
                <input 
                    type="text" 
                    id="direccion"
                    class="form-control border-primary rounded-pill" 
                    placeholder="Escriba una dirección" 
                    wire:model="direccion">
            </div>

            <!-- Botón para guardar la dirección -->
            <div class="mb-4" style="width: 60%;">
                <button 
                    class="btn btn-success w-100 fw-bold rounded-pill" 
                    wire:click="guardarDireccion">
                    <i class="fas fa-save"></i> Guardar Dirección
                </button>
            </div>

            <!-- Tabla de direcciones -->
            @if(count($direcciones) > 0)
                <div class="table-responsive w-100">
                    <table class="table table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($direcciones as $index => $direccion)
                                <tr>
                                    <td>
                                        <span class="badge bg-dark fs-6 px-3 py-2">{{ $index + 1 }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-dark fs-6 px-3 py-2">{{ $direccion->direccion }}</span>
                                    </td>
                                    <td>
                                        <button 
                                            class="btn btn-outline-primary rounded-pill btn-sm me-2"
                                            wire:click="editarDireccion({{ $direccion->iddireccion }})">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <button 
                                            class="btn btn-outline-danger rounded-pill btn-sm"
                                            onclick="confirmarEliminacion({{ $direccion->iddireccion }})">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-dark text-center fs-5 fw-bold py-3 w-100 mt-3">
                    <span class="badge bg-info">Sin resultados</span>
                    No se encontraron direcciones registradas.
                </div>
            @endif
        </div>
    </div>

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
