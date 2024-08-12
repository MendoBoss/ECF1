@extends('layouts.tasks')
@section('content')
    <div style="width: 100%; height:100vh;background-image: url('/images/img2.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">
       <div style="width: 100%; height:100vh; background-color:rgba(128, 128, 128, 0.363); display:flex; justify-content:center;align-items:center">
            <div style="display: flex; width:80%; border-radius:10px; background-color:rgba(245, 245, 245, 0.459)">
                <div style="width: 60%;">
                    <img src="/images/img1.jpg" alt="img" width="100%" style="object-fit: cover; border-radius:10px 0px 0px 10px;">
                </div>
                <form method="post" action="{{route('task.storage')}}" style="width: 40%; padding:20px; display:flex; flex-direction:column; justify-content:center; gap:1.5rem">
                    @csrf
                    <h1 style="width: 100%; text-align:center; font-weight:600; font-size:2rem;color:rgb(204, 54, 0)">Nouvelle tache</h1>
                    <div style="display: flex; flex-direction:column;">
                        <label for="title" style="font-weight: 500;font-size:0.8rem">Titre</label>
                        <input style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" type="text" name="title" required>
                    </div> 
                    <div style="display: flex; flex-direction:column;">
                        <label for="description" style="font-weight: 500;font-size:0.8rem">Descrition</label>
                        <textarea style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" name="description"  cols="30" rows="5" required></textarea>
                    </div> 
                    <div style="display: flex; flex-direction:column;">
                        <label for="avantle" style="font-weight: 500;font-size:0.8rem">Avant le</label>
                        <input style="border: none;border-radius: 10px;box-shadow: 1px 1px 5px 1px rgba(128, 128, 128, 0.800);}" type="date" name="avantle" required>
                    </div> 
                    <input class="add" type="submit" value="Enregistrer">
                </form>
            </div>
       </div>
    </div>
@endsection