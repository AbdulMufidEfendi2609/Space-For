<header id="navbar-spy" class="header header-1 header-transparent header-fixed" style="background: rgba(29, 54, 80, 0.7)">
    <nav id="primary-menu" class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toogle-inner"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto ">
                    @php
                    $dashboard = route('home');
                        if (auth()->user()->level === 'admin') {
                            $dashboard = route('users.index');
                        }
                    @endphp

                    <li class="active"><a data-scroll="scrollTo" href="{{$dashboard}}" style="color:white"><strong>DASHBOARD</strong></a>
                    </li>
                    <li><a data-scroll="scrollTo" href="#feature1" style="color:white"><strong>EVENT</strong></a>
                    </li>
                    @if (auth()->user()->level=="penyedia")
                    <li><a data-scroll="scrollTo" href="#pricing" style="color:white"><strong>BILLINGG & PAYMENT</strong></a>
                    </li>
                    <li><a data-scroll="scrollTo" href="#feature2"style="color:white"><strong>ORGANIZATION</strong></a>
                    </li>
                    @endif
                    <li><a data-scroll="scrollTo" href="#feature2"style="color:white"><strong>ABOUT US</strong></a>
                    </li>
                    <li><a data-scroll="scrollTo" href="{{route('profile')}}"style="color:white"><strong>Profile</strong></a>
                    </li>
                    <li><a data-scroll="scrollTo" href="{{route('logout')}}" style="color:#F96145" ><strong>Logout</strong></a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</header>
@include('front.modal.login')
