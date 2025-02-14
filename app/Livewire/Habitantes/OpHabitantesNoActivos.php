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
        $habitantesNoActivos = Habitante::where('estado', '!=', 'Activo')->paginate(10);
        return view('livewire.habitantes.op-habitantes-no-activos', compact('habitantesNoActivos'));
    }
}
