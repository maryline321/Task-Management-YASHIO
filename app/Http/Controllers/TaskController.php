<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function showTasks()
    {
        $user = Auth::user();
        $tasks = Task::where('user_id', $user->id)->orderBy('due_date', 'desc')->get();
    
        return view('Tasks.viewtasks', compact('tasks'));
    }
    

    public function addtasks(){
        
        return view('Tasks.addtasks');

    
    }
    public function savetasks(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'due_date'=>'required',
            
        ]);

        $title =$request->title;
        $description =$request->description;
        $due_date =$request->due_date;
        
        $user = Auth::user();
        $task = new Task();
        $task->title =$title;
        $task->description =$description;
        $task->due_date =$due_date;
        $task->user_id = $user->id;
        $task->save();

        return redirect('/addtasks')->with('success', "Task Added Successfully");

    }
}
