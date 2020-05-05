<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    protected $fillable = [
        'puntuacio', 'user_id', 'activitat_id','tipus_id','eroors'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function activitat()
    {
        return $this->belongsTo('App\Activitat');
    }
}
