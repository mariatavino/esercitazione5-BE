<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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

    public function getDataInizioAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getDataFineAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }
}

