<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipus extends Model
{
    protected $fillable = [
        'nom_tipus', 'descripcio_tipus'
    ];
}
