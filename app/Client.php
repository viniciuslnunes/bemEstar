<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;
// clientes
class Client extends Model {

    public $timestamps = true;

    protected $fillable = [
    'nome_empresa', 'cnpj', 'email', 
    'nome_responsavel', 'celular'
    ];

    public function form() {
        return $this->belongsTo(Form::class);
    }

    public function assessments() {
        return $this->hasMany(Assessment::class);
    }
}   