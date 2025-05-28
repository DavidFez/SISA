<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top">
            <h3 class="mb-0">Listado de Viviendas</h3>
        </div>

        <div class="card-body bg-light">
            @if ($listaViviendas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th class="py-3">Número de Vivienda</th>
                                <th class="py-3">Dirección</th>
                                <th class="py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listaViviendas as $vivienda)
                                <tr>
                                    <td>
                                        <span class="badge bg-dark fs-6 px-3 py-2">
                                            {{ $vivienda->numerovivienda }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($vivienda->direccion)
                                            <span class="badge bg-primary fs-6 px-3 py-2">
                                                {{ $vivienda->direccion->direccion }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger fs-6 px-3 py-2">
                                                Dirección pendiente de asignar
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$vivienda->direccion)
                                            @livewire('viviendas.asignar-direccion', ['viviendaId' => $vivienda->idvivienda], key($vivienda->idvivienda))
                                        @else
                                            <span class="badge bg-success fs-6 px-3 py-2">
                                                Dirección asignada
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $listaViviendas->links() }}
                </div>
            @else
                <div class="alert alert-warning text-center fs-5 fw-bold py-3">
                    No hay viviendas registradas.
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('direccionAsignada', () => {
                const modal = document.getElementById('modalAsignarDireccion');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                if (modalInstance) {
                    modalInstance.hide();
                }

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Se ha asignado correctamente",
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        });
    </script>
</div>
