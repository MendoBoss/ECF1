<header style="position: fixed; top:0;width:100%; background-color:rgba(245, 245, 245, 0.555); padding:10px;display:flex;justify-content:space-between;align-items:center;padding:10px 20px"> 
    <div style="display:flex; justify-content:center; gap:3rem;">
        <a href="{{route('task.index')}}" style="font-size: 1.2rem;font-weight:600;color:rgb(204, 54, 0)">Accueil</a>
        <a href="{{route('task.add')}}" style="font-size: 1.2rem;font-weight:600;color:rgb(204, 54, 0)">Ajouter une tache</a>
    </div>
    <div style="display:flex; justify-content:center; gap:3rem;color:rgb(204, 54, 0)">
        <a href="{{route('profile.edit')}}">Profil</a>
        <!-- Authentication -->
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button>Log_out</button>
        </form>
        @else
            <a href="{{ route('login') }}">Log_in</a>
        @endauth
    </div>
</header>