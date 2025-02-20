<?php

namespace App\Livewire\Vacunas;

use App\Models\Habitante;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ListadoVacunasAnio extends Component
{

    public $anio;
    public $habitantes = [];

    //Variables para el valor anterior del mes y año seleccionados
    public $oldAnio;


    public function buscarPorAnio()
    {

        if ($this->anio) {

            $this->habitantes = Habitante::whereYear('fechanacimiento', $this->anio)
            ->orderByRaw('EXTRACT(MONTH FROM fechanacimiento) ASC')
            ->get();

            $this->oldAnio = $this->anio;

        }
    }

    public function descargarPDF()
    {
        $datos = [
            'habitantes' => $this->habitantes,
            'oldAnio' => $this->oldAnio,
        ];

        $pdf = Pdf::loadView('livewire.vacunas.plantillaVacunas', $datos)
            ->setPaper('legal', 'landscape');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "Listado_{$this->oldAnio}.pdf");
    }
    public function render()
    {
        return view('livewire.vacunas.listado-vacunas-anio');
    }
}
