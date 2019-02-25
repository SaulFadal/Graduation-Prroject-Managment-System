<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function students(){
        return $this->hasMany('App\Student', 'Student_id');
    }

    public function supervisor(){

        return $this->belongsTo('App\Supervisor');
    }
}
