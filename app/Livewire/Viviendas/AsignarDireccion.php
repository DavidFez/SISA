<?php

namespace App\Livewire\Viviendas;

use App\Models\Direccion;
use App\Models\Vivienda;
use Livewire\Component;

class AsignarDireccion extends Component
{
    public $viviendaId; // ID de la vivienda a la que se asignará la dirección
    public $direcciones; // Lista de direcciones disponibles

    public function mount($viviendaId)
    {
        $this->viviendaId = $viviendaId;
    }

    public function render()
    {
        // Obtener las direcciones disponibles paginadas
        $this->direcciones = Direccion::orderBY('iddireccion', 'asc')->get();
        return view('livewire.viviendas.asignar-direccion');
    }

    public function asignarDireccion($direccionId)
    {
        // Lógica para asignar la dirección a la vivienda
        $vivienda = Vivienda::find($this->viviendaId);
        $vivienda->iddireccion = $direccionId;
        $vivienda->save();

        // Emitir un evento para actualizar la lista de viviendas
        $this->dispatch('direccionAsignada');
    }
}
