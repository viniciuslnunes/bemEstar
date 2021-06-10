<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome_formulario',
        'item'
    ];

    public function assessments(){
        return $this->hasMany(Assessment::class);
    }

    public function clients() {
        return $this->hasMany(Client::class);
    }

    public function questForm() {
        return $this->hasMany(QuestForm::class);
    }


}