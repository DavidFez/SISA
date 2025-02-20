<?php

namespace App\Livewire\Familias;

use App\Models\Familia;
use App\Models\Habitante;
use Livewire\Attributes\On;
use Livewire\Component;

class VerIntegrantes extends Component
{
    public $integrantes = [];
    public $numFamilia;
    public $mostrarModal = false;

    
    /* El componente anterior devuelve un evento que es escuchado por este componente y hace una consulta
        la cual obtiene los integrantes de la familia correspondiente, en este caso recibe el id de la familia
        y luego lo que se hace es obtener todos los habiantes que pertenecen a esa familia y se retorna con dispatch
        un evento para abrir el modal cargado con los datos
    */
    
    #[On('mostrar-integrantes')] 
    public function verIntegrantes($idfamilia)
    {
        $this->integrantes = Habitante::where('idfamilia', $idfamilia)->orderBy('idhabitante', 'asc')->get();
        $this->numFamilia = Familia::where('idfamilia', $idfamilia)->value('numerofamilia') ?? 'No encontrada';

        $this->dispatch('abrirModal');
    }

    public function cerrarModal()
    {
        $this->dispatch('cerrarModal');
    }

    public function render()
    {
        return view('livewire.familias.ver-integrantes');
    }
}
