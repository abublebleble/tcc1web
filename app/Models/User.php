<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens; // Verifique se o Sanctum está sendo importado

class User extends Authenticatable
{
    use HasApiTokens; // Habilita o uso de tokens com o Sanctum
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // Se o usuário for administrador
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    // Relação com Treinos
    public function treinos()
    {
        return $this->hasMany(Treino::class, 'user_id');
    }

    // Relação com Progresso
    public function progresso()
    {
        return $this->hasMany(Progresso::class, 'user_id');
    }

    // Se o usuário for administrador, você pode adicionar um método de verificação
    public function isAdmin()
    {
        return $this->is_admin;
    }
}
