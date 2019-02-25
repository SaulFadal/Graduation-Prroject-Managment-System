<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    public function Student(){
      return $this->BelongTo('App\Student');
    }

    public function Supervisor(){
       return $this->BelongTo('App\Supervisor');
    }
}
