<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    //
    use HasFactory;

    public $timestamp = false;
    protected $table = 'tbl_vivienda';
    protected $primaryKey = 'idVivienda';

    protected $fillable = [
        'numeroVivienda',
    ];
    
}
