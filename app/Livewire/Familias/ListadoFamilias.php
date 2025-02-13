<?php

namespace App\Livewire\Familias;

use App\Models\Familia;
use Livewire\Component;
use Livewire\WithPagination;

class ListadoFamilias extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    /* Esta funcion se carga al dar clic en el boton de la tabla y se envia el id junto con el evento, 
        este evento se va a escucar en el otro componente donde se cargaran los integrantes
    */

    public function cargarFamilia($idFamilia){
        
        $this->dispatch('mostrar-integrantes', $idFamilia);
        
    }

    public function render()
    {
        $listadoFamilias = Familia::paginate(5);

        return view('livewire.familias.listado-familias', compact('listadoFamilias'));
    }
}
