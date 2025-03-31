<div class="d-flex flex-column align-items-center bg-body-secondary p-4 rounded shadow-sm">
    <h3 class="mb-4 text-primary">Listado de vacunación por mes y año</h3>

    <div class="mb-3 w-50">
        <label for="year" class="form-label fw-bold">Escribir Año</label>
        <input 
            type="number" 
            class="form-control border-primary rounded-pill" 
            placeholder="Escriba un año" 
            min="1900" 
            max="2050"
            wire:model="year">
    </div>

    <div class="mb-3 w-50">
        <label for="month" class="form-label fw-bold">Seleccionar Mes</label>
        <select id="month" class="form-select border-primary rounded-pill" wire:model="selectedMonth">
            <option value="" selected>Elige un mes</option>
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
    </div>

    <div class="mb-3 w-50">
        <button 
            class="btn btn-success w-100 fw-bold rounded-pill" 
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
            <span class="badge bg-primary">Resultados: {{ count($habitantes) }} Habitantes</span>
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

    


