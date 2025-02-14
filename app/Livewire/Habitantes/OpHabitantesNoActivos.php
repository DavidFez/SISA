<?php

namespace App\Livewire\Habitantes;

use App\Models\Habitante;
use Livewire\Component;
use Livewire\WithPagination;

class OpHabitantesNoActivos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        /*  En esta parte se hace una consulta para obtner todos los habitantes que no esten activos, se usa el operador de 
            negacion ya que la ideas es obtner todos aquellos estados distintos a Activo, y poder mostrarlo con una etiqueta 
            diferente en la vista del blade
        */
        
        $habitantesNoActivos = Habitante::where('estado', '!=', 'Activo')->paginate(10);
        return view('livewire.habitantes.op-habitantes-no-activos', compact('habitantesNoActivos'));
    }
}
