<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table   = 'users';

    const USER_CLIENT   = 0;
    const USER_ADMIN    = 1;
    const USER_MENEDGER = 2;

    public static function getRole()
    {
        return [
            self::USER_MENEDGER => 'Менеджер',
            self::USER_ADMIN    => 'Адміністратор',
            self::USER_CLIENT   => 'Кліент',
        ];
    }

    public function getRoleNameAttribute()
    {
        return self::getRole()[$this->roleId];
    }

    public function GetLikedParts()
    {
        return $this->belongsToMany(Parts::class, 'parts_users', 'user_id', 'part_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastName',
        'patronymic',
        'phone_number',
        'address',
        'roleId',
        'delivery_company',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
