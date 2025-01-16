<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    //
    protected $table = 'motorista';

    protected $fillable = [
        'nome',
        'cnh',
        'data_nascimento',
    ];


}
