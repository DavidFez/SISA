<div wire:ignore.self>
    <div class="modal fade" id="modalEditarApellido" tabindex="-1" aria-labelledby="modalEditarApellidoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Apellido del Habitante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="apellidoHabitante" class="form-label">Apellido</label>
                        <input style="text-transform: uppercase;" type="text" id="apellidoHabitante" class="form-control" wire:model="apellidoHabitante">
                        <div class="invalid-feedback">El apellido no puede estar vacío.</div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="actualizarApellido">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            Livewire.on('abrirModalApellido', () => {
                let modal = new bootstrap.Modal(document.getElementById('modalEditarApellido'));
                modal.show();
            });

            Livewire.on('cerrarModalApellido', () => {

                let modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarApellido'));
                if (modal) {
                    modal.hide();
                }

                Swal.fire({

                    position:'top-end',
                    icon: 'success',
                    title: 'Editado con Éxito',
                    text: 'El apellido se ha editado correctamente.',
                    timer: 3000,
                    showConfirmButton: false
                });
            
            });

            Livewire.on('campoApellidoVacio', () => {

                let modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarApellido'));
                if (modal) {
                    modal.hide();
                }

                Swal.fire({

                    position:'top-end',
                    icon: 'error',
                    title: 'Campo Vacio',
                    text: 'El campo del apellido no se puede enviar vacio.',
                    showConfirmButton: true
                });

            });

            document.getElementById('apellidoHabitante').addEventListener('input', function () {
            
                let input = this.value.trim();
                if (input === '') {
                    
                    this.classList.add('is-invalid');
                } else {

                    this.classList.remove('is-invalid');
                }

            });

            
        });

    </script>
</div>
