<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $fillable = [
        'comentario', 'id_delator'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
