<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    protected $table = 'membres';

    protected $guarded = ['id'];

    public static function typeMembre() {
        return [
                [
                    'cle' => 'moral',
                    'valeur' => 'Personne morale'
                ],
            [
                'cle' => 'phys',
                'valeur' => 'Personne physique'
            ]
        ];
    }

    public static function civilites()
    {
        return [
            ['cle' => 'mr', 'valeur' => 'Monsieur'],
            ['cle' => 'md', 'valeur' => 'Madame'],
            ['cle' => 'ml', 'valeur' => 'Mademoiselle'],
        ];
    }

    public static function genre()
    {
        return [
            ['cle' => 'm', 'valeur' => 'Masculin'],
            ['cle' => 'f', 'valeur' => 'Féminin'],
        ];
    }

    public function versements()
    {
        return $this->hasMany(Versement::class, 'membre_id');
    }
}
