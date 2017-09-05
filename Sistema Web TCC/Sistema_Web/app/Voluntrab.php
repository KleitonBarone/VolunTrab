<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voluntrab extends Model
{
    protected $fillable = [
        'data', 'desc',
    ];

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function user() {
    return $this->belongsToMany('App\User')
    ->withTimestamps();
    }

}
