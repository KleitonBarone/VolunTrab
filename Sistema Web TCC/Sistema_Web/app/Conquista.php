<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conquista extends Model
{
    protected $fillable = [
        'nome', 'desc'
    ];

    public function user() {
        return $this->belongsToMany('App\User')
        ->withTimestamps();
    }
}
