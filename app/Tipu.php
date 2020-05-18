<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipu extends Model
{
    protected $fillable = [
        'nom_tipus', 'descripcio_tipus'
    ];
}
