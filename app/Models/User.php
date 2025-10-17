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
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pacijent()
    {
        return $this->hasOne(Pacijent::class, 'user_id', 'id');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isDoctor(): bool
    {
        return $this->role?->name === 'doctor';
    }

    public function isPatient(): bool
    {
        return $this->role?->name === 'patient';
    }

    public function setPassword($token)
    {
        $this->notify(new SetPassword($token));
    }
}