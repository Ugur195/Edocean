<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Admin Panel | Student</title>
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
                <a href="#" class="brand-logo">
                    {{--                                        <img class="entry-logo img-responsive"--}}
                    {{--                                             src="data:image/jpeg;base64,{{base64_encode($setting->logo)}}" alt="logo"--}}
                    {{--                                             title="logo"/>--}}
                </a>
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                    <span class="svg-icon svg-icon svg-icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                        <li class="menu-item  @if(Request::url()==url('admin/student/index')) menu-item-active @endif "
                            aria-haspopup="true">
                            <a href="{{url('admin/student/index')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    <svg style="width: 20px" version="1.1" id="Capa_1"
                                         xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 27.02 27.02"
                                         xml:space="preserve">
                                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                               <path d="M3.674,24.876c0,0-0.024,0.604,0.566,0.604c0.734,0,6.811-0.008,6.811-0.008l0.01-5.581
                                                c0,0-0.096-0.92,0.797-0.92h2.826c1.056,0,0.991,0.92,0.991,0.92l-0.012,5.563c0,0,5.762,0,6.667,0
                                                c0.749,0,0.715-0.752,0.715-0.752V14.413l-9.396-8.358l-9.975,8.358C3.674,14.413,3.674,24.876,3.674,24.876z"
                                                     fill="#000000"/>
                                               <path d="M0,13.635c0,0,0.847,1.561,2.694,0l11.038-9.338l10.349,9.28c2.138,1.542,2.939,0,2.939,0
                                                L13.732,1.54L0,13.635z" fill="#000000"/>
                                           </g>
                                    </svg>
                              </span>
                                <span class="menu-text">Home</span>
                            </a>
                        </li>

                        <li class="menu-item   @if(Request::url()==url('admin/student/student_attendance')) menu-item-active @endif">
                            <a href="{{url('admin/student/student_attendance')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                      <svg style="margin-left:1px" width="16px" height="16px" viewBox="0 0 16 16"
                                           xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                           class="bi bi-person-check-fill ">
                                           <path fill-rule="evenodd"
                                                 d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                           <path
                                               d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                      </svg>
                                </span>
                                <span class="menu-text">Student Attendance</span>
                            </a>
                        </li>


                        <li class="menu-item   @if(Request::url()==url('admin/student/student_course')) menu-item-active @endif ">
                            <a href="{{url('admin/student/student_course')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                     <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                          width="335.08px" height="335.079px" viewBox="0 0 335.08 335.079"
                                          style="enable-background:new 0 0 335.08 335.079; height:24px;"
                                          xml:space="preserve">
                                        <g>
		                                    <path d="M311.175,115.775c-1.355-10.186-1.546-27.73,7.915-33.621c0.169-0.108,0.295-0.264,0.443-0.398
			                                 c7.735-2.474,13.088-5.946,8.886-10.618l-114.102-34.38L29.56,62.445c0,0-21.157,3.024-19.267,35.894
			                                 c1.026,17.89,6.637,26.676,11.544,31l-15.161,4.569c-4.208,4.672,1.144,8.145,8.88,10.615c0.147,0.138,0.271,0.293,0.443,0.401
			                                 c9.455,5.896,9.273,23.438,7.913,33.626c-33.967,9.645-21.774,12.788-21.774,12.788l7.451,1.803
			                                 c-5.241,4.736-10.446,13.717-9.471,30.75c1.891,32.864,19.269,35.132,19.269,35.132l120.904,39.298l182.49-44.202
			                                 c0,0,12.197-3.148-21.779-12.794c-1.366-10.172-1.556-27.712,7.921-33.623c0.174-0.105,0.301-0.264,0.442-0.396
			                                 c7.736-2.474,13.084-5.943,8.881-10.615l-7.932-2.395c5.29-3.19,13.236-11.527,14.481-33.183
			                                 c0.859-14.896-3.027-23.62-7.525-28.756l15.678-3.794C332.949,128.569,345.146,125.421,311.175,115.775z M158.533,115.354
			                                 l30.688-6.307l103.708-21.312l15.451-3.178c-4.937,9.036-4.73,21.402-3.913,29.35c0.179,1.798,0.385,3.44,0.585,4.688
			                                 L288.14,122.8l-130.897,32.563L158.533,115.354z M26.71,147.337l15.449,3.178l99.597,20.474l8.701,1.782l0,0l0,0l26.093,5.363
			                                 l1.287,40.01L43.303,184.673l-13.263-3.296c0.195-1.25,0.401-2.89,0.588-4.693C31.44,168.742,31.651,156.373,26.71,147.337z
			                                 M20.708,96.757c-0.187-8.743,1.371-15.066,4.52-18.28c2.004-2.052,4.369-2.479,5.991-2.479c0.857,0,1.474,0.119,1.516,0.119
			                                 l79.607,25.953l39.717,12.949l-1.303,40.289L39.334,124.07l-5.88-1.647c-0.216-0.061-0.509-0.103-0.735-0.113
			                                 C32.26,122.277,21.244,121.263,20.708,96.757z M140.579,280.866L23.28,247.98c-0.217-0.063-0.507-0.105-0.733-0.116
			                                 c-0.467-0.031-11.488-1.044-12.021-25.544c-0.19-8.754,1.376-15.071,4.519-18.288c2.009-2.052,4.375-2.479,5.994-2.479
			                                 c0.859,0,1.474,0.115,1.519,0.115c0,0,0.005,0,0,0l119.316,38.908L140.579,280.866z M294.284,239.459
			                                 c0.185,1.804,0.391,3.443,0.591,4.693l-147.812,36.771l1.292-40.01l31.601-6.497l4.667,1.129l17.492-5.685l80.631-16.569
			                                 l15.457-3.18C293.261,219.146,293.466,231.517,294.284,239.459z M302.426,185.084c-0.269,0.006-0.538,0.042-0.791,0.122
			                                 l-11.148,3.121l-106.148,29.764l-1.298-40.289l34.826-11.359l84.327-27.501c0.011-0.005,4.436-0.988,7.684,2.315
			                                 c3.144,3.214,4.704,9.537,4.52,18.28C313.848,184.035,302.827,185.053,302.426,185.084z"
                                                  fill="#000000"/>
	                                    </g>
                                    </svg>
                                </span>
                                <span class="menu-text">Courses</span>
                            </a>
                        </li>

                        <li class="menu-item   @if(Request::url()==url('admin/student/student_schedule')) menu-item-active @endif ">
                            <a href="{{url('admin/student/student_schedule')}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                       <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 198.667 198.667"
                                            style="enable-background:new 0 0 198.667 198.667;" xml:space="preserve">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                 <path d="M193.667,41.945H182V21.278c0-2.762-2.239-5-5-5h-12c-2.761,0-5,2.238-5,5v20.667H38.667V21.278c0-2.762-2.239-5-5-5h-12
	                                             c-2.761,0-5,2.238-5,5v20.667H5c-2.761,0-5,2.238-5,5V164.75c0,9.726,7.913,17.639,17.639,17.639h163.389
	                                             c9.726,0,17.639-7.913,17.639-17.639V46.945C198.667,44.183,196.428,41.945,193.667,41.945z M181.333,138.955H157.4v-12.987h23.934
	                                             V138.955z M89.533,78.899h23.934v12.987H89.533V78.899z M113.467,115.42H89.533v-12.986h23.934V115.42z M55.6,125.968h23.933v12.987
	                                             H55.6V125.968z M89.533,125.968h23.934v12.987H89.533V125.968z M147.4,115.42h-23.933v-12.986H147.4V115.42z M21.667,125.968H45.6
	                                             v12.987H21.667V125.968z M181.333,115.42H157.4v-12.986h23.934V115.42z M157.4,78.899h23.934v12.987H157.4V78.899z M147.4,91.886
	                                             h-23.933V78.899H147.4V91.886z M55.6,102.434h23.933v12.986H55.6V102.434z M21.667,102.434H45.6v12.986H21.667V102.434z
	                                             M45.6,162.49H21.667v-12.987H45.6V162.49z M55.6,149.502h23.933v12.987H55.6V149.502z M113.467,162.49H89.533v-12.987h23.934
	                                             V162.49z M123.467,125.968H147.4v12.987h-23.933V125.968z"
                                                       fill="#000000"/>
                                            </g>
                                       </svg>
                                </span>
                                <span class="menu-text">Student Schedule</span>
                            </a>



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
                                         <img class="entry-logo img-responsive" style="width: 30px; height: 30px"
                                              src="data:image/jpeg;base64,{{base64_encode(auth()->user()->type()->image)}}"
                                              alt="logo" title="logo"/>
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
                        <a href="https://www.facebook.com/xaqan.turkoglu.9/" target="_blank"
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
                    <img class="entry-logo img-responsive" style="width: 90px; height: 90px"
                         src="data:image/jpeg;base64,{{base64_encode(auth()->user()->type()->image)}}" alt="logo"
                         title="logo"/>
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
                <div class="navi-link" style="display: flex; align-items: center; padding: 15px 0;">
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
                        <div class="font-weight-bold"><a target="_blank" href="{{url('admin/student/my_profile')}}">Profilim</a>
                        </div>
                        <div class="text-muted">Hesab tənzimləmələri və başqaları</div>
                    </div>
                </div>
            </a>
            <!--end:Item-->
            <!--begin::Item-->
            <a href="#" class="navi-item" target="_blank">
                <div class="navi-link" style="display: flex; align-items: center; padding: 15px 0;">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-success">
                                <i class="icon-2x flaticon2-world text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold"><a target="_blank" href="{{url('/')}}">Saytı ziyarət et</a></div>
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
///


