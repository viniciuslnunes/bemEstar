<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assessment extends Model
{
    use SoftDeletes;
     protected $table = 'assessments';


    protected $fillable = [
        'client_id',
        'form_id',
        'quest_answers_id',
        'data_inicio',
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function answer() {
        return $this->hasMany(QuestAnswers::class, 'assessment_id', 'id');
    }

}