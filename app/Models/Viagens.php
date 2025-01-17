<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viagens extends Model{
    protected $table = 'viagens';
    protected $fillable = [
        'km_inicial',
        'km_final',
        'motorista_id',
        'veiculo_id'
    ];

     // No modelo Viagens
    public function motorista()
    {
        return $this->belongsTo(Motorista::class);
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculos::class);
    }
}