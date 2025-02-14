<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HabitantesController extends Controller
{
    //Vista hacia la parte de los habitantes
    public function indexHabitante(){

        return view('Habitantes.habitantes-index');
    }

    public function opcionListadoHabitantes(){

        return view('Habitantes.opcion-listado-habitantes');
    }

    public function opcionHabitantesNoActivos(){

        return view('Habitantes.opcion-habitantes-noActivos');
    }
}
