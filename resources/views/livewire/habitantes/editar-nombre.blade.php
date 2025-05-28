<div wire:ignore.self>
    <div class="modal fade" id="modalEditarNombre" tabindex="-1" aria-labelledby="modalEditarNombreLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Nombre del Habitante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombreHabitante" class="form-label">Nombre</label>
                        <input style="text-transform: uppercase;" type="text" id="nombreHabitante" class="form-control" wire:model="nombreHabitante">
                        <div class="invalid-feedback">El nombre no puede estar vacío.</div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="actualizarNombre">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            Livewire.on('abrirModalNombre', () => {
                let modal = new bootstrap.Modal(document.getElementById('modalEditarNombre'));
                modal.show();
            });

            Livewire.on('cerrarModalNombre', () => {

                let modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarNombre'));
                if (modal) {
                    modal.hide();
                }

                Swal.fire({

                    position:'top-end',
                    icon: 'success',
                    title: 'Editado con Éxito',
                    text: 'El nombre se ha editado correctamente.',
                    timer: 3000,
                    showConfirmButton: false
                });
            
            });

            Livewire.on('campoNombreVacio', () => {

                let modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarNombre'));
                if (modal) {
                    modal.hide();
                }

                Swal.fire({

                    position:'top-end',
                    icon: 'error',
                    title: 'Campo Vacio',
                    text: 'El campo no se puede enviar vacio.',
                    showConfirmButton: true
                });

            });

            document.getElementById('nombreHabitante').addEventListener('input', function () {
            
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
