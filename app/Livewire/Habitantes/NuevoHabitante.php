<?php

namespace App\Livewire\Habitantes;

use App\Models\Habitante;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class NuevoHabitante extends Component
{

    public $termino = '';
    public $tipoBusqueda = 'nombre'; // Este es el valor por defecto al cargar la vista
    public $habitantes = []; // Aquí guardarás los resultados

    public function render()
    {
        return view('livewire.habitantes.nuevo-habitante');
    }

    /*  El valor del input se llama termino, por lo tanto, esta funcion es una palabra reservada que se debe llamar asi para que 
        despues de medio segundo que se deje de escribir en el input se ejecute una busqueda del nombre que se haya pasado como
        parametro
    */

    public function updatedTermino()
    {
        if (strlen($this->termino) < 2) {
            $this->habitantes = [];
            return;
        }
    
        $termino = strtolower($this->termino); // Convertimos el input a minúsculas
    
        $this->habitantes = \App\Models\Habitante::query()
            ->when($this->tipoBusqueda === 'nombre', function ($query) use ($termino) {
                $query->where(DB::raw('LOWER(nombre)'), 'like', '%' . $termino . '%');
            })
            ->when($this->tipoBusqueda === 'apellido', function ($query) use ($termino) {
                $query->where(DB::raw('LOWER(apellido)'), 'like', '%' . $termino . '%');
            })
            ->get();
        
    }
}
