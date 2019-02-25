<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use Auth;
use App\Student;
use App\Supervisor;
use App\Group;
use App\Task;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $not =Auth::user()->unreadnotifications;
        //Using a session variable to store user notifications to display them an ALL views
        Session(['not'=>$not]);

        //Getting members of group and the sipervosor info to dispaly on main page
        $CurrentUser = Auth::user()->id;
        if(Auth::user()->user_role == 5){
            $CurrentUserGroup = Student::where('id',$CurrentUser)->value('group_id');
        } elseif (Auth::user()->user_role == 3){
            $CurrentUserGroup = Supervisor::where('id',$CurrentUser)->value('group_id');
        }

        else{
            $CurrentUserGroup = NULL;
        }
        
        //Check condition
        // return $CurrentUserGroup;
        if($CurrentUserGroup != NULL){
          
            
        $GroupMembers =  DB::select(DB::raw("SELECT id, first_name, last_name from students where group_id = $CurrentUserGroup "));
        $GroupLeader= Group::where('id', $CurrentUserGroup)->value('Leader');
        $GroupSupervisor =  DB::select(DB::raw("SELECT id, first_name, last_name from supervisors where group_id = $CurrentUserGroup "));
        $MebersInSelectDropDown = Student::where('group_id',$CurrentUserGroup)->pluck('id','id');
        $Tasks = Task::where('group_id', $CurrentUserGroup)->get();
    
        // return $CurrentUserGroup;
        return view('index', compact('GroupMembers','GroupSupervisor', 'CurrentUserGroup','MebersInSelectDropDown', 'Tasks','GroupLeader'));
    }
    else{
        // return "No";
        $GroupMembers=NULL;
        $GroupSupervisor=NULL;
        $CurrentUserGroup= "Not in a group";
        
        return view('index', compact('GroupMembers','GroupSupervisor', 'CurrentUserGroup'));
    }
        
        
        
    }

    public function chat()
    {
        return view('home');
    }

    public function userProfile(){
        return view('user');
    }
    public function x()
    {
        $not =Auth::user()->notifications;
            if(count($not)>0){
                return $not[0]->data;
            }
            else return 'No data';
    }
}
