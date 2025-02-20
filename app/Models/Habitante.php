<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitante extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'tbl_habitante';
    protected $primaryKey = 'idhabitante';

    protected $fillable = [

        'idvivienda',
        'idfamilia',
        'nombre',
        'apellido',
        'fechanacimiento',
        'numeroexpediente',
        'estado',
    ];

    public function vivienda(){

        return $this->belongsTo(Vivienda::class, 'idvivienda', 'idvivienda');
    }

    public function familia(){

        return $this->belongsTo(Familia::class, 'idfamilia', 'idfamilia');
    }

    public function fechaNacimientoFomato(){
        
        return Carbon::parse($this->attributes['fechanacimiento'])->format('d/m/Y');
    }

}
