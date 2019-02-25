<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestt extends Model
{
    //

    public function student(){
        return $this->belongsto('App\Student');
    }

    
}
