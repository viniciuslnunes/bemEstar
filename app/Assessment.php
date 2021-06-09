<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assessment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'description',
        'exclusive'
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function answersAssessments(){
        return $this->HasMany(AnswersAssessment::class);
    }

    public function questsAssessments(){
        return $this->HasMany(QuestsAssessment::class);
    }

}