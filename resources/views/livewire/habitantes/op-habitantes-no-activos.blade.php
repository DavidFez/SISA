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
            @foreach($habitantesNoActivos as $habitante)
                <tr>
                    <td><span class="badge bg-primary p-2">{{ $habitante->vivienda->numerovivienda ?? 'N/A' }}</span></td>
                    <td><span class="badge bg-secondary p-2">{{ $habitante->familia->numerofamilia ?? 'N/A' }}</span></td>
                    <td class="fw-bold">{{ $habitante->nombre }}</td>
                    <td class="fw-bold">{{ $habitante->apellido }}</td>
                    <td>
                        <i class="fas fa-calendar-alt text-info"></i> 
                        {{ $habitante->fechaNacimientoFomato() }}
                    </td>
                    <td>
                        <span class="text-muted">{{ $habitante->numeroexpediente }}</span>
                    </td>
                    <td>
                        @if($habitante->estado === 'Inactivo')
                            <span class="badge bg-danger">{{ $habitante->estado }}</span>
                        @elseif($habitante->estado === 'Fallecido')
                            <span class="badge bg-warning text-dark">{{ $habitante->estado }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $habitante->estado }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-3">
        {{ $habitantesNoActivos->links() }}
    </div>
</div>
