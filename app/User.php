<?php

namespace App;

use App\Product;
use App\Log as DatabaseLog;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    const LEVEL_USER = 1;
    const LEVEL_EMPLOYEE = 2;
    const LEVEL_MANAGER = 3;
    const LEVEL_ADMIN = 4;

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

    protected $levelNames = [
        'Usuario',
        'Empleado',
        'Encargado',
        'Administrador',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function logs()
    {
        return $this->hasMany(DatabaseLog::class);
    }

    public function getLevelNameAttribute()
    {
        return $this->levelNames[$this->level - 1];
    }
}
