<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eligible extends Model
{

    public function level(){
        return $this->belongsTo('App\Level');
    }

    public function souvenirs(){
        return $this->belongsTo('App\Souvenir');
    }

}
