<?php

namespace App\Livewire\Viviendas;

use App\Models\Vivienda;
use Livewire\Component;
use Livewire\WithPagination;

class GestionViviendas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['direccionAsignada' => 'render']; // Escuchar el evento
    
    public function render()
    {
        $listaViviendas = Vivienda::paginate(5);

        return view('livewire.viviendas.gestion-viviendas', compact('listaViviendas'));
    }
}
