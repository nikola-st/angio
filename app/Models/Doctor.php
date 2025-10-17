<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_doktora';
    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'imeprezime',
        'specijalizacija',
        'broj_licence',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pregledi()
    {
        return $this->hasMany(Pregled::class, 'doctor_id', 'id_doktora');
    }
}