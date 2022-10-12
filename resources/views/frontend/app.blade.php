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
<header class="ed-header">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top ed-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href=""
            ><img class="edocean-logo" src="./frontendCss/images/edocean-logo.jpeg" alt=""
                /></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mynavbar"
            >
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item me-2">
                        <a class="nav-link" href="/index">Ana Səhifə</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="">Müəllimlər</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="">Kurslar</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="">Tələbələr</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="">Bloglar</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="">Haqqımızda</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="/contact_us">Əlaqə</a>
                    </li>

                    <li class="nav-item me-2">
                        @if (Auth::check())
                            <li class="nav-item me-2 auth" style="padding-left: 140px"><a class="nav-link" href="{{url('logout')}}">Logout</a></li>
                        @else
                            <li class="nav-item me-2 auth" style="padding-left: 140px"><a class="nav-link" href="{{ route('sign_in') }}">Login</a></li>
                            <li class="nav-item me-2 auth"><a class="nav-link" href="{{ route('sign_up') }}">Register</a></li>
                        @endif
                    </li>


                </ul>
            </div>
        </div>
    </nav>
</header>

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


