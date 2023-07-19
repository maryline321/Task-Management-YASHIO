<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{

    public function redirect(){
        
        if(Auth::check())
        {

            return view('user.home');

        }
        else{

            return redirect()->back();
        }
    }

    public function showTasks()
    {
        $user = Auth::user();
        $tasks = Task::where('user_id', $user->id)->orderBy('due_date', 'desc')->get();
    
        // return view('Tasks.viewtasks', compact('tasks'));
        return TaskResource::collection($tasks);
    }
    

    public function addTasks(){
        
        return view('Tasks.addtasks');

    
    }
    public function saveTasks(Request $request){

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

    public function editTask($id){
        $data = Task::where('id', '=', $id)->first();
        return view('Tasks.edittasks',compact('data'));

    }

    
    public function updateTask(UpdateTaskRequest $request)
    {
        $id = $request->id;
        $title = $request->title;
        $description = $request->description;
        $due_date = $request->due_date;

        Task::where('id', '=', $id)->update([
            'title' => $title,
            'description' => $description,
            'due_date' => $due_date,
        ]);

        return redirect()->back()->with('success', "Task Updated Successfully");
    }


    public function deleteTask($id){
        Task::where('id', '=',$id)->delete();
        return redirect('/tasks')->with('success', "Task deleted Successfully");
    }
}
