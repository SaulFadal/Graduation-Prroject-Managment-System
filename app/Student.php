<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Model 
{
    //

    use Notifiable;
    protected $primarykey = null;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function requestts(){

        return $this->hasMany('App\Requestt','Sender_id');

    }

    public function department(){

        return $this->belongsTo('App\Department');
    }

    public function Tasks()
    {
        return $this->hasMany('App\Task');
    }

}
