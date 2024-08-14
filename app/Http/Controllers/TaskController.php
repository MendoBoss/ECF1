<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
// afficher les taches
    public function index(){
        $tasks = Task::all();
        $tri = " ";
        return view('task.index',compact('tasks','tri'));
    }
    // trier les taches
    public function trier($order){
        switch ($order) {
            case 'cd':
                $tasks = Task::orderBy('created_at','desc')->get();        
                $tri = "  date de création décroissante";
                break;
            case 'cc':
                $tasks = Task::orderBy('created_at')->get();        
                $tri = "  date de création croissante";
                break;
            case 'fd':
                $tasks = Task::orderBy('avantLe', 'desc')->get();        
                $tri = "  date de fin décroissante";
                break;
            case 'fc':
                $tasks = Task::orderBy('avantLe')->get();        
                $tri = "  date de fin croissante";
            break;
        }
        
        return view('task.index',compact('tasks','tri'));
    }

// ajouter une tache
    public function add(){
        return view('task.add');
    }
    // enregistrer une tache
    public function storage(Request $request){
        // dd($request);
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'avantLe'=>'required',
        // ]);
        $user = Auth()->user();
        $user->tasks()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'avantLe'=>$request->avantle,
        ]);
        return redirect()->route('task.index');
    }

// modifier une tache  
    public function update(Task $task, $tri){
        $task__one = $task;
        switch ($tri) {
            case '  date de création décroissante':
                $tasks = Task::orderBy('created_at','desc')->get();        
                $tri = "  date de création décroissante";
                break;
            case '  date de création croissante':
                $tasks = Task::orderBy('created_at')->get();        
                $tri = "  date de création croissante";
                break;
            case '  date de fin décroissante':
                $tasks = Task::orderBy('avantLe', 'desc')->get();        
                $tri = "  date de fin décroissante";
                break;
            case '  date de fin croissante':
                $tasks = Task::orderBy('avantLe')->get();        
                $tri = "  date de fin croissante";
            break;
            case ' ':
                $tasks = Task::all();
                $tri = " ";
            break;
        }   
        $open=true;
        return view('task.index',compact('task__one','tasks','tri','open'));
    }
    // enregistrer la modification
    public function edit(Task $task, Request $request){
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'avantLe'=>'required',
        // ]);
        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'avantle'=>$request->avantLe,
        ]);
        return redirect()->route('task.index');
    }
    
// supprimer une tache
    public function delete($id){
        $task = Task::where('id',$id)->first();
        $task->delete();
        return redirect()->route('task.index');
    }

// changer l'etat d'une tache
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
}
