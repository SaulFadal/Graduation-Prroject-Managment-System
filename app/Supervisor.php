<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supervisor extends Model
{
    //

    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     //Need these fields to perform the store in the model
    protected $fillable = [
        'first_name','last_name', 'email', 'password','id', 'user_role', 'department_id','group_id', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  //Table you want to link to, primary key of the other table, Forign key of current table.
        // return $this->hasMany('App\Student','id', 'Supervisor_ID');
    public function proposals(){
      
        //return $this->hasMany('App\Proposal','id', 'supervisor_ID');
        return $this->hasMany('App\Proposal');
        
    }

    public function Tasks()
    {
        return $this->hasMany('App\Task');
    }


}
