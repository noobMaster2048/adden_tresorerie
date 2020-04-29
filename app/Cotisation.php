<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    protected $table = 'cotisations';
    protected $guarded = ['id'];

    public static function periodes()
    {
        return [
            ['cle' => 'mois', 'valeur' => 'Mensuelle'],
            ['cle' => 'trim', 'valeur' => 'Trimestrielle'],
            ['cle' => 'sem', 'valeur' => 'Semestrielle'],
            ['cle' => 'an', 'valeur' => 'Annuelle']
        ];
    }

    public static function type_cotisations() {
        return [
            ['cle' => 'evt', 'valeur' => 'Evenement'],
            ['cle' => '', 'valeur' => ''],
            ['cle' => '', 'valeur' => ''],
            ['cle' => '', 'valeur' => ''],
        ];
    }

    public function versements()
    {
        return $this->hasMany(Versement::class, 'cotisation_id');
    }
}
