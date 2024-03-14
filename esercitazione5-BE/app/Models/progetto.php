<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Progetto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descrizione',
        'stato',
        'data_inizio',
        'data_fine',
    ];

    public function attivitàs()
    {
        return $this->hasMany(Attivita::class);
    }
}
