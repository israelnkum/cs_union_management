<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    public  function level(){
        return $this->hasMany('App\Level');
    }

    public function eligible(){
        return $this->hasMany('App\Eligible');
    }
}
