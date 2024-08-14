    {{-- menu flotant --}}
    @auth
        <div id="menu__container">
            <input type="hidden" id="isConnect" value="true">
            <img src="/images/iconmonstr-menu-circle-lined-48.png" alt="" width="" id="menu__container__img">
            <div class="menu__plus" id="menu__profil" >
                <a href="{{route('profile.edit')}}" id="menu__profil__img" hidden>
                    <img src="/images/iconmonstr-user-circle-thin-48.png" alt="" width="25px">
                </a>
            </div>
            <div class="menu__plus" id="menu__accueil">
                <a href="{{route('task.index')}}" id="menu__accueil__img" hidden><img src="/images/iconmonstr-building-8-48.png" alt="" width="25px"></a>
            </div>
            <div class="menu__plus" id="menu__add">
                <button id="menu__add__img" hidden><img src="/images/iconmonstr-plus-circle-lined-48.png" alt="" width="25px"></button>
                {{-- <a href="{{route('task.add')}}" id="menu__add__img" hidden><img src="/images/iconmonstr-plus-circle-lined-48.png" alt="" width="25px"></a> --}}
            </div>

            <form method="POST" action="{{ route('logout') }}" class="menu__plus" id="menu__logout">
                @csrf
                <button id="menu__logout__img" hidden><img src="/images/iconmonstr-log-out-10-48.png" alt="" width="25px"></button>
            </form>

        </div>
    @else
        <div id="menu__container">
            <input type="hidden" id="isConnect" value="false">
            <img src="/images/iconmonstr-menu-circle-lined-48.png" alt="" width="" id="menu__container__img">
            <div class="menu__plus" id="menu__register">
                <a href="{{route('register')}}">
                    <img src="/images/iconmonstr-user-10-48.png"  id="menu__register__img" alt="" width="25px">
                </a>
            </div>
            <div class="menu__plus" id="menu__login">
                <a href="{{ route('login') }}" class="btn__log" id="menu__login__img"  hidden>
                    <img src="/images/iconmonstr-log-out-4-48.png" alt="" width="25px">
                </a>
            </div>
        </div>
    @endauth
    <script>
        var menu = document.getElementById('menu__container');
        var menu_img = document.getElementById('menu__container__img');
        var isConnect = document.getElementById('isConnect').value;
        // var plus = document.getElementsByClassName('menu__plus');

        var profil = document.getElementById('menu__profil');
        var profil__img = document.getElementById('menu__profil__img');
        var add = document.getElementById('menu__add');
        var add__menu = document.getElementById('add');
        var add__close = document.getElementById('add__close');
        var add__img = document.getElementById('menu__add__img');
        var accueil = document.getElementById('menu__accueil');
        var accueil__img = document.getElementById('menu__accueil__img');
        var logout = document.getElementById('menu__logout');
        var logout__img = document.getElementById('menu__logout__img');

        var register = document.getElementById('menu__register');
        var register__img = document.getElementById('menu__register__img');
        var login = document.getElementById('menu__login');
        var login__img = document.getElementById('menu__login__img');

        var btn_log = document.getElementsByClassName('btn__log');
        var state = 0;
        // menu openning
        menu.addEventListener('click',function(){
            if(isConnect == 'true'){
                if(state == 0){
                    profil.style.opacity=1;
                    profil__img.hidden=false;
                    profil.style.translate='20px -50px';
                   
                    accueil.style.opacity=1;
                    accueil__img.hidden=false;
                    accueil.style.translate='-20px -50px';
                    
                    add.style.opacity=1;
                    add__img.hidden=false;
                    add.style.translate='-50px -20px';
                   
                    logout.style.opacity=1;
                    logout__img.hidden=false;
                    logout.style.translate='-50px 20px';
    
                    menu_img.style.transform = 'rotate(360deg)';
                    menu_img.style.scale = 0.5;
                    btn_log.hidden=false;
                    state = 1
                }else{
                    profil.style.opacity=0;
                    profil.style.translate='0 0px';
                    profil__img.hidden=true;
    
                    accueil.style.opacity=0;
                    accueil.style.translate='0 0px';
                    accueil__img.hidden=true;
    
                    add.style.opacity=0;
                    add.style.translate='0 0px';
                    add__img.hidden=true;
    
                    logout.style.opacity=0;
                    logout.style.translate='0 0px';
                    logout__img.hidden=true;
    
                    menu_img.style.transform = 'rotate(-360deg)';
                    menu_img.style.scale = 1;
                    // btn_log.hidden=true;
                    state = 0
                }
            }else{
                if(state == 0){
                    register.style.opacity=1;
                    register__img.hidden=false;
                    register.style.translate='0px -50px';
                   
                    login.style.opacity=1;
                    login__img.hidden=false;
                    login.style.translate='-50px -20px';
                        
                    menu_img.style.transform = 'rotate(360deg)';
                    menu_img.style.scale = 0.5;
                    btn_log.hidden=false;
                    state = 1
                }else{
                    register.style.opacity=0;
                    register.style.translate='0 0px';
                    register__img.hidden=true;
    
                    login.style.opacity=0;
                    login.style.translate='0 0px';
                    login__img.hidden=true;
        
                    menu_img.style.transform = 'rotate(-360deg)';
                    menu_img.style.scale = 1;
                    // btn_log.hidden=true;
                    state = 0
                }
            }
            
        })

        // add openning
        add__img.addEventListener('click',function(){
            add__menu.style.translate='100%';
        })
        // add closing
        add__close.addEventListener('click',function(){
            add__menu.style.translate='-100%';
        })
    </script>
    {{-- fin menu flotant --}}
