<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rang extends Model
{
    protected $fillable = [
        'Nivell', 'Exp', 'user_id'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
