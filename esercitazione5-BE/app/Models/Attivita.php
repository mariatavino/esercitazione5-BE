<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attivita extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descrizione',
        'stato',
        'data_scadenza',
        'progetto_id',
    ];

    public function progetto()
    {
        return $this->belongsTo(Progetto::class);
    }
}
