<header id="navbar-spy" class="header header-1 header-transparent header-fixed" style="background: rgba(29, 54, 80, 0.7)">
    <nav id="primary-menu" class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{url('')}}">
                <img class="logo logo-dark" src="{{ asset('landing/images/logo/logo-full.png') }}" alt="Kolaso Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toogle-inner"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto ">
                
                @guest
                <li class="active"><a data-scroll="scrollTo" href="{{url('')}}" style="color:white"><strong>DASHBOARD</strong></a>
                </li>
                @else
                @php
                $dashboard = url('');
                if (auth()->user()->level === 'admin') {
                    $dashboard = route('users.index');
                }
                @endphp
                
                <li class="active"><a data-scroll="scrollTo" href="{{$dashboard}}" style="color:white"><strong>DASHBOARD</strong></a>
                </li>
                @endguest
                <li><a data-scroll="scrollTo" href="{{url('event-index')}}" style="color:white"><strong>EVENT</strong></a>
                </li>
                {{-- <li><a data-scroll="scrollTo" href="#pricing" style="color:white"><strong>SERVICE</strong></a>
                </li>
                <li><a data-scroll="scrollTo" href="#feature2"style="color:white"><strong>ABOUT US</strong></a>
                </li> --}}
                @guest
                <li><a data-scroll="scrollTo" href="{{route('login')}}" style="color:#F96145" ><strong>LOGIN</strong></a>
                </li>
                <li><a data-scroll="scrollTo" href="{{route('register')}}" style="color:#F96145"><strong>REGISTER</strong></a>
                </li>
                @else
                @if (auth()->user()->level=="penyedia")
                <li><a data-scroll="scrollTo" href="{{url('organization')}}" style="color:white"><strong>ORGANISASI</strong></a>
                </li>
                @endif
                <li><a data-scroll="scrollTo" href="{{route('profile')}}"style="color:white"><strong>PROFIL</strong></a>
                </li>
                <li><a data-scroll="scrollTo" href="{{route('logout')}}" style="color:#F96145" ><strong>LOGOUT</strong></a>
                </li> 
                @endguest
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
</header>
@include('front.modal.login')
