<div class="container mt-4">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Ver integrantes</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Buscar por:</label>
                <div class="form-check form-check-inline">
                    <input wire:model="tipoBusqueda" class="form-check-input" type="radio" name="tipoBusqueda" value="nombre">
                    <label class="form-check-label">Nombre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model="tipoBusqueda" class="form-check-input" type="radio" name="tipoBusqueda" value="apellido">
                    <label class="form-check-label">Apellido</label>
                </div>
            </div>

            <div class="mb-3">
                <input wire:model.live.debounce.500ms="termino" type="text" class="form-control" placeholder="Escribe el nombre o apellido...">
            </div>
            
        </div>

        @if (!empty($habitantes))
            <ul class="list-group">
                @foreach ($habitantes as $habitante)
                    <li class="list-group-item">
                        {{ $habitante['nombre'] }} {{ $habitante['apellido'] }}
                    </li>
                @endforeach
            </ul>
        @elseif(empty($habitantes))
            <div class="text-muted mt-2">No se encontraron resultados.</div>
        @endif

    </div>
</div>
