<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //

    public function supervisor(){

        

return $this->belongsTo('App\Supervisor');
        
    }

    
}
