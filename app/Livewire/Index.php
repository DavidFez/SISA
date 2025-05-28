<?php

namespace App\Livewire;

use App\Models\Familia;
use App\Models\Habitante;
use App\Models\Vivienda;
use App\Repositories\PoblacionEstadisticas;
use Livewire\Component;

class Index extends Component
{
    public $totalFamilias; 
    public $totalViviendas;
    public $totalHabitantes;

    /*
        El metodo mount es un hook que permite cargar datos iniciales al blade cunado se renderiza por primera vez,
        en este caso se utiliza una clase que funciona como repositorio para ayudar con las consultas a las tablas 
        y poder obtener los totales de las tablas correspondientes. La clase repositorio está en la carpeta App

    */
    public function mount(PoblacionEstadisticas $estadisticas)
    {
        $totals = $estadisticas->obtenerEstadisticas();
        $this->totalFamilias = $totals['totalFamilias'];
        $this->totalViviendas = $totals['totalViviendas'];
        $this->totalHabitantes = $totals['totalHabitantes'];
    }

    public function render()
    {
        return view('livewire.index', [
            'familiasTotal' => $this->totalFamilias,
            'viviendasTotal' => $this->totalViviendas,
            'habitantesTotal' => $this->totalHabitantes,
        ]);
    }
}
