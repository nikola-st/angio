<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Notifications\Notifiable;

class Pacijent extends Model implements CanResetPassword
{
    use HasFactory, CanResetPasswordTrait, Notifiable;
    
    protected $primaryKey = 'idpacijenta';
    protected $table = 'pacijenti';

    protected $fillable = [
        'user_id',
        'imeprezime',
        'godina_rodjenja',
        'adresa',
        'telefon',
        'email',
    ];

    // Relacija sa User (1:1)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relacija sa Pregledi (1:N)
    public function pregledi()
    {
        return $this->hasMany(Pregled::class, 'idpacijenta', 'idpacijenta');
    }

    public static function booted()
    {
        static::deleting(function ($pacijent) {
            $pacijent->user()->delete(); // automatski briše User kada se briše Pacijent
        });
    }
}
