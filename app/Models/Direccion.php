<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_direccion';
    protected $primaryKey = 'iddireccion';

    protected $fillable = [
        'direccion',
    ];
}
