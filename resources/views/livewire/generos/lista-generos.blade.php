<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top">
            <h3 class="mb-0">Generos Registrados</h3>
        </div>

        <div class="px-4 mt-3 d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalGenero">
                <i class="fas fa-plus-circle"></i> Agregar Género
            </button>
        </div>

        <div class="card-body bg-light">
            @if ($generos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th class="py-3">#</th>
                                <th class="py-3">Genero</th>
                                <th class="py-3">Abreviatura</th>
                                <th class="py-3">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generos as $index => $genero)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <span class="badge bg-primary fs-6 px-3 py-1">{{ $genero->genero }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary fs-6 px-3 py-1">{{ $genero->abreviatura }}</span>
                                    </td>
                                    <th>
                                        <button class="btn btn-sm btn-outline-danger ms-2" onclick="eliminarGenero({{$genero->idgenero}})">
                                            Eliminar <i class="fas fa-ban"></i>
                                        </button>
                                    </th>
                                </tr>
                            @endforeach

                    </table>
                </div>

            @else
                <div class="alert alert-warning text-center fs-5 fw-bold py-3">
                    No hay generos registradas.
                </div> 
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalGenero" tabindex="-1" aria-labelledby="modalGeneroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalGeneroLabel">Agregar Nuevo Género</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form form id="form-genero" wire:submit.prevent="guardarGenero">
                        <div class="mb-3">
                            <label for="genero" class="form-label">Género</label>
                            <input type="text" id="genero" wire:model="genero" class="form-control" placeholder="Ej. Masculino">
                            @error('genero') <span class="text-danger">Campo vacío ingrese un genero</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="abreviatura" class="form-label">Abreviatura</label>
                            <input type="text" id="abreviatura" wire:model="abreviatura" class="form-control" placeholder="Ej. M">
                            @error('abreviatura') <span class="text-danger">Campo vacío ingrese una abreviatura</span> @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
