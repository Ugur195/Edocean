<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Admin Panel | Edocean</title>
    <meta name="description"
          content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets."/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('backendCssJs/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('backendCssJs/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backendCssJs/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('backendCssJs/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('backendCssJs/assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('backendCssJs/assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('backendCssJs/assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backendCssJs/assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{asset('backendCssJs/assets/media/logos/favicon.ico')}}"/>
    @yield('css')
</head>

<!--end::Head-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled
      subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <a href="index.html">
        {{--        <img class="entry-logo img-responsive"--}}
        {{--             src="data:image/jpeg;base64,{{base64_encode($setting->logo)}}" alt="logo"--}}
        {{--             title="logo"/>--}}
    </a>
    <div class="d-flex align-items-center">
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
            <span class="svg-icon svg-icon-xl">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M12,11 C9.790861,11 8,9.209139 8,7
                        C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861
                        16,7 C16,9.209139 14.209139,11 12,11 Z"
                              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159
                        7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,
                        15.2931929 20.9979143,20.2 C21.0095879,20.3954741
                        20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21
                        3.72750223,21 C3.47671215,21 2.97953825,20.45918
                        3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                    </g>
                </svg>
            </span>
        </button>
    </div>
</div>


<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <div class="brand flex-column-auto" id="kt_brand">
                <a href="" class="brand-logo">
                    {{--                                        <img class="entry-logo img-responsive"--}}
                    {{--                                             src="data:image/jpeg;base64,{{base64_encode($setting->logo)}}" alt="logo"--}}
                    {{--                                             title="logo"/>--}}
                </a>
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                    <span class="svg-icon svg-icon svg-icon-xl">
                        <svg   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M5.29288961,6.70710318 C4.90236532,6.31657888
                                4.90236532,5.68341391 5.29288961,5.29288961
                                C5.68341391,4.90236532 6.31657888,4.90236532
                                6.70710318,5.29288961 L12.7071032,11.2928896
                                C13.0856821,11.6714686 13.0989277,12.281055
                                12.7371505,12.675721 L7.23715054,18.675721
                                C6.86395813,19.08284 6.23139076,19.1103429
                                5.82427177,18.7371505 C5.41715278,18.3639581
                                5.38964985,17.7313908 5.76284226,17.3242718
                                L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000"
                                      fill-rule="nonzero"
                                      transform="translate(8.999997, 11.999999)
                                    scale(-1, 1) translate(-8.999997, -11.999999)"/>
                                <path d="M10.7071009,15.7071068 C10.3165766,16.0976311
                                9.68341162,16.0976311 9.29288733,15.7071068
                                C8.90236304,15.3165825 8.90236304,14.6834175
                                9.29288733,14.2928932 L15.2928873,8.29289322
                                C15.6714663,7.91431428 16.2810527,7.90106866
                                16.6757187,8.26284586 L22.6757187,13.7628459
                                C23.0828377,14.1360383 23.1103407,14.7686056
                                22.7371482,15.1757246 C22.3639558,15.5828436
                                21.7313885,15.6103465 21.3242695,15.2371541
                                L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                      fill="#000000" fill-rule="nonzero" opacity="0.3"
                                      transform="translate(15.999997, 11.999999)
                                    scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
                            </g>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                     data-menu-dropdown-timeout="500">
                    <ul class="menu-nav">
                        <li class="menu-item  @if(Request::url()==url('admin/index')) menu-item-active @endif "
                            aria-haspopup="true">
                            <a href="{{url('admin/index')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                      <svg style="width: 20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                           xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                           viewBox="0 0 27.02 27.02"
                                           xml:space="preserve">
                                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" >
	                                             <path  d="M3.674,24.876c0,0-0.024,0.604,0.566,0.604c0.734,0,6.811-0.008,6.811-0.008l0.01-5.581
		                                          c0,0-0.096-0.92,0.797-0.92h2.826c1.056,0,0.991,0.92,0.991,0.92l-0.012,5.563c0,0,5.762,0,6.667,0
		                                          c0.749,0,0.715-0.752,0.715-0.752V14.413l-9.396-8.358l-9.975,8.358C3.674,14.413,3.674,24.876,3.674,24.876z" fill="#000000"/>
                                                 <path d="M0,13.635c0,0,0.847,1.561,2.694,0l11.038-9.338l10.349,9.28c2.138,1.542,2.939,0,2.939,0
		                                          L13.732,1.54L0,13.635z" fill="#000000"/>
                                             </g>
                                      </svg>
                                </span>
                                <span class="menu-text">Home</span>
                            </a>
                        </li>

                        <li class="menu-item   @if(Request::url()==url('admin/contact_us')) menu-item-active @endif ">
                            <a href="{{url('admin/contact_us')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <rect x="0" y="0" width="24" height="24"/>
                                          <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,
                                            19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,
                                               6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,
                                               7.83964668 C5.4908718,7.6432681 5.03602525,
                                              7.77972206 4.83964668,8.14442513 C4.6432681,
                                                  8.5091282 4.77972206,8.96397475 5.14442513,
                                                9.16035332 L11.6444251,12.6603533 C11.8664074,
                                                12.7798822 12.1335926,12.7798822 12.3555749,
                                               12.6603533 L18.8555749,9.16035332 C19.2202779,
                                                  8.96397475 19.3567319,8.5091282 19.1603533,
                                                 8.14442513 C18.9639747,7.77972206 18.5091282,
                                                7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                          </g>
                                     </svg><!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">Messages</span>
                            </a>
                        </li>



                        <li class="menu-item  @if(Request::url()==url('admin/teacher')) menu-item-active @endif "
                            aria-haspopup="true">
                            <a href="{{url('admin/teacher')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <svg class="svg-icon" style="
                                        width: 20px; vertical-align: middle;fill: currentColor;overflow: hidden;"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M272.128 538.752l207.36 409.472H204.736c-31.488-1.152-57.728-12.224-78.72-33.28s-32.064-47.232-33.28-78.72v-185.472c1.152-31.488 12.224-57.728 33.28-78.72s47.232-32.064
                                        78.72-33.28h67.392z m88.768-414.784c38.784-39.104 87.616-59.52 146.56-61.248 58.944 1.728
                                        107.776 22.144 146.56 61.248 38.784 39.104 59.072 87.808 60.8 146.112-0.576 37.952-9.92
                                        72.64-28.032 104.128s-43.456 56.576-76.096 75.264c-32.704 18.688-67.072 28.032-103.232
                                        28.032-36.16 0-70.592-9.344-103.232-28.032-32.704-18.688-58.048-43.776-76.096-75.264-18.112-31.488-27.456-66.176-28.032-104.128 1.728-58.304 22.016-107.008 60.8-146.112z
                                        m241.984 532.928l-95.36 201.28-95.36-201.28 95.36-83.968 95.36 83.968z m286.976-84.928c21.568 20.992
                                        34.112 47.232 37.632 78.72v185.472c-0.576 31.488-11.52 57.728-32.832 78.72-21.312 20.992-47.68
                                        32.064-79.168 33.28H540.736l202.112-409.472h67.392c31.488 1.216 58.048 12.288 79.616 33.28z"  />
                                    </svg>
                                </span>
                                <span class="menu-text">Teacher</span>
                            </a>
                        </li>



                        <li class="menu-item  @if(Request::url()==url('admin/student')) menu-item-active @endif "
                            aria-haspopup="true">
                            <a href="{{url('admin/student')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <svg version="1.1" id="Layer_1"
                                         xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         width="260px" height="188px"
                                         viewBox="0 0 260 188" xml:space="preserve">
                                       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <path d="M134.3,109.2L202,83.8V146c0,13.4-32.2,24.3-72,
                                            24.3S58,159.4,58,146V83.8l67.9,25.4l4.2,1.6L134.3,109.2z M130.1,98L258,50
	                                         L130.1,2L2,50l20,7.5v81.8c-4.7,2.2-8,7.1-8,
	                                         12.7v34h28v-34c0-5.7-3.3-10.6-8.1-12.8V61.9L130.1,98z" fill="#000000"/>
                                       </g>
                                    </svg>
                                </span>
                                <span class="menu-text">Student</span>
                            </a>
                        </li>



                        <li class="menu-item   @if(Request::url()==url('admin/about_us')) menu-item-active @endif">
                            <a href="{{url('admin/about_us')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                        <svg style="height: 19px" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                                  <path d="M11.812,0C5.289,0,0,5.289,0,11.812s5.289,
	                                                  11.813,11.812,11.813s11.813-5.29,11.813-11.813
		                                               S18.335,0,11.812,0z M14.271,18.307c-0.608,
		                                               0.24-1.092,0.422-1.455,0.548c-0.362,
		                                               0.126-0.783,0.189-1.262,0.189
		                                               c-0.736,0-1.309-0.18-1.717-0.539s-0.611-0.814-0.611-1.367c0-0.215,
		                                               0.015-0.435,0.045-0.659c0.031-0.224,0.08-0.476,0.147-0.759
		                                               l0.761-2.688c0.067-0.258,0.125-0.503,0.171-0.731c0.046-0.23,
		                                               0.068-0.441,0.068-0.633c0-0.342-0.071-0.582-0.212-0.717
		                                               c-0.143-0.135-0.412-0.201-0.813-0.201c-0.196,0-0.398,
		                                               0.029-0.605,0.09c-0.205,0.063-0.383,0.12-0.529,0.176l0.201-0.828
		                                               c0.498-0.203,0.975-0.377,1.43-0.521c0.455-0.146,
		                                               0.885-0.218,1.29-0.218c0.731,0,1.295,0.178,1.692,0.53
		                                               c0.395,0.353,0.594,0.812,0.594,1.376c0,0.117-0.014,
		                                               0.323-0.041,0.617c-0.027,0.295-0.078,0.564-0.152,0.811l-0.757,2.68
		                                               c-0.062,0.215-0.117,0.461-0.167,0.736c-0.049,0.275-0.073,
		                                               0.485-0.073,0.626c0,0.356,0.079,0.599,0.239,0.728
		                                               c0.158,0.129,0.435,0.194,0.827,0.194c0.185,
		                                               0,0.392-0.033,0.626-0.097c0.232-0.064,0.4-0.121,0.506-0.17L14.271,18.307z
		                                                M14.137,7.429c-0.353,0.328-0.778,0.492-1.275,
		                                                0.492c-0.496,0-0.924-0.164-1.28-0.492c-0.354-0.328-0.533-0.727-0.533-1.193
		                                               c0-0.465,0.18-0.865,0.533-1.196c0.356-0.332,
		                                               0.784-0.497,1.28-0.497c0.497,0,0.923,0.165,1.275,0.497
		                                               c0.353,0.331,0.53,0.731,0.53,1.196C14.667,6.703,14.49,7.101,14.137,7.429z"
                                                            fill="#000000"/>
                                               </g>
                                        </svg>
                                </span>
                                <span class="menu-text">About Us</span>
                            </a>
                        </li>

                        <li class="menu-item   @if(Request::url()==url('admin/setting')) menu-item-active @endif ">

                            <a href="{{url('admin/setting')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                           <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,
                                           5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,
                                           19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,
                                           12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,
                                           10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,
                                           13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                         </g>
                                        </svg><!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">Setting</span>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <div id="kt_header" class="header header-fixed">
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="header-menu header-menu-mobile
                         header-menu-layout-default">
                        </div>
                    </div>
                    <div class="topbar">
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_cart_toggle">
                                <span class="svg-icon svg-icon-xl svg-icon-primary" style="position: relative">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M16,15.6315789 L16,12 C16,10.3431458
                                            14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579
                                            C6.16183229,4.13107011 7.29290239,3 8.68814808,3
                                            L20.4776218,3 C21.8728674,3 23.0039375,4.13107011
                                            23.0039375,5.52631579 L23.0039375,13.1052632
                                            L23.0206157,17.786793 C23.0215995,18.0629336
                                            22.7985408,18.2875874 22.5224001,18.2885711
                                            C22.3891754,18.2890457 22.2612702,18.2363324
                                            22.1670655,18.1421277 L19.6565168,15.6315789
                                            L16,15.6315789 Z" fill="#000000"/>
                                            <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305
                                            2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11
                                            13.9850559,11.8954305 13.9850559,13 L13.9850559,18
                                            C13.9850559,19.1045695 13.0896254,20 11.9850559,20
                                            L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685
                                            2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836
                                            2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426
                                             C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18
                                             Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424
                                             6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424
                                             12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z
                                             M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424
                                             9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424
                                             12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                  fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean
                            d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                <span class="text-muted font-weight-bold font-size-base
                                d-none d-md-inline mr-1">Salam,
                                </span>
                                <span class="text-dark-50 font-weight-bolder font-size-base
                                 d-none d-md-inline mr-3">{{\Illuminate\Support\Facades\Auth::user()->name}}
                                </span>
                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                    <span class="symbol-label font-size-h5 font-weight-bold">
{{--                                        <img class="entry-logo img-responsive" style="width: 30px; height: 30px"--}}
                                        {{--                                             src="data:image/jpeg;base64,{{base64_encode(Auth::user()->image)}}"--}}
                                        {{--                                             alt="logo" title="logo"/>--}}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @yield('content')

        <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
						<path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
            </div>
            <!--end::Scrolltop-->

            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <div class="container-fluid d-flex flex-column flex-md-row
                align-items-center justify-content-between">
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">2022 ©</span>
                        <a href="#" target="_blank"
                           class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                            Created by Aztelecom
                        </a>
                    </div>
                    <div class="nav nav-dark">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">İstifadəçi profili</h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label">
                    {{--                    <img class="entry-logo img-responsive" style="width: 90px; height: 90px"--}}
                    {{--                         src="data:image/jpeg;base64,{{base64_encode(Auth::user()->image)}}" alt="logo"--}}
                    {{--                         title="logo"/>--}}
                </div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                </a>
                <div class="text-muted mt-1">
                    Admin
                </div>
                <div class="navi mt-2">
                    <span class="navi-link p-0 pb-2">
                        <span class="navi-icon mr-1">
                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none"
                                       fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M21,12.0829584 C20.6747915,12.0283988
											20.3407122,12 20,12 C16.6862915,12 14,14.6862915
											14,18 C14,18.3407122 14.0283988,18.6747915
											14.0829584,19 L5,19 C3.8954305,19 3,18.1045695
											3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6
											C20.1045695,6 21,6.8954305 21,8 L21,12.0829584
											Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,
											7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206
											4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,
											8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533
											C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,
											12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475
											19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,
											7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                              fill="#000000"/>
                                        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5"
                                                r="2.5"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="navi-text text-muted text-hover-primary">
{{--                            {{Auth::user()->email}}--}}
                        </span>
                    </span>
                    <a href="{{route('logout')}}"
                       class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                        Çıxış
                    </a>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
            <a href="#" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-success">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                     viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M13.2070325,4 C13.0721672,4.47683179
                                         13,4.97998812 13,5.5 C13,8.53756612
                                         15.4624339,11 18.5,11 C19.0200119,11
                                         19.5231682,10.9278328 20,10.7929675
                                         L20,17 C20,18.6568542 18.6568542,20
                                         17,20 L7,20 C5.34314575,20 4,18.6568542
                                         4,17 L4,7 C4,5.34314575 5.34314575,4 7,4
                                         L13.2070325,4 Z" fill="#000000"/>
                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div href="{{url('/my_profile')}}" class="font-weight-bold">Profilim</div>
                        <div class="text-muted">Hesab tənzimləmələri və başqaları</div>
                    </div>
                </div>
            </a>
            <!--end:Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item" target="_blank">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-success">
                                <i class="icon-2x flaticon2-world text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <a href="{{url('/')}}" class="font-weight-bold">Saytı ziyarət et</a>
                        <div class="text-muted">Əlavələrinizi vəya tanzimləməlrinizi yoxlayın</div>
                    </div>
                </div>
            </a>
            <!--end:Item-->
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel-->
<!--begin::Quick Cart-->
<div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0">Mesajlar</h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <div class="separator separator-solid"></div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content">
        <!--begin::Wrapper-->

        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <a href="#"
               class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
                <div class="dmt-2 rounded p-5 text-dark-50 font-weight-bold
                    font-size-lg text-left max-w-400px
                    bg-danger ">
                    <div class="d-flex flex-column mr-2"
                         style="color: white"
                         style="color: black">
                            <span class=" text-muted
                                text-light ">
                            </span>
                    </div>
                </div>
                <div class="separator separator-solid"></div>
            </a>
        </div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <div class="offcanvas-footer">
            <div class="text-right">
                <a href="#" type="button"
                   class="btn btn-primary text-weight-bold">
                    Hamısına bax
                </a>
            </div>
        </div>
        <!--end::Purchase-->
    </div>
    <!--end::Content-->
</div>
<script src="{{asset('backendCssJs/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('backendCssJs/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('backendCssJs/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('backendCssJs/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('backendCssJs/assets/js/pages/widgets.js')}}"></script>

<!--end::Page Scripts-->
</body>

@yield('js')
<!--end::Body-->
</html>

