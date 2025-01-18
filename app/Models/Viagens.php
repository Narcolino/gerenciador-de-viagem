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

    public function veiculo()
    {
        return $this->belongsTo(Veiculos::class);
    }

    public function motoristas()
    {
        return $this->belongsToMany(Motorista::class, 'motorista_viagem', 'viagem_id', 'motorista_id');
    }
    

}