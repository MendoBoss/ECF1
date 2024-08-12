@extends('layouts.tasks')
@section('content')
    <div style="width: 100%; height:100vh;background-image: url('/images/img2.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">
        
    </div>
    <div style="width: 100%; margin:40px">
        <div class="task__container">
            <a href="delete" class="task__delete">X</a>
            <div class="task__date">12/12/2121</div>
            <a href="">
                <div class="task__title">Title</div>
                <div class="task__descriptin">Descrition: Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
            </a>
            <a href="state" class="task__state" style="position: absolute; bottom:20px;">Fait</a>
        </div>
    </div>
@endsection