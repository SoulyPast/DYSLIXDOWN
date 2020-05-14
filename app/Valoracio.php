<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracio extends Model
{
    protected $fillable = [
        'stars', 'user_id', 'activitat_id'
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

