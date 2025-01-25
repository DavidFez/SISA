<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitante extends Model
{
    use HasFactory;
    
    public $timestamp = false;
    protected $table = 'tbl_habitante';
    protected $primaryKey = 'idHabitante';

    protected $fillable = [

        'idVivienda',
        'idFamilia',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'numeroExpediente',
        'estado',
        'idDireccion'
    ];

    public function vivienda(){

        return $this->belongsTo(Vivienda::class, 'idVivienda', 'idVivienda');
    }

    public function familia(){

        return $this->belongsTo(Familia::class, 'idFamilia', 'idFamilia');
    }

    public function direccion(){

        return $this->belongsTo(Direccion::class, 'idDireccion', 'idDireccion');
    }

    public function fechaNacimientoFomato(){
        
        return Carbon::parse($this->attributes['fechaNacimiento'])->format('d/m/Y');
    }

}
