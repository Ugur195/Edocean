@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection


@section('content')
    <main>
        <section class="tchr_single">
            <div class=" tchr_prfl mb-5">
                <div class="row tchr_prfl_row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="teacher-sidebar">
                                        <div class="sidebar_img">
                                            <img src="data:image/jpeg;base64,{{base64_encode($teacher->image)}}" alt=""/>
                                        </div>
                                        <div class="sidebar_content text-center d-flex">
                                            <h5>{{$teacher->name." ".$teacher->surname}}</h5>
                                            <p>{{$teacher->speciality}}</p>
                                            <div
                                                class="d-flex align-items-center justify-content-center w-100 soc_net"
                                            >
                                                <a href="" class="whatsapp-logo"
                                                >
                                                    <ion-icon name="logo-whatsapp"></ion-icon
                                                    >
                                                </a>
                                                <a href="" class="facebook-logo"
                                                >
                                                    <ion-icon name="logo-facebook"></ion-icon
                                                    >
                                                </a>
                                                <a href="" class="instagram-logo"
                                                >
                                                    <ion-icon name="logo-instagram"></ion-icon
                                                    >
                                                </a>
                                                <a href="" class="linkedin-logo"
                                                >
                                                    <ion-icon name="logo-linkedin"></ion-icon
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 tchr_about">
                                    <h1 class="mb-4">Müəllim haqqında</h1>
                                    <p>
                                        {{$teacher->about_teacher}}
                                    </p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="about_tchr">
                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Fən:</h5>
                                                <p class="col-lg-9">
                                                    {{\App\Models\Subjects::find($teacher->subjects)->name}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Təhsil:</h5>
                                                <p class="col-lg-9">
                                                   {{$teacher->education_place}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Ölkə:</h5>
                                                <p class="col-lg-9">
                                                    {{$teacher->country}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Şəhər:</h5>
                                                <p class="col-lg-9">
                                                    {{$teacher->city}}
                                                </p>
                                            </div>
                                        </div>



                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">İş yeri:</h5>
                                                <p class="col-lg-9">{{$teacher->work_place}}</p>
                                            </div>
                                        </div>

                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">İş təcrübəsi:</h5>
                                                <p class="col-lg-9">{{$teacher->work_experience}}</p>
                                            </div>
                                        </div>

                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Yaş:</h5>
                                                <p class="col-lg-9">21</p>
                                            </div>
                                        </div>

                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Telefon:</h5>
                                                <p class="col-lg-9">{{$teacher->phone}}</p>
                                            </div>
                                        </div>
                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Email:</h5>
                                                <p class="col-lg-9">{{$teacher->email}}</p>
                                            </div>
                                        </div>
                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Cinsi:</h5>
                                                <p class="col-lg-9">{{$teacher->gender}}</p>
                                            </div>
                                        </div>
                                        <div class="about_tchr_row">
                                            <div class="row">
                                                <h5 class="col-lg-3">Ünvan:</h5>
                                                <p class="col-lg-9">{{$teacher->teacher_address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tchr-certficates">
            <div class="tchr_crtf">
                <h3 class="mb-5">Müəllimin sertfikatları</h3>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active crtf">
                            <img src="frontendCss/images/muellim.jpg" class="d-block " alt="...">
                        </div>
                        <div class="carousel-item crtf">
                            <img src="frontendCss/images/muellim1.jpg" class="d-block " alt="...">
                        </div>
                        <div class="carousel-item crtf">
                            <img src="frontendCss/images/muellim2.jpg" class="d-block " alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </section>
        <section class="tchr_videos">
            <div class="tchr_vds">
                <h3 class="mb-5">Muəllimin tanıtım videoları</h3>
                <div class="t_vds row">
                    <video class="tchr_video col-lg-6 col-md-12 col-sm-12 mb-4" controls>
                        <source src="frontendCss/images/tanitim.mp4" type="video/mp4"/>
                    </video>
                    <video class="tchr_video col-lg-6 col-md-12 col-sm-12 mb-4" controls>
                        <source src="frontendCss/images/tanitim.mp4" type="video/mp4"/>
                    </video>
                </div>
            </div>

        </section>
    </main>
@endsection

@section('js')

@endsection


