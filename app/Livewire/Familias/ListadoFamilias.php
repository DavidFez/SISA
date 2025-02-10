<?php

namespace App\Livewire\Familias;

use App\Models\Familia;
use Livewire\Component;
use Livewire\WithPagination;

class ListadoFamilias extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    

    public function render()
    {
        $listadoFamilias = Familia::paginate(5);

        return view('livewire.familias.listado-familias', compact('listadoFamilias'));
    }
}
