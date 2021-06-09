<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestsAssessment extends Model
{
    protected $table = [
        'quests_assessments'
    ];

    public function assessments(){
        return $this->belongsTo(Assessment::class);
    }
}
