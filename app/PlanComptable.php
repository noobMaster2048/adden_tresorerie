<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanComptable extends Model
{
    protected $table = 'plan_comptables';
    protected $guarded = ['id'];
}
