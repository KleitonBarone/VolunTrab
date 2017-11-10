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
        'name', 'email', 'password', 'tipo', 'cpf', 'datanasc', 'cnpj', 'tel', 'avatar',
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

    public function denuncia()
    {
        return $this->hasMany('App\Denuncia', 'user_id');
    }

    public function voluntrab() {
    return $this->belongsToMany('App\Voluntrab')
    ->withTimestamps();

    }

    public function doacao_created()
    {
        return $this->hasMany('App\Doacao', 'user_id');
    }

    public function doacao() {
    return $this->belongsToMany('App\Doacao', 'user_doacao')
    ->withTimestamps();
    }

    public function conquista() {
        return $this->belongsToMany('App\Conquista')
        ->withTimestamps();
        }

    public function avalias()
    {
      return $this->belongsToMany('App\User', 'avalia_user', 'user_id', 'avalia_id')
      ->withPivot('nota', 'comentario');
      
    }
    
    
    public function theavalias()
    {
      return $this->belongsToMany('App\User', 'avalia_user', 'avalia_id', 'user_id')
      ->withPivot('nota', 'comentario');
      
    }

}
