<div class="table-responsive">
    <table class="table table-hover table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>N° Viv</th>
                <th>N° Fam</th>
                <th>Nombre</th>
                <th>Accion</th>
                <th>Apellido</th>
                <th>Accion</th>
                <th>Fecha de Nacimiento</th>
                <th>Expediente</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitantes as $habitante)
                <tr>
                    <td><span class="badge bg-primary p-2">{{ $habitante->vivienda->numerovivienda }}</span></td>
                    <td><span class="badge bg-secondary p-2">{{ $habitante->familia->numerofamilia }}</span></td>
                                    <!-- Nombre con botón de edición -->
                    <td class="fw-bold">
                        {{ $habitante->nombre }}
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary ms-2" wire:click="nombreHabitante({{ $habitante->idhabitante }})">
                            Editar <i class="fas fa-edit"></i>
                        </button>
                    </td>

                    <td class="fw-bold">
                        {{ $habitante->apellido }}
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary ms-2"  wire:click="apellidoHabitanteEvent({{ $habitante->idhabitante }})">
                            Editar <i class="fas fa-edit"></i>
                        </button>
                    </td>

                    <td>
                        <i class="fas fa-calendar-alt text-info"></i> 
                        {{ $habitante->fechaNacimientoFomato() }}
                    </td>
                    <td>
                        <span class="text-muted">{{ $habitante->numeroexpediente }}</span>
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

    @livewire('habitantes.editar-nombre')
    @livewire('habitantes.editar-apellido')

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-3">
        {{ $habitantes->links() }}
    </div>
</div>
