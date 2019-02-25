<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PostNotification;
use Notification;
use App\User;
use App\Student;
use App\Supervisor;
use App\Message;
use App\Group;
use App\Committee;
use Auth;
use DB;



use App\Events\NewMessage;


class ContactsController extends Controller
{
    use Notifiable;
    public function get()
    {

        if(Auth::user()->user_role == 5){
        // get all users except the authenticated one
        $CurrUserID = auth()->id();
        // $CurrUserGroup = DB::select(DB::raw("SELECT group_id from students where id = $CurrUserID  "));
        $CurrUserGroup = Student::where('id', '=',auth()->id())->value('group_id');
        $contacts = Student::where('id', '!=', auth()->id())->where('group_id','=',$CurrUserGroup)->get();
        $contactsG = Supervisor::where('id', '=', 3)->get();
        $contactsGPCC = Committee::where('id',2)->get();
        
        // $contacts = DB::select(DB::raw("SELECT * from students where group_id = $CurrUserGroup  "));
        // $contactsG = DB::table('supervisors')->where('id', '=', 3);
        if($CurrUserGroup == NULL){
            $contacts = [];
            return response()->json($contacts);
        }
        foreach($contactsG as $contactG){
            $contacts->push($contactG);
        }
        foreach($contactsGPCC as $contactGPCC){
            $contacts->push($contactGPCC);
        }

    }
    else if(Auth::user()->user_role == 3){

        $SupervisorStudentGroup = Group::where('Supervisor_ID', Auth::user()->id)->value('id');
        if($SupervisorStudentGroup != Null){
            $contacts =  Student::where('Group_id', $SupervisorStudentGroup)->get();
            $GPC = Committee::all();
    
            foreach($GPC as $GPC){
                $contacts->push($GPC);
            }
        }
        else{
            $contacts= [];
        }
        
        
        

    }

    else if(Auth::user()->user_role == 2){

        $contacts = User::all();

    }
    else if (Auth::user()->user_role == 4) {

        $contacts = Committee::all();

    }

    else{

    }
        
        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        
        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        $user = Auth::user();
        $to= User::find($request->contact_id);
        $fromname= Auth::user()->first_name;
        $message->setAttribute('fromname', $fromname);
        // $user->notify(new App\Notifications\PostNotification());

            // $user->notify(new PostNotification($message));
           
            // \Notification::send($user, new PostNotification($message));
           

        broadcast(new NewMessage($message));


        Notification::send($to, new PostNotification($message));
        return response()->json($message);
    }
}
