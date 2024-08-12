<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('task.index',compact('tasks'));
    }
    public function add(){
        return view('task.add');
    }
    public function storage(Request $request){
        $user = Auth()->user();
        $user->tasks()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'avantLe'=>$request->avantle,
        ]);
        return redirect()->route('task.index');
    }

    public function state($id){
        $task = Task::where('id',$id)->first();
        if($task->state == 'Faire'){
            $task->state = 'Fait';
        }else{
            $task->state = 'Faire';
        }
        $task->save();
        return back();
    }

    public function update(Task $task){
        return view('task.update',compact('task'));
    }
    public function edit(Task $task, Request $request){
        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'avantle'=>$request->avantLe,
        ]);
        return redirect()->route('task.index');
    }

    public function delete($id){
        $task = Task::find($id)->first();
        $task->delete();
        return redirect()->route('task.index');
    }
}
