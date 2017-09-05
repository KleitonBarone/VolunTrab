<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tipo', 'cpf', 'datanasc', 'cnpj', 'tel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function voluntrab_created()
    {
        return $this->hasMany('App\Voluntrab', 'user_id');
    }

    public function voluntrab() {
    return $this->belongsToMany('App\Voluntrab')
    ->withTimestamps();

    }
}
