<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top">
            <h3 class="mb-0"> Listado de Familias</h3>
        </div>
        <div class="card-body bg-light">
            @if ($listadoFamilias->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th class="py-3">Número de Familia</th>
                                <th class="py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listadoFamilias as $familia)
                                <tr>
                                    <td>
                                        <span class="badge bg-dark fs-6 px-3 py-2">
                                            {{ $familia->numerofamilia }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-success btn-sm shadow-sm fw-bold"
                                            wire:click="cargarFamilia({{ $familia->idfamilia }})">
                                            <i class="fas fa-users"></i> Ver Integrantes
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $listadoFamilias->links() }}
                </div>
            @else
                <div class="alert alert-warning text-center fs-5 fw-bold py-3">
                    No hay familias registradas.
                </div>
            @endif
        </div>
    </div>

    @livewire('familias.ver-integrantes')
</div>
