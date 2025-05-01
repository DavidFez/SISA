<?php

namespace App\Livewire\Generos;

use App\Models\Genero;
use App\Models\Habitante;
use Livewire\Attributes\On;
use Livewire\Component;

class ListaGeneros extends Component
{

    public $genero;
    public $abreviatura;
    public $generos = [];

    public function render()
    {
        $this->generos = Genero::orderBy('idgenero')->get();
        return view('livewire.generos.lista-generos');
    }

    public function guardarGenero()
    {
        // Validación en backend por seguridad
        $this->validate([
            'genero' => 'required|string|max:100',
            'abreviatura' => 'required|string|max:10',
        ]);

        Genero::create([
            'genero' => $this->genero,
            'abreviatura' => $this->abreviatura,
        ]);

        $this->reset(['genero', 'abreviatura']);

        $this->dispatch('resGuardarGenero');
    }

    #[On('deleteGenero')]
    public function eliminarGenero($id){

        $existeGenero = Habitante::where('idgenero', $id)->first();

        if ($existeGenero) {
            
            $this->dispatch('resExisteGenero');
            return;  
        }

        $genero = Genero::find($id);
        if ($genero) {
            
            $genero->delete();

            $this->dispatch('resEliminarGenero');
        }

    }
}
