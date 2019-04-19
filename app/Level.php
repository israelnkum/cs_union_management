<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public  function souvenir(){
        return $this->belongsTo('App\Souvenir');
    }

    public function eligible(){
        return $this->hasMany('App\Eligible');
    }
}
