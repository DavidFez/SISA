<div class="table-responsive">
    <table class="table table-hover table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th># Vivienda</th>
                <th># Familia</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Expediente</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitantes as $habitante)
                <tr>
                    <td><span class="badge bg-primary p-2">{{ $habitante->vivienda->numeroVivienda }}</span></td>
                    <td><span class="badge bg-secondary p-2">{{ $habitante->familia->numeroFamilia }}</span></td>
                    <td class="fw-bold">{{ $habitante->nombre }}</td>
                    <td class="fw-bold">{{ $habitante->apellido }}</td>
                    <td>
                        <i class="fas fa-calendar-alt text-info"></i> 
                        {{ $habitante->fechaNacimientoFomato() }}
                    </td>
                    <td>
                        <span class="text-muted">{{ $habitante->numeroExpediente }}</span>
                    </td>
                    <td>
                        @if($habitante->estado == 'Activo')
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-3">
        {{ $habitantes->links() }}
    </div>
</div>
