<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;
// clientes
class Client extends Model {
    // Não é necesário utilizar o atributo abaixo pois a classe reconhece conforme o primeiro comentário
    // protected $table = 'clientes';
    public $timestamps = true;

    protected $fillable = [
        //  'user_id', 
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