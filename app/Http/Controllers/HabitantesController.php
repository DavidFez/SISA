<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HabitantesController extends Controller
{
    //Vista hacia la parte de los habitantes
    public function indexHabitante(){

        return view('Habitantes.habitantes-index');
    }

}
