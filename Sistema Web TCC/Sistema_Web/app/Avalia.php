<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avalia extends Model
{
    protected $fillable = [
        'comentario', 'id_avaliador', 'nota'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
