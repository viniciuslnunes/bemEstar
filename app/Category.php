<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image'
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function assessments(){
        return $this->hasMany(Assessment::class);
    }

    public function clients() {
        return $this->hasMany(Client::class);
    }


}