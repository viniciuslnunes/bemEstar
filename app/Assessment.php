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

}