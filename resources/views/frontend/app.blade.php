<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="{{asset('js/jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontendCss/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontendCss/bootstrap.css')}}">


    @yield('css')
    <title>Edocean</title>
</head>
<body>

<nav class="navbar navbar-expand-lg  sticky-top ed-navbar">
    <div class="container">
        <a href=""><img class="edocean-logo" src="./frontendCss/images/edocean-logo.jpeg" alt=""></a>
        <div class="navbar-desktop">
            <ul class="navbar-nav pe-3">
                @foreach($menu as $m)
                    <li class="nav-item">
                        <a class="nav-link" href="/{{$m->page}}">{{$m->name}} </a>
                    </li>
                @endforeach
            </ul>
            <div class="search-form-and-btn">
                <form class="d-flex search-ed">
                    <input class="form-control me-2" type="text" placeholder="Axtar...">
                    <button class="btn search-iconn" type="button">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>



                @if(Auth::check())

                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{  Auth::user()->id }}
                            <img class="profile-dropdown-img"
                                 src="data:image/jpeg;base64,{{base64_encode('hh')}}">
                        </button>
                        <ul class="dropdown-menu prfl-ul" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="">My Profile</a></li>
                            @if(Auth::user()->author==1)
                                <li><a class="dropdown-item" href="{{url('/admin/index')}}">Admin Page</a></li>
                            @elseif(Auth::user()->author==2)
                                <li><a class="dropdown-item" href="{{url('/admin/course/index')}}">Course Profile</a>
                                </li>
                            @elseif(Auth::user()->author==3)
                                <li><a class="dropdown-item" href="{{url('/admin/teacher/index')}}">Teacher Profile</a>
                                </li>
                            @elseif(Auth::user()->author==4)
                                <li><a class="dropdown-item" href="{{url('/admin/student/index')}}">Student Profile</a>
                                </li>
                            @endif
                            <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <button class="btn login-btnn" type="button"><a href="{{route('sign_in')}}">Daxil ol</a></button>
                @endif
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a href=""><img class="edocean-logo" src="./frontendCss/images/edocean-logo.jpeg" alt=""></a>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ana Səhifə</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Müəllimlər</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kurslar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tələbələr</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Haqqımızda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bloqlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Əlaqə</a>
                    </li>
                    <div class="search-form-and-btn">
                        <form class="d-flex search-ed">
                            <input class="form-control me-2" type="text" placeholder="Axtar...">
                            <button class="btn search-iconn" type="button">
                                <ion-icon name="search-outline"></ion-icon>
                            </button>

                        </form>
                        <button class="btn login-btnn" type="button"><a href="./login.html">Daxil ol</a></button>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="profile-dropdown-img" src="./frontendCss/images/edocean-logo.jpeg" alt="">
                            </button>
                            <ul class="dropdown-menu prfl-ul" aria-labelledby="dropdownMenu2">
                                <li><a class="dropdown-item" href="">Profile</a></li>
                                <li><a class="dropdown-item" href=""> Lorem, ipsum.</a></li>
                                <li><a class="dropdown-item" href="">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<footer class="ed-footer">
    <div class="ed-footer-map">
        <div class="container-fluid">
            <div class="row">
                <div class="logo-and-social col-lg-4 col-md-3 col-sm-6 mb-5">
                    <div class="logo-and-p">
                        <img src="./frontendCss/images/edocean-footer-logo.jpeg" alt=""/>
                        <p>
                            Great lesson ideas and lesson plans for ESL teachers! Educators
                            can customize lesson plans to best.
                        </p>
                    </div>
                    <div class="sociall">
                        <a href="">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                        <a href="">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                        <a href="">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="site-map col-lg-2 col-md-3 col-sm-6 mb-5">
                    <h3>Company</h3>
                    <div>
                        <p>About</p>
                        <p>Courses</p>
                        <p>Events</p>
                        <p>Instructor</p>
                        <p>Career</p>
                        <p>Become a Teacher</p>
                        <p>Contact</p>
                    </div>
                </div>
                <div class="site-map col-lg-2 col-md-3 col-sm-6 mb-5">
                    <h3>Platform</h3>
                    <div>
                        <p>Browse Library</p>
                        <p>Library</p>
                        <p>Partners</p>
                        <p>News & Blogs</p>
                        <p>FAQs</p>
                        <p>Tutorials</p>
                    </div>

                </div>
                <div class="site-map col-lg-2 col-md-3 col-sm-6 mb-5">
                    <h3>Platform</h3>
                    <div>
                        <p>Browse Library</p>
                        <p>Library</p>
                        <p>Partners</p>
                        <p>News & Blogs</p>
                        <p>FAQs</p>
                        <p>Tutorials</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="developed-by">
        <p>© 2022 Educal, All Rights Reserved. Design By Theme Pure</p>
    </div>
</footer>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@yield('js')
</body>
</html>


