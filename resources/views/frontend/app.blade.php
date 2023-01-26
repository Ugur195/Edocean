<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{asset('frontendCss/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontendCss/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontendCss/bootstrap.css')}}">

    @yield('css')
    <title>Edocean</title>
</head>
<body>

<header>
    <nav class="container ed_nav">
        <div class="ed_nav_logo">
            <img src="/frontendCss/images/edocean-logo.jpeg" alt="">
        </div>
        <ul class="navbar_links">
          <span id="close_menu">
            <ion-icon name="close-circle-outline"></ion-icon>
          </span>
            @foreach($menus as $menu)
                <li class="nav_link"><a href="/{{$menu->page}}">{{$menu->name}}</a></li>
                @if($menu->slug === 'home-2022')
                    <ul class="drp_dwn">
                        <li class="nav_link" id="drp_dwn_li"><a href="">Elanlar</a>
                            <ion-icon class="drp-icn" name="chevron-down-outline"></ion-icon>
                        </li>
                        <ul class="dropdown_ul">
                            <li class="nav_link"><a href="{{url('/teachers')}}">Müəllim Elanları</a></li>
                            <li class="nav_link"><a href="{{url('/courses')}}">Kurs Elanları</a></li>
                            <li class="nav_link"><a href="{{url('/students')}}">Tələbə Elanları</a></li>
                        </ul>
                    </ul>
                @endif
            @endforeach
        </ul>
        <div class="srch_and_login">
            <div class="search_div">
                <input class="srch_inp" type="text" placeholder="Axtar...">
                <button class="search_icon" type="button">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>

            @if(Auth::check())
                <div class="login_profile">
                    <a class="user_img_a" href="">
                        <img class="user_img"
                             src="data:image/jpeg;base64,{{base64_encode(auth()->user()->type()->image)}}"
                             alt=""></a>
                    <ul class="profile_ul">
                        @if(Auth::user()->author==1)
                            <li><a href="{{url('/admin/home')}}">Admin Page</a></li>
                        @elseif(Auth::user()->author==2)
                            <li><a href="{{url('/admin/course/index')}}">Course Page</a></li>
                        @elseif(Auth::user()->author==3)
                            <li><a href="{{url('/account/teacher')}}">Teacher Page</a></li>
                        @elseif(Auth::user()->author==4)
                            <li><a href="{{url('/account/student')}}">Student Page</a></li>
                        @endif
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </div>
            @else
                <button class="btn login-btnn" type="button"><a href="{{route('login')}}">Daxil ol</a></button>
                <div class="hmbrgr_icon">
                    <span></span>
                </div>
            @endif
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
                        <img src="/frontendCss/images/edocean-footer-logo.jpeg" alt=""/>
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
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/script.js?v=2')}}"></script>
<script src="{{asset('js/tab.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/navbar.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@yield('js')
</body>
</html>


