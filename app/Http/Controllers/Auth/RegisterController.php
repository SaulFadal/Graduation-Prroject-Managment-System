<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Committee;
use App\Supervisor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => 'required|integer|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_role' => 'required|integer',
            'department_id'=> 'required|integer',
            'phone' => 'required|integer',
            // 'group_id'=> 'integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

//Process information base don the role of the user
if($data['user_role']==5){
    Student::create([
        'id' => $data['id'],
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'group_id' => null,
        'department_id' => $data['department_id'],
        'password' => Hash::make($data['password']),
        
    ]);

}
elseif($data['user_role']==3){

    Supervisor::create([
        'id' => $data['id'],
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'group_id' => null,
        'department_id' => $data['department_id'],
        'password' => Hash::make($data['password']),
        
    ]);

}

elseif($data['user_role']==2){
    Committee::create([
        'id' => $data['id'],
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        //'phone' => $data['phone'],
        //'group_id' => null,
        //'department_id' => $data['department_id'],
        'password' => Hash::make($data['password']),
        
    ]);
}
       

        return User::create([
            'id' => $data['id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'department_id' => $data['department_id'],
            'user_role' => $data['user_role'],
        ]);


        
         
     return redirect('/')->whith('SuccessMessage', 'A user has been added');
    }
}
