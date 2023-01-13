@extends('frontend.app')

@section('css')
@endsection


@section('content')
    <main>
        <section class="teacher_single">
            <div class="tchr_tabs">
                <ul id="tchr_tabs_nav">
                    <li><a href="#profile">Profil</a></li>
                    <li><a href="#about">Haqqında</a></li>
                    <li><a href="#teacher_request">Müəllimin tələbləri</a></li>
                    <li><a href="#certficates">Sertifikatlar</a></li>
                    <li><a href="#videos">Videolar</a></li>
                </ul>
                <div id="tchr_tabs_content">
                    <div id="profile" class="tchr_tab_content">
                        <div class="tchr_prfl">
                            <div class="tc_img_and_soc text-center">
                                <img
                                    class="tchr_prfl_img mb-4"
                                    src="data:image/jpeg;base64,{{base64_encode($teacher->image)}}"
                                    alt=""/>
                                <h5>{{$teacher->name." ".$teacher->surname}}</h5>
                                <p>{{$teacher->speciality}}</p>

                                <div class="d-flex align-items-center justify-content-center w-100 soc_net mb-4">
                                    <a href="" class="whatsapp-logo"
                                    ><ion-icon name="logo-whatsapp"></ion-icon
                                        ></a>
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
                <div id="about" class="tchr_tab_content">
                    <h2 class="mb-3">Müəllim haqqında</h2>
                    <p>
                        {{$teacher->about_teacher}}
                    </p>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="about_tchr">
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
                                    <h5 class="col-lg-3">Iş mövqeyi:</h5>
                                    <p class="col-lg-9">
                                        {{$teacher->work_position}}
                                    </p>
                                </div>
                            </div>
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
                                    @php($birth=$teacher->birthday)
                                    @php($age=\Carbon\Carbon::parse($birth)->diff(\Carbon\Carbon::now())->format('%y yaş'))
                                    <p class="col-lg-9">{{$age}}</p>
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


                <div id="teacher_request" class="tchr_tab_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="about_tchr">
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Tələbə səviyyəsi:</h5>
                                    <p class="col-lg-9">{{$teacher->student_level}}</p>
                                </div>
                            </div>
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Tələbələrin sayı:</h5>
                                    <p class="col-lg-9">{{$teacher->students_amount}}</p>
                                </div>
                            </div>

                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Dərs müddəti:</h5>
                                    <p class="col-lg-9">{{$teacher->lessons_duration}}</p>
                                </div>
                            </div>
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Dərs intensivliyi:</h5>
                                    <p class="col-lg-9">{{$teacher->lessons_intensivity}}</p>
                                </div>
                            </div>
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Dərs qiyməti:</h5>
                                    <p class="col-lg-9">{{$teacher->lesson_price}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div id="certficates" class="tchr_tab_content">
                    <div class="tchr_crtf">
                        <div
                            id="carouselExampleControls"
                            class="carousel slide"
                            data-bs-ride="carousel"
                        >
                            <div class="carousel-inner">
                                <div class="carousel-item active crtf">
                                    <img
                                        src="../images/crtf-img.jpg"
                                        class="d-block"
                                        alt="..."
                                    />
                                </div>
                                <div class="carousel-item crtf">
                                    <img
                                        src="../images/crtf-img.jpg"
                                        class="d-block"
                                        alt="..."
                                    />
                                </div>
                                <div class="carousel-item crtf">
                                    <img
                                        src="../images/crtf-img.jpg"
                                        class="d-block"
                                        alt="..."
                                    />
                                </div>
                            </div>
                            <button
                                class="carousel-control-prev "
                                type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev"
                            >
                  <span
                      class="carousel-control-prev-icon crt_next_prev"
                      aria-hidden="true"
                  ></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button
                                class="carousel-control-next"
                                type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide="next"
                            >
                  <span
                      class="carousel-control-next-icon crt_next_prev"
                      aria-hidden="true"
                  ></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="videos" class="tchr_tab_content">
                    <div class="tchr_vds">
                        <div class="t_vds row">
                            <video
                                class="tchr_video col-lg-6 col-md-12 col-sm-12 mb-4"
                                controls
                            >
                                <source src="../images/tanitim.mp4" type="video/mp4" />
                            </video>
                            <video
                                class="tchr_video col-lg-6 col-md-12 col-sm-12 mb-4"
                                controls
                            >
                                <source src="../images/tanitim.mp4" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')

@endsection


