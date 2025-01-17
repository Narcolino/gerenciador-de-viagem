<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    //
    protected $table = 'veiculos';
    protected $fillable = [
        'modelo',  
        'ano', 
        'aquisicao',
        'renavam',
        'km'
    ];


}
