<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivell extends Model
{
    protected $fillable = [
        'nom_nivell', 'descripcio_nivell'
    ];
}
