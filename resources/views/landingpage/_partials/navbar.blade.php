<header id="header" class="header d-flex align-items-center fixed-top">

    
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            {{-- <!-- <img src="{{ assets('public/img/logo.png')}}" alt=""> --> --}}
            <h1>myBerita</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                {{-- <li><a href="single-post.html">Single Post</a></li> --}} 
                <li class="dropdown"><a href="{{ url('/category') }}"><span>Categories</span></a>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">
            <button class="btn btn-primary btn-sm">
                <a class="text-light" href="{{ url('/administrator') }}" class="mx-2">Admin Panel</a>
            </button>
            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>



            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="{{url('/result')}}" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" class="form-control">
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header>
<main id="main">