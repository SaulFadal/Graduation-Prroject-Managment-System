<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eventt;
use App\User;
use Auth;
use Illuminate\Notifications\Notifiable;
use App\Notifications\event;
use Notification;


class EventController extends Controller
{
    use Notifiable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = Eventt::all();
    return view('events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        if(Auth::user()->user_role != 2){
            return redirect('/')->with('ErrorMessage', 'You are not allowed to access this resource');
        }else{

        
        return view('eventcreate');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ALL = User::all();
        

        $event = Eventt::create([
            'name' => $request->name,
            'description' => $request->description,
            'event_date' => $request->event_date
        ]);

        // $event = Eventt::where('name', $request->name);
        Notification::send($ALL, new event($event));
        return redirect('event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
