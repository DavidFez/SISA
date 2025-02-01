<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Corre.</th>
                <th>Numero De Vivienda</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaViviendas as $vivienda)
                <tr>
                    <td>{{ $vivienda->idVivienda }}</td>
                    <td>{{ $vivienda->numeroVivienda }}</td>
                    <td>
                        @if ($vivienda->direccion)
                            <span class="text-success">{{ $vivienda->direccion->direccion }}</span>
                        @else
                            <span class="text-danger fw-bold">Pendiente de Asignar</span>
                        @endif
                    </td>
                    <td>
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
    
</div>
