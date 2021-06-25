<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestForm extends Model
{
    protected $fillable = [
        'quest', 'form_id'
    ];

    public function answer() {
        return $this->hasOne(QuestAnswers::class, 'quest_id', 'id');
    }
}
