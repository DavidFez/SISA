<div class="d-flex flex-column align-items-center bg-body-secondary p-4 rounded shadow-sm">
    <h3 class="mb-4 text-primary">Listado de Viviendas</h3>

    @if ($listaViviendas->count() > 0)
        <table class="table table-bordered table-hover w-75 mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Número de Vivienda</th>
                    <th>Dirección</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listaViviendas as $index => $vivienda)
                    <tr>

                        <td class="fw-bold"><span class="badge bg-info">{{ $vivienda->numeroVivienda }}</span></td>
                        <td>
                            @if ($vivienda->direccion)
                                <span class="text-success fw-bold">{{ $vivienda->direccion->direccion }}</span>
                            @else
                                <span class="text-danger fw-bold">Pendiente de Asignar</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if (!$vivienda->direccion)
                                @livewire('viviendas.asignar-direccion', ['viviendaId' => $vivienda->idVivienda], key($vivienda->idVivienda))
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="mt-3">
            {{ $listaViviendas->links() }}
        </div>
    @else
        <div class="alert alert-warning w-75 text-center" role="alert">
            No hay viviendas registradas.
        </div>
    @endif

    <script>

        document.addEventListener('DOMContentLoaded', function () {
    
            Livewire.on('direccionAsignada', () => {
                
                var modal = document.getElementById('modalAsignarDireccion');
                var modalInstance = bootstrap.Modal.getInstance(modal);
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
