@extends('frontend.app')

@section('css')
@endsection


@section('content')
    <main>
        <section class="about_us_top">
            <div class="about_us_top_text container text-center">
                <h1>Haqqımızda</h1>
                <p>
                    <a href="../index.html"> Ana Səhifə</a
                    ><ion-icon name="arrow-forward-outline"></ion-icon>Haqqımızda
                </p>
            </div>
        </section>

        <section class="who_we_are container">
            <div class="about_row">
                <div class="row  who_we_are_row">
                    <div class="col-lg-6 col-md-6 col-sm-12 who_we_are_content">
                        <h2>Bizim Missiyamız</h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa ut
                            sit, voluptate tempore autem veritatis error natus. Error magni
                            odit excepturi! Culpa aliquam voluptatum molestias dignissimos
                            ipsam non ipsum, maxime eaque reprehenderit qui assumenda mollitia
                            sapiente esse optio eveniet. Aperiam!
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 who_we_are_img">
                        <img class="w-100" src="../images/who-we-are.jpeg" alt="" />
                    </div>
                </div>
                <div class="row our_mission_row">
                    <div class="col-lg-6 col-md-6 col-sm-12 our-mission-img">
                        <img class="w-100" src="../images/our_mission.webp" alt="" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 our_mission_content">
                        <h2>Bizim Missiyamız</h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa ut
                            sit, voluptate tempore autem veritatis error natus. Error magni
                            odit excepturi! Culpa aliquam voluptatum molestias dignissimos
                            ipsam non ipsum, maxime eaque reprehenderit qui assumenda mollitia
                            sapiente esse optio eveniet. Aperiam!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="our_team">
            <div class="container-fluid">
                <h1 class="text-center mb-5 team_header">Komandamız</h1>
                <div class="slider multiple-items ">
                    <div class="items">
                        <img src="../images/kanan.png" />
                        <div class="textt">
                            <h5>Kənan Məmmədov</h5>
                            <p class="mb-3">Frontend Developer</p>
                            <div class="d-flex align-items-center justify-content-center w-100 soc_net mb-4"
                            >
                                <a href="" class="facebook-logo"
                                ><ion-icon name="logo-facebook"></ion-icon
                                    ></a>
                                <a href="" class="instagram-logo"
                                ><ion-icon name="logo-instagram"></ion-icon
                                    ></a>
                                <a href="" class="linkedin-logo"
                                ><ion-icon name="logo-linkedin"></ion-icon
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <img src="../images/kanan.png" />
                        <div class="textt">
                            <h5>Kənan Məmmədov</h5>
                            <p class="mb-3">Frontend Developer</p>
                            <div
                                class="d-flex align-items-center justify-content-center w-100 soc_net mb-4"
                            >
                                <a href="" class="facebook-logo"
                                ><ion-icon name="logo-facebook"></ion-icon
                                    ></a>
                                <a href="" class="instagram-logo"
                                ><ion-icon name="logo-instagram"></ion-icon
                                    ></a>
                                <a href="" class="linkedin-logo"
                                ><ion-icon name="logo-linkedin"></ion-icon
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <img src="../images/kanan.png" />
                        <div class="textt">
                            <h5>Kənan Məmmədov</h5>
                            <p class="mb-3">Frontend Developer</p>
                            <div
                                class="d-flex align-items-center justify-content-center w-100 soc_net mb-4"
                            >
                                <a href="" class="facebook-logo"
                                ><ion-icon name="logo-facebook"></ion-icon
                                    ></a>
                                <a href="" class="instagram-logo"
                                ><ion-icon name="logo-instagram"></ion-icon
                                    ></a>
                                <a href="" class="linkedin-logo"
                                ><ion-icon name="logo-linkedin"></ion-icon
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <img src="../images/kanan.png" />
                        <div class="textt">
                            <h5>Kənan Məmmədov</h5>
                            <p class="mb-3">Frontend Developer</p>
                            <div
                                class="d-flex align-items-center justify-content-center w-100 soc_net mb-4"
                            >
                                <a href="" class="facebook-logo"
                                ><ion-icon name="logo-facebook"></ion-icon
                                    ></a>
                                <a href="" class="instagram-logo"
                                ><ion-icon name="logo-instagram"></ion-icon
                                    ></a>
                                <a href="" class="linkedin-logo"
                                ><ion-icon name="logo-linkedin"></ion-icon
                                    ></a>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <img src="../images/kanan.png" />
                        <div class="textt">
                            <h5>Kənan Məmmədov</h5>
                            <p class="mb-3">Frontend Developer</p>
                            <div
                                class="d-flex align-items-center justify-content-center w-100 soc_net mb-4"
                            >
                                <a href="" class="facebook-logo"
                                ><ion-icon name="logo-facebook"></ion-icon
                                    ></a>
                                <a href="" class="instagram-logo"
                                ><ion-icon name="logo-instagram"></ion-icon
                                    ></a>
                                <a href="" class="linkedin-logo"
                                ><ion-icon name="logo-linkedin"></ion-icon
                                    ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="our_videos">
            <h1 class="text-center mb-5 video_header">Tanıtım videolarımız</h1>
            <div class="container">
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item  active">
                            <div class="row">
                                <div class="slide-description our-video-description text-center col-lg-6 col-md-12">
                                    <h1>Lorem ipsum dolor sit amet.</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa porro minus officiis
                                        necessitatibus iste atque, temporibus in sunt soluta aspernatur perspiciatis
                                        ratione sit illo libero quisquam voluptatibus consequuntur dolor! Molestiae.
                                    </p>
                                </div>
                                <div class="col-lg-6 col-md-12 slide-img-container">
                                    <video
                                        class="tchr_video"
                                        controls
                                    >
                                        <source src="../images/tanitim.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="slide-description our-video-description text-center col-lg-6 col-md-12">
                                    <h1>Lorem ipsum dolor sit amet.</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa porro minus officiis
                                        necessitatibus iste atque, temporibus in sunt soluta aspernatur perspiciatis
                                        ratione sit illo libero quisquam voluptatibus consequuntur dolor! Molestiae.
                                    </p>
                                </div>
                                <div class="col-lg-6 col-md-12 slide-img-container">
                                    <video
                                        class="tchr_video "
                                        controls
                                    >
                                        <source src="../images/tanitim.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="slide-description our-video-description text-center col-lg-6 col-md-12">
                                    <h1>Lorem ipsum dolor sit amet.</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa porro minus officiis
                                        necessitatibus iste atque, temporibus in sunt soluta aspernatur perspiciatis
                                        ratione sit illo libero quisquam voluptatibus consequuntur dolor! Molestiae.
                                    </p>
                                </div>
                                <div class="col-lg-6 col-md-12 slide-img-container">
                                    <video
                                        class="tchr_video"
                                        controls
                                    >
                                        <source src="../images/tanitim.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex carousel-control-buttons our-video-slider-control-buttons">
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
        </section>
    </main>
@endsection

@section('js')
@endsection
