<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestAnswers extends Model
{

    protected $table = "quest_answers";

    protected $fillable = [
        'quest_id',
        'nota',
        'answer'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function assessment(){
        return $this->belongsTo(Assessment::class);
    }

    public function images()
    {
        return $this->hasMany(AnswerImages::class, 'answer_id');
    }

}
