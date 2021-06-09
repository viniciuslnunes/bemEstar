<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;
// clientes
class Client extends Model {
    // Não é necesário utilizar o atributo abaixo pois a classe reconhece conforme o primeiro comentário
    // protected $table = 'clientes';
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function assessments() {
        return $this->hasMany(Assessment::class);
    }
}   