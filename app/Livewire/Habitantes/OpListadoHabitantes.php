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
        $habitantes = Habitante::where('estado', 'Activo')->paginate(10);

        return view('livewire.habitantes.op-listado-habitantes', compact('habitantes'));
    }
}
