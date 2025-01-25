

    <div class="d-flex flex-column align-items-center">
    
        <div class="mb-3 w-50">
            <label for="year" class="form-label">Escribir Año</label>
            <input 
                type="number" 
                class="form-control" 
                placeholder="Escriba un año" 
                min="1900" 
                max="2050"
                wire:model="year">
        </div>

        <div class="mb-3 w-50">
            <label for="month" class="form-label">Seleccionar Mes</label>
            <select id="month" class="form-select" wire:model="selectedMonth">
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
                class="btn btn-primary w-100" 
                wire:click="buscarHabitantes" 
                @if (!$year || !$selectedMonth)  @endif>
                Buscar Habitantes
            </button>
        </div>

        @if (!empty($habitantes))
    <table class="table table-striped w-75 mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
            </tr>
        </thead>
        <tbody>
            @php
                $numero = 1
            @endphp
            @foreach ($habitantes as $habitante)
                <tr>
                    <td>{{ $numero }}</td>
                    <td>{{ $habitante->nombre }}</td>
                    <td>{{ $habitante->apellido }}</td>
                    <td>{{ $habitante->fechaNacimientoFomato() }}</td>
                </tr>

                @php
                    $numero++
                @endphp
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-info w-75 mt-4 text-center" role="alert">
            No se encontraron datos para el año y mes seleccionados.
        </div>
    @endif
        
    </div>

    


