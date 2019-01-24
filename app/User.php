<?php

namespace LaravelPrueba;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles()
    {
        return $this->belongsToMany('LaravelPrueba\Role');
    }

    /**
     * Usa las funciones creadas para buscar uno o más roles que tenga el usaurio.
     */
    public function authorizedRoles($roles)
    {
        if ($this->hasAnyRoles($roles)) {
            return true;
        }
        abort(401, "Sin autorización"); // envía una exception HTML
    }
    /**
     * Busca si el usuario tienen algun rol
     */
    public function hasAnyRoles($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    /**
     * Busca si el usaurio tiene un rol especifico
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

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
}
