<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    //
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_familia';
    protected $primaryKey = 'idFamilia';

    protected $fillable = [
        'numeroFamilia',
    ];
}
