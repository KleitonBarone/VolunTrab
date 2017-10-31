<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    protected $fillable = [
        'data', 'desc', 'item', 'status', 'local',
    ];

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function user() {
    return $this->belongsToMany('App\User', 'user_doacao')
    ->withTimestamps();
    }
}
