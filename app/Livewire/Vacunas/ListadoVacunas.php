<?php

namespace App\Livewire\Vacunas;

use App\Models\Habitante;
use Livewire\Component;

class ListadoVacunas extends Component
{
    public $year;
    public $selectedMonth;
    public $habitantes = [];

    public function buscarHabitantes()
    {
        // Asegúrate de que ambos valores estén presentes
        if ($this->year && $this->selectedMonth) {
            $this->habitantes = Habitante::whereYear('fechaNacimiento', $this->year)
                ->whereMonth('fechaNacimiento', $this->selectedMonth)
                ->get();
        }

        $this->selectedMonth = null;
    }

    public function render()
    {
        return view('livewire.vacunas.listado-vacunas');
    }
}
