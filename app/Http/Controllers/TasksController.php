<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;

class TasksController extends Controller
{
    //

    public function add(Request $request)
    {

        $request->validate([
            'Describtion' => 'required|min:10|max:30',
            'Member' => 'required',

        ]);
        
        $task = new Task();

        $task->From = Auth::user()->id;
        $task->To = $request->input('Member');
        $task->group_id = $request->input('group_id');
        $task->Describtion = $request->input('Describtion');
        $task->Done = False;

        $task->save();

        return redirect('/')->with('SuccessMessage','A task has been added !');
    }

    public function Check()
    {
        return "Hello";
    }

    public function Done(Request $request)
    {
        
        $task = Task::find($request->Task_id);
        $task->Done = 1;
        $task->save();

        return redirect('/')->with('SuccessMessage', 'Task marked Done');
    }

    public function unDone(Request $request)
    {
        
        $task = Task::find($request->Task_id);
        $task->Done = 0;
        $task->save();

        return redirect('/')->with('SuccessMessage', 'Task marked not done');
    }

}
