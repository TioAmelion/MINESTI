<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\papel;
use App\Models\permissao;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function papeis(){
        return $this->belongsToMany(\App\Models\papel::class);
    }

    public function temPermissao(permissao $permissao){
        return $this->temAlgumPapel($permissao->papeis);
    }

    public function temAlgumPapel($papeis){

        if( is_array($papeis) || is_object($papeis) ){
            return !! $papeis->intersect($this->papeis)->count();
        }

        return $this->papeis->contains('nome_papel', $papeis);
    }
}
