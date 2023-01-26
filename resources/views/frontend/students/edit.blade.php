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
                    <li><a href="#student_request">Tələbənin tələbləri</a></li>
                </ul>
                <div id="tchr_tabs_content">
                    <div id="profile" class="tchr_tab_content">
                        <div class="tchr_prfl">
                            <div class="tc_img_and_soc text-center">
                                <img
                                    class="tchr_prfl_img mb-4"
                                    src="data:image/jpeg;base64,{{base64_encode($student->image)}}"
                                    alt=""/>
                                <h5>{{$student->name." ".$student->surname}}</h5>

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
                    <h2 class="mb-3">Tələbə haqqında</h2>
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="about_tchr_row">
                            <div class="row">
                                <h5 class="col-lg-3">Təhsil səviyyəsi:</h5>
                                <p class="col-lg-9">{{$student->education_level}}</p>
                            </div>
                        </div>

                        <div class="about_tchr_row">
                            <div class="row">
                                <h5 class="col-lg-3">Valideyn icazəsi:</h5>
                                <p class="col-lg-9">{{$student->parent}}</p>
                            </div>
                        </div>

                        <div class="about_tchr">
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Fən:</h5>
                                    <p class="col-lg-9">
                                        {{\App\Models\Subjects::find($student->subjects)->name}}
                                    </p>
                                </div>
                            </div>

                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Yaş:</h5>
                                    @php($birth=$student->birthday)
                                    @php($age=\Carbon\Carbon::parse($birth)->diff(\Carbon\Carbon::now())->format('%y yaş'))
                                    <p class="col-lg-9">{{$age}}</p>
                                </div>
                            </div>

                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Telefon:</h5>
                                    <p class="col-lg-9">{{$student->phone}}</p>
                                </div>
                            </div>

                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Email:</h5>
                                    <p class="col-lg-9">{{Auth::user()->email}}</p>
                                </div>
                            </div>

                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Cinsi:</h5>
                                    <p class="col-lg-9">{{$student->gender}}</p>
                                </div>
                            </div>

                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Ünvan:</h5>
                                    <p class="col-lg-9">{{$student->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="student_request" class="tchr_tab_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="about_tchr">
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Tələbələrin sayı:</h5>
                                    <p class="col-lg-9">{{$student->students_amount}}</p>
                                </div>
                            </div>

                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Dərs müddəti:</h5>
                                    <p class="col-lg-9">{{$student->lesson_duration}}</p>
                                </div>
                            </div>
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Dərs intensivliyi:</h5>
                                    <p class="col-lg-9">{{$student->lessons_intensivity}}</p>
                                </div>
                            </div>
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Müəllim təhsili:</h5>
                                    <p class="col-lg-9">{{$student->teacher_status}}</p>
                                </div>
                            </div>
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Dərs qiyməti:</h5>
                                    <p class="col-lg-9">{{$student->payment}}</p>
                                </div>
                            </div>
                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Müəllimin Cinsi:</h5>
                                    <p class="col-lg-9">{{$student->teacher_gender}}</p>
                                </div>
                            </div>

                            <div class="about_tchr_row">
                                <div class="row">
                                    <h5 class="col-lg-3">Tələbə missiyası:</h5>
                                    <p class="col-lg-9">{{$student->student_mission}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection

@section('js')

@endsection



