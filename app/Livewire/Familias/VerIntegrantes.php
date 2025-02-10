<?php

namespace App\Livewire\Familias;

use App\Models\Habitante;
use Livewire\Component;

class VerIntegrantes extends Component
{
    public $idFamilia;
    public $integrantes = [];

    protected $listeners = ['cargarFamilia'];

    public function cargarFamilia($idFamilia)
    {
        $this->idFamilia = $idFamilia;
        $this->integrantes = Habitante::where('idFamilia', $idFamilia)->get();
    }

    public function render()
    {
        return view('livewire.familias.ver-integrantes');
    }
}
