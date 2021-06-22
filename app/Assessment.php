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
        'data_inicio',
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function answersAssessments(){
        return $this->HasMany(AnswersAssessment::class);
    }

    public function questsAssessments(){
        return $this->HasMany(QuestsAssessment::class);
    }

    public function assessmentsCreate(){
        return $this->HasMany(assessmentsCreate::class);
    }

}