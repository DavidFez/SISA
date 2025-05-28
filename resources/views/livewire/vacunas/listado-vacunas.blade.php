<div class="d-flex flex-column align-items-center bg-body-secondary p-4 rounded shadow-sm">
    
    <h3 class="mb-4 text-primary fw-bold">Listado de vacunación por mes y año</h3>

    <div class="row w-100 justify-content-center">
        <div class="col-md-4 mb-3">
            <label for="year" class="form-label fw-bold">Escribir Año</label>
            <input 
                type="number" 
                class="form-control border-primary rounded-pill shadow-sm" 
                placeholder="Escriba un año" 
                min="1900" 
                max="2050"
                wire:model="year">
        </div>

        <div class="col-md-4 mb-3">
            <label for="month" class="form-label fw-bold">Seleccionar Mes</label>
            <select id="month" class="form-select border-primary rounded-pill shadow-sm" wire:model="selectedMonth">
                <option value="" selected>Elige un mes</option>
                @foreach([
                    '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
                    '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto',
                    '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
                ] as $value => $month)
                    <option value="{{ $value }}">{{ $month }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-4 w-50 text-center">
        <button 
            class="btn btn-success w-75 fw-bold rounded-pill shadow-sm" 
            wire:click="buscarHabitantes">
            <i class="fas fa-search"></i> Buscar Habitantes
        </button>
    </div>

    @if (count($habitantes) > 0)

        <table class="table table-bordered w-75 mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Informe</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <span class="badge bg-secondary">1</span>
                    </td>
                    <td>
                        <span class="text-primary fw-bold">Listado del mes de {{$oldMonth}} de {{$oldAnio}}</span>
                    </td>
                    <td class="text-center">
                        <button wire:click="descargarPDF"
                            class="btn btn-success rounded-pill fs-6 btn-sm">
                            <i class="fas fa-download"></i> Descargar Listado PDF
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="alert alert-success w-75 mt-4 text-center" role="alert">
            <span class="badge bg-primary fs-6">Resultados: {{ count($habitantes) }} Habitantes</span>
        </div>

        <table class="table table-bordered table-hover w-75 mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Corr</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($habitantes as $index => $habitante)
                    <tr>
                        <td>
                            <span class="badge bg-dark">{{ $index + 1 }}</span>
                        </td>
                        <td class="fw-bold">{{ $habitante->nombre }} {{ $habitante->apellido }} </td>
                        <td class="fw-bold">{{ $habitante->fechaNacimientoFomato()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <div class="alert alert-dark w-75 mt-4 text-center" role="alert">
            <span class="badge bg-info">Sin resultados</span>
            No se encontraron datos para el año y mes seleccionados.
        </div>
    @endif
</div>

    


