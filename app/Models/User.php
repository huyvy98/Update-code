<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Admin\Database\factories\UserFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'email',
        'phone',
        'password',
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
