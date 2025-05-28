<?php

namespace App\Repositories;

use App\Models\Familia;
use App\Models\Habitante;
use App\Models\Vivienda;

class PoblacionEstadisticas
{
    public function obtenerEstadisticas(){

        return [

            'totalFamilias' => Familia::count(),
            'totalViviendas' => Vivienda::count(),
            'totalHabitantes' => Habitante::where('estado', 'Activo')->count(),
        ];

    }
}
