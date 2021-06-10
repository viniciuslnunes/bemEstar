<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestsAssessment extends Model
{
    protected $table = [
        'quests_assessments'
    ];

    public function form(){
        return $this->belongsTo(Form::class);
    }
}
