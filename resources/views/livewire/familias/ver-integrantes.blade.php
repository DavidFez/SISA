<div>
    <div class="modal fade" id="modalVerIntegrantes" tabindex="-1" aria-labelledby="modalVerIntegrantesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Integrantes de la Familia #{{ $idFamilia }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(count($integrantes) > 0)
                        <table class="table table-bordered table-hover">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha de Nacimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($integrantes as $index => $habitante)
                                    <tr>
                                        <td><span class="badge bg-info">{{ $index + 1 }}</span></td>
                                        <td>{{ $habitante->nombre }}</td>
                                        <td>{{ $habitante->apellido }}</td>
                                        <td>{{ $habitante->fechaNacimientoFomato() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning text-center">No hay integrantes registrados en esta familia.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

