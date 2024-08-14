@extends('layouts.tasks')
@section('content')
    {{-- <div style="width: 100%; height:100vh;background-image: url('/images/img2.jpg');background-position: center;background-repeat: no-repeat;background-size: cover; display:flex; flex-direction:column; justify-content:center;align-items:center;">
        <div style="display:flex; flex-direction:column; justify-content:center;align-items:center; width:100%; height:100vh; background-color:rgba(128, 128, 128, 0.274);">
            <h1 style="font-size: 4rem;font-weight:600;">Bienvenue sur la TaskList de l' <span style=" color:rgb(204, 54, 0)">ECF 12/08/2024</span> </h1>
            <a href="#taches" class="btn__action">Voir les taches</a>
        </div>
    </div> --}}

    {{-- background --}}
    <div style="position:fixed; top:0;width: 100%; height:100vh;background-image: url('/images/img2.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;background-attachment: fixed;">
    </div>

    {{-- content --}}
    <div style="position: absolute; top:0; min-height:100vh; background-color:rgba(226, 226, 226, 0.651)">
        {{-- trier --}}
        <div style="position:relative; width: 100%; padding:40px; display:flex; justify-content:center;align-items:center;">
            <button id="tri" style=" border-radius:10px 10px 0 0; padding:0.5rem 2rem; background-color:rgba(255, 255, 255, 0.836); box-shadow:1px 1px 15px 0px rgba(255, 68, 0, 0.548);">Trier par > {{$tri}}</button> 
            <ul class="tri__dropdown" id="tri_ul" hidden>
                <li><a href="{{route('task.trier','cc')}}">date de création croissante</a></li>
                <li><a href="{{route('task.trier','cd')}}">date de création décroissante</a></li>
                <li><a href="{{route('task.trier','fc')}}">date de fin croissante</a></li>
                <li><a href="{{route('task.trier','fd')}}">date de fin décroissante</a></li>
    
            </ul>
        </div>
        {{-- tasks cards --}}
        <div style="width: 100%; padding:40px; display:flex;flex-wrap:wrap; justify-content:center;gap:2rem;" id="taches">
            @forelse ($tasks as $task)
                @if ($task->state=='Faire')
                    <div class="task__container" style=" background-color:rgba(255, 255, 255, 0.836);">
                        <a href="{{route('task.update',['task'=>$task,'tri'=>$tri])}}" class="task__update">
                            <img src="/images/iconmonstr-pencil-line-lined-48.png" width="20px" alt="">
                        </a>
                        <a href="{{route('task.delete',$task->id)}}" class="task__delete">
                            <img src="/images/iconmonstr-x-mark-circle-lined-48.png" width="20px" alt="">
                        </a>
                        <div class="task__date">Créee le : {{$task->created_at->format('Y-m-d')}}</div>
                        <hr>
                        <a href="{{route('task.update',['task'=>$task,'tri'=>$tri])}}" style="display: flex;flex-direction:column;gap:1.5rem">
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
                    <div class="task__container" style="background-color: rgba(0, 128, 0, 0.795)">
                        <a href="{{route('task.update',['task'=>$task,'tri'=>$tri])}}" class="task__update">
                            <img src="/images/iconmonstr-pencil-line-lined-48.png" width="20px" alt="">
                        </a>
                        <a href="{{route('task.delete',$task->id)}}" class="task__delete">
                            <img src="/images/iconmonstr-x-mark-circle-lined-48.png" width="20px" alt="">
                        </a>
                        <div class="task__date">Créee le : {{$task->created_at->format('Y-m-d')}}</div>
                        <hr>
                        <a href="{{route('task.update',['task'=>$task,'tri'=>$tri])}}" style="display: flex;flex-direction:column;gap:1.5rem">
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
        {{-- add --}}
        <div id="add">
            <div style="display:flex; justify-content:end;padding: 0 12px">
                <button id="add__close"><img src="/images/iconmonstr-x-mark-circle-lined-48_2.png" alt="" width="30px"></button>
            </div>
            <form method="post" action="{{route('task.storage')}}" style="width: 100%; padding:20px; display:flex; flex-direction:column; justify-content:center; gap:1.5rem">
                @csrf
                <h1 style="width: 100%; text-align:center; font-weight:600; font-size:2rem;color:white">Nouvelle tache</h1>
                <div style="display: flex; flex-direction:column;">
                    <label for="title" style="font-weight: 500;font-size:0.8rem;color:white">Titre</label>
                    <input style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" type="text" name="title" required>
                </div> 
                <div style="display: flex; flex-direction:column;">
                    <label for="description" style="font-weight: 500;font-size:0.8rem;color:white">Descrition</label>
                    <textarea style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" name="description"  cols="30" rows="5" required></textarea>
                </div> 
                <div style="display: flex; flex-direction:column;">
                    <label for="avantle" style="font-weight: 500;font-size:0.8rem;color:white">Avant le</label>
                    <input style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" type="date" name="avantle" required>
                </div> 
                <input class="add" type="submit" value="Enregistrer">
            </form>

        </div>
        {{-- update --}}
        @if (isset($task__one))
            <input type="hidden" id="open" value="open">
            <div id="update">
                <div style="display:flex; justify-content:end;padding: 0 12px">
                    <button id="update__close"><img src="/images/iconmonstr-x-mark-circle-lined-48_2.png" alt="" width="30px"></button>
                </div>
                <form method="post" action="{{route('task.edit',$task__one)}}" style=" display:flex; flex-direction:column; justify-content:center; gap:1rem"">
                    @csrf
                    <h1 style="width: 100%; text-align:center; font-weight:600; font-size:2rem;color:white; padding:20px">Modifier une tâche</h1>
                    <div style="display: flex; flex-direction:column;">
                        <label for="title" style="font-weight: 500;font-size:0.8rem;color:white">Titre</label>
                        <input style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" value="{{$task__one->title}}" type="text" name="title" required>
                    </div> 
                    <div style="display: flex; flex-direction:column;">
                        <label for="description" style="font-weight: 500;font-size:0.8rem;color:white">Descrition</label>
                        <textarea style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" name="description"  cols="30" rows="5" required>{{$task__one->description}}</textarea>
                    </div> 
                    <div style="display: flex; flex-direction:column;">
                        <label for="avantle" style="font-weight: 500;font-size:0.8rem;color:white">Avant le</label>
                        <input style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" value="{{$task__one->avantLe}}" type="date" name="avantle" required>
                    </div> 
                    <div>
                        <input class="add" type="submit" value="Modifier">
                    </div>
                </form>
                <div style="width: 100%; margin-top:1rem">
                    <a href="{{route('task.delete',$task__one->id)}}" class="sup">Supprimer la tâche</a>
                </div>

            </div>  
        @else
            <input type="hidden" id="open" value="close">          
        @endif

    </div>



    <script>
        var tir = document.getElementById('tri');
        var tir_ul = document.getElementById('tri_ul');
        var hidde = 0;

        var update__close = document.getElementById('update__close');
        var update = document.getElementById('update');

        var open = document.getElementById('open').value;

        
        // trier
        tri.addEventListener('click',function(){
            
            if(hidde == 0){
                tri_ul.hidden = false;
                hidde = 1;
            }else{
                tri_ul.hidden = true;
                hidde = 0;
            }
        })
        
        // update
        update__close.addEventListener('click',function(){
            update.style.translate='-100%';
        })
        if(open == 'open'){
            setTimeout(()=>{update.style.translate='100%';},100)
        }


    </script>
@endsection