<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerImages extends Model
{
    protected $table = "answers_images";

    protected $fillable = [
        'answer_id',
        'image',
    ];
}
