<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregled extends Model
{
    use HasFactory;

    protected $primaryKey = 'idpregleda';
    protected $table = 'pregledi';

    protected $fillable = [
        'idpacijenta',
        'datum',
        'prvi_kontrolni',
        'vrsta_pregleda',
        'angioloski',
        'nalaz',
        'datumUpdated',
    ];

    // Relacija sa Pacijent (N:1)
    public function pacijent()
    {
        return $this->belongsTo(Pacijent::class, 'idpacijenta', 'idpacijenta');
    }
}
