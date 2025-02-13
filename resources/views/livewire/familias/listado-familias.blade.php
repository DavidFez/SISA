<div class="d-flex flex-column align-items-center bg-body-secondary p-4 rounded shadow-sm">
    
    <h3 class="mb-4 text-primary">Listado de Familias</h3>

    @if ($listadoFamilias->count() > 0)

        <table class="table table-bordered table-hover w-75 mt-4">

            <thead class="bg-primary text-white">
                <tr>
                    <th>Número de Famila</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listadoFamilias as $index => $familia)
                    <tr>
                        <td class="fw-bold">
                            <span class="badge bg-info">{{ $familia->numeroFamilia }}</span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm" wire:click="cargarFamilia({{ $familia->idFamilia }})">
                                <i class="fas fa-users"></i> Ver Integrantes
                            </button>
                        </td>                        
                    </tr>
                @endforeach

                @livewire('familias.ver-integrantes')
            </tbody>

        </table>

        <div class="mt-3">
            {{ $listadoFamilias->links() }}
        </div>

    @else
        <div class="alert alert-warning w-75 text-center" role="alert">
            No hay familias registradas.
        </div>
    @endif



</div>
