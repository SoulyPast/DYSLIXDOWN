<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercici extends Model
{
    protected $fillable = [
        'activitat_id', 'resposta', 'opcio1','opcio2','opcio3','opcio4', 'opcio5','opcio6','opcio7'
    ];
}
