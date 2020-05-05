<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitat extends Model
{
    protected $casts = [
        "acabat" => "boolean",
        "public" => "boolean",
    ];

    protected $fillable = [
        'nom_activitat', 'descripcio_activiatat', 'user_id','tipus_id','nivell_id','codi'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function nivell()
    {
        return $this->belongsTo('App\Nivell');
    }

    public function tipus()
    {
        return $this->belongsTo('App\Tipus');
    }
}
