<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    protected $table = 'versements';
    protected $guarded = ['id'];

    public function membre()
    {
        return $this->belongsTo(Membre::class, 'membre_id');
    }

    public function cotisation()
    {
        return $this->belongsTo(Cotisation::class, 'cotisation_id');
    }
}
