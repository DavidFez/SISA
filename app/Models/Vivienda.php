<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    //
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_vivienda';
    protected $primaryKey = 'idVivienda';

    protected $fillable = [
        'numeroVivienda',
        'idDireccion',
    ];

    public function direccion(){

        return $this->belongsTo(Direccion::class, 'idDireccion', 'idDireccion');
    }
    
}
