<?php

namespace App\Livewire\Habitantes;

use App\Models\Habitante;
use Livewire\Component;
use Livewire\WithPagination;

class OpListadoHabitantes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        /*  Para esta seccion obtenemos todos aquellos habitantes que estan activos, es decir que residen en la comunidad y que 
            actualmente se les brinda un servicio de salud. Para ello el verificamos el campo estado, este campo en un futuro 
            tendria que estar normalizado y que los estados esten en una tabla diferente en la DB para que sea más escalable y solo
            se verifique el id del campo y no todo el sting como se hace actualmente, la propiedad paginate, permite mostrar
            los registros de 10 en 10
        */
        
        $habitantes = Habitante::where('estado', 'Activo')->paginate(10);
        return view('livewire.habitantes.op-listado-habitantes', compact('habitantes'));
    }
}
