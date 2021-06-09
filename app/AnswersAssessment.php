<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswersAssessment extends Model
{
    protected $table = [
        'answers_assessments'
    ]; 

    public function assessments(){
        return $this->belongsTo(Assessment::class);
    }
}
