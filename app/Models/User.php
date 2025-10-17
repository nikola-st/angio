<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\SetPassword;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relacija 1:1 sa Pacijent
    public function pacijent()
    {
        return $this->hasOne(Pacijent::class, 'user_id', 'id');
    }

    // Role check
    public function isDoctor(): bool
    {
        return $this->role === 'doctor';
    }

    public function isPatient(): bool
    {
        return $this->role === 'patient';
    }

    public function setPassword($token)
    {
        $this->notify(new SetPassword($token));
    }
}