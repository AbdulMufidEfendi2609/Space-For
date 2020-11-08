<header id="navbar-spy" class="header header-1 header-transparent header-fixed">
    <nav id="primary-menu" class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img class="logo logo-dark" src="{{ asset('landing/images/logo/logo-full.png') }}" alt="Kolaso Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toogle-inner"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="active"><a data-scroll="scrollTo" href="#hero">Beranda</a>
                    </li>
                    <li><a data-scroll="scrollTo" href="#feature2">feature</a>
                    </li>
                    <li><a data-scroll="scrollTo" href="#reviews">reviews</a>
                    </li>
                    <li><a data-scroll="scrollTo" href="#clients">clients</a>
                    </li>
                    <li><a data-scroll="scrollTo" data-toggle="modal" data-target="#login" href="#">Masuk</a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</header>
@include('front.modal.login')
