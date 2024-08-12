@extends('layouts.tasks')
@section('content')
    <div style="width: 100%; height:100vh;background-image: url('/images/img2.jpg');background-position: center;background-repeat: no-repeat;background-size: cover; display:flex; flex-direction:column; justify-content:center;align-items:center;">
        <div style="display:flex; flex-direction:column; justify-content:center;align-items:center; width:100%; height:100vh; background-color:rgba(128, 128, 128, 0.274);">
            <h1 style="font-size: 4rem;font-weight:600;">Bienvenue sur la TaskList de l' <span style=" color:rgb(204, 54, 0)">ECF 12/08/2024</span> </h1>
            <a href="#taches" class="btn__action">Voir les taches</a>
        </div>
    </div>
    <div style="width: 100%; padding:40px; display:flex;flex-wrap:wrap; justify-content:center;gap:2rem;" id="taches">
        @forelse ($tasks as $task)
            @if ($task->state=='Faire')
                <div class="task__container">
                    <a href="{{route('task.update',$task)}}" class="task__update">
                        <img src="/images/iconmonstr-pencil-line-lined-48.png" width="20px" alt="">
                    </a>
                    <a href="{{route('task.delete',$task->id)}}" class="task__delete">
                        <img src="/images/iconmonstr-x-mark-circle-lined-48.png" width="20px" alt="">
                    </a>
                    <div class="task__date">Créee le : {{$task->created_at->format('Y-m-d')}}</div>
                    <hr>
                    <a href="{{route('task.update',$task)}}" style="display: flex;flex-direction:column;gap:1.5rem">
                        <div class="task__title">{{$task->title}}</div>
                        <div class="task__descriptin">{{$task->description}}</div>
                    </a>
                    <div style="position: absolute; bottom:20px; width:80%; display:flex; justify-content:space-between">
                        <p style="font-size: 0.8rem">Avant le : {{$task->avantLe}}</p>
                        <a href="{{route('task.state',$task->id)}}" class="task__state" style="font-size: 0.8rem">
                            <img src="/images/iconmonstr-delivery-19-48.png" width="20px" alt="">
                        </a>
                    </div>
                </div>                
            @else
                <div class="task__container" style="background-color: rgba(0, 128, 0, 0.315)">
                    <a href="{{route('task.update',$task)}}" class="task__update">
                        <img src="/images/iconmonstr-pencil-line-lined-48.png" width="20px" alt="">
                    </a>
                    <a href="{{route('task.delete',$task->id)}}" class="task__delete">
                        <img src="/images/iconmonstr-x-mark-circle-lined-48.png" width="20px" alt="">
                    </a>
                    <div class="task__date">{{$task->created_at}}</div>
                    <hr>
                    <a href="{{route('task.update',$task)}}" style="display: flex;flex-direction:column;gap:1.5rem">
                        <div class="task__title">{{$task->title}}</div>
                        <div class="task__descriptin">{{$task->description}}</div>
                    </a>
                    <div style="position: absolute; bottom:20px; width:80%; display:flex; justify-content:space-between">
                        <p style="font-size: 0.8rem">Avant le : {{$task->avantLe}}</p>
                        <a href="{{route('task.state',$task->id)}}" class="task__state" style="font-size: 0.8rem">
                            <img src="/images/iconmonstr-check-mark-12-48.png" width="20px" alt="">
                        </a>
                    </div>
                </div>
            @endif
        @empty
            <h2 style="font-size: 5rem; width:100%; font-weight:600;">Vous n'avez pas encore de tache enregistré !</h2>
        @endforelse
    </div>
@endsection