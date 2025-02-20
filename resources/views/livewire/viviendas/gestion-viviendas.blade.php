<div class="d-flex flex-column align-items-center bg-body-secondary p-4 rounded shadow-sm">
    <h3 class="mb-4 text-primary">Listado de Viviendas</h3>

    @if ($listaViviendas->count() > 0)
        <table class="table table-bordered text-center table-hover w-75 mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Número de Vivienda</th>
                    <th>Dirección</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listaViviendas as $index => $vivienda)
                    <tr>

                        <td class="fw-bold">
                            <h5><span class="badge bg-dark">{{ $vivienda->numerovivienda }}</span></h5>
                        </td>
                        <td>
                            @if ($vivienda->direccion)
                                <h5><span class="badge text-bg-info">{{ $vivienda->direccion->direccion }}</span></h5>
                            @else
                                <h5><span class="badge text-bg-danger">Dirección Pediente de Asignar</span></h5>
                            @endif
                        </td>
                        <td class="text-center">
                            @if (!$vivienda->direccion)
                                @livewire('viviendas.asignar-direccion', ['viviendaId' => $vivienda->idvivienda], key($vivienda->idvivienda))
                            @else
                                <h5><span class="badge text-bg-success">Dirección Asignada</span></h5>
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
