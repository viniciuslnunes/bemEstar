<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentCreate extends Model
{

    protected $table = "assessments_create";

    protected $fillable = [
        'quest_id',
        'nota',
        'answer',
        'image',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

}
