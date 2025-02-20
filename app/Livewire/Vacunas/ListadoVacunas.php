<?php

namespace App\Livewire\Vacunas;

use App\Models\Habitante;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ListadoVacunas extends Component
{
    public $year;
    public $selectedMonth;
    public $habitantes = [];

    //Variables para el valor anterior del mes y año seleccionados
    public $oldAnio;
    public $oldMonth;

    public function buscarHabitantes()
    {
        $months = [
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];
    

        if ($this->year && $this->selectedMonth) {

            $this->habitantes = Habitante::whereYear('fechanacimiento', $this->year)
                ->whereMonth('fechanacimiento', $this->selectedMonth)
                ->get();
        
            $this->oldMonth = $months[str_pad($this->selectedMonth, 2, '0', STR_PAD_LEFT)] ?? 'Mes desconocido';
            $this->oldAnio = $this->year;

        }

        // para limpiar los campos
        $this->selectedMonth = null;
    }

    public function descargarPDF()
    {
        $datos = [
            'habitantes' => $this->habitantes,
            'oldMonth' => $this->oldMonth,
            'oldAnio' => $this->oldAnio,
        ];

        $pdf = Pdf::loadView('livewire.vacunas.plantillaVacunas', $datos)
            ->setPaper('legal', 'landscape');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "Listado_{$this->oldMonth}_{$this->oldAnio}.pdf");
    }



    public function render()
    {
        return view('livewire.vacunas.listado-vacunas');
    }
}
