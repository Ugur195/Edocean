@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>

    <style>
        img {
            object-fit: cover;
            height: 300px;
        }
        nav {
            margin-bottom: 0px !important;
        }
    </style>
@endsection

@section('content')
    <main class="ed-main">
        <section class="video-section">
            <div id="ed-video">
                <video class="video-ed" id="myVideo" autoplay loop muted>
                    <source src="./frontendCss/images/tanitim.mp4" type="video/mp4">
                </video>
                <div class="fabs" id="muted">
                    <button class="ed-video-mute">
                        <ion-icon name="volume-mute-outline"></ion-icon>
                    </button>
                    <button class="ed-video-volume">
                        <ion-icon name="volume-high-outline"></ion-icon>
                    </button>
                </div>
            </div>
        </section>
        <section class="course-section">
            <div class="container course-container">
                <h1>VİP Kurslar</h1>
                <ul class="categories-course">
                    <li class="active-li" catid="*">Hamisi</li>
                    <li catid="master">Magistr</li>
                    <li catid="development">Web development</li>

                </ul>
                <div class="course-row ">
                    @foreach ($course as $c)
                        <a href="" class="course-a development">
                            <div class="course ">
                                <img src="data:image/jpeg;base64,{{base64_encode($c->image)}}" alt="">
                                <div>
                                    <h3>{{$c->name }}</h3>
                                    <p>Web Development</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <a href="#" class="see-all-href">
                    <button class="see-all-button">Bütün kurslar</button>
                </a>
            </div>
        </section>
        <section class="teacher-section">
            <div class="container teacher-container">
                <h1>VİP Müəllimlər</h1>
                <ul class="categories-techer">
                    <li class="active-li" catid="*">Hamisi</li>
                    <li catid="riyaziyyat">Riyaziyyat</li>
                    <li catid="fizika">Fizika</li>

                </ul>
                <div class="teacher-row">
                        @foreach ($teacher as $t)
                            @if ($t->profile_type=='Vip')
                                <div class="vip teacher fizika">
                                    <img class="teacher-card-img" src="data:image/jpeg;base64,{{base64_encode($t->image)}}" alt="">
                                    <div class="details">
                                        <div class="details-1">
                                            <div class="rating-and-views">
                                                <p>
                                                    <ion-icon name="eye"></ion-icon>
                                                    {{ $t->see_count }}
                                                </p>
                                                <p>
                                                    <ion-icon name="star"></ion-icon>
                                                    4.6(50)
                                                </p>
                                            </div>
                                            <h5>{{ $t->speciality }}</h5>
                                            <div class="name-and-img">
                                                <img src="./frontendCss/images/kanan.png" alt="">
                                                <p>{{ $t->name.' '.$t->surname }}</p>
                                            </div>
                                        </div>
                                        <div class="date-and-button">
                                            <p>
                                                <ion-icon name="calendar-number"></ion-icon>
                                                28.06.2022
                                            </p>
                                            <a href="">
                                                <button>Daha Ətraflı
                                                    <ion-icon name="arrow-forward"></ion-icon>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                </div>


                <h1>Reytinqi yüksək olan müəllimlər</h1>
                <ul class="categories-teacher T-R">
                    <li class="active-li" catid="*">Hamisi</li>
                    <li catid="riyaziyyat">Riyaziyyat</li>
                    <li catid="fizika">Fizika</li>

                </ul>
                <div class="teacher-row">
                    @foreach ($teacher as $t)
                        <div class="vip teacher fizika">
                            <img class="teacher-card-img " src="data:image/jpeg;base64,{{base64_encode($t->image)}}" alt="">
                            <div class="details">
                                <div class="details-1">
                                    <div class="rating-and-views">
                                        <p>
                                            <ion-icon name="eye"></ion-icon>
                                            {{ $t->see_count }}
                                        </p>
                                        <p>
                                            <ion-icon name="star"></ion-icon>
                                            4.6(50)
                                        </p>
                                    </div>
                                    <h5>{{ $t->speciality }}</h5>
                                    <div class="name-and-img">
                                        <img src="./frontendCss/images/kanan.png" alt="">
                                        <p>{{ $t->name.' '.$t->surname }}</p>
                                    </div>
                                </div>
                                <div class="date-and-button">
                                    <p>
                                        <ion-icon name="calendar-number"></ion-icon>
                                        {{ $t->created_at }}
                                    </p>
                                    <a href="">
                                        <button>Daha Ətraflı
                                            <ion-icon name="arrow-forward"></ion-icon>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach
                </div>
                <a href="#" class="see-all-href">
                    <button class="see-all-button">Bütün müəllimlər</button>
                </a>
            </div>
        </section>
        <section class="teacher-section student-section">
            <div class="container teacher-container">
                <h1>VİP Tələbələr</h1>
                <ul class="categories-ul student-ul">
                    <li class="active-li" catid="*">Hamisi</li>
                    <li catid="riyaziyyat">Riyaziyyat</li>
                    <li catid="fizika">Fizika</li>

                </ul>
                <div class="teacher-row ">
                    <div class="teacher student fizika ">
                        <div class="details">
                            <div class="details-1">
                                <div class="rating-and-views">
                                    <p>
                                        <ion-icon name="eye"></ion-icon>
                                        43 Baxış
                                    </p>
                                </div>
                                <h5>Fizika üzrə abituriyent hazırlayan kurs və ya müəllim axtarıram</h5>
                                <div class="name-and-img">
                                    <img src="./frontendCss/images/kanan.png" alt="">
                                    <p>Kənan Məmmədov</p>
                                </div>
                            </div>
                            <div class="date-and-button">
                                <p>
                                    <ion-icon name="calendar-number"></ion-icon>
                                    28.06.2022
                                </p>
                                <a href="">
                                    <button>Daha Ətraflı
                                        <ion-icon name="arrow-forward"></ion-icon>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="teacher student riyaziyyat">
                        <div class="details">
                            <div class="details-1">
                                <div class="rating-and-views">
                                    <p>
                                        <ion-icon name="eye"></ion-icon>
                                        43 Baxış
                                    </p>
                                </div>
                                <h5>Riyaziyyat üzrə abituriyent hazırlayan kurs və ya müəllim axtarıram</h5>
                                <div class="name-and-img">
                                    <img src="./frontendCss/images/kanan.png" alt="">
                                    <p>Kənan Məmmədov</p>
                                </div>
                            </div>
                            <div class="date-and-button">
                                <p>
                                    <ion-icon name="calendar-number"></ion-icon>
                                    28.06.2022
                                </p>
                                <a href="">
                                    <button>Daha Ətraflı
                                        <ion-icon name="arrow-forward"></ion-icon>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="teacher student riyaziyyat">
                        <div class="details">
                            <div class="details-1">
                                <div class="rating-and-views">
                                    <p>
                                        <ion-icon name="eye"></ion-icon>
                                        43 Baxış
                                    </p>
                                </div>
                                <h5>Riyaziyyat üzrə abituriyent hazırlayan kurs və ya müəllim axtarıram</h5>
                                <div class="name-and-img">
                                    <img src="./frontendCss/images/kanan.png" alt="">
                                    <p>Kənan Məmmədov</p>
                                </div>
                            </div>
                            <div class="date-and-button">
                                <p>
                                    <ion-icon name="calendar-number"></ion-icon>
                                    28.06.2022
                                </p>
                                <a href="">
                                    <button>Daha Ətraflı
                                        <ion-icon name="arrow-forward"></ion-icon>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="teacher student riyaziyyat">
                        <div class="details">
                            <div class="details-1">
                                <div class="rating-and-views">
                                    <p>
                                        <ion-icon name="eye"></ion-icon>
                                        43 Baxış
                                    </p>
                                </div>
                                <h5>Riyaziyyat üzrə abituriyent hazırlayan kurs və ya müəllim axtarıram</h5>
                                <div class="name-and-img">
                                    <img src="./frontendCss/images/kanan.png" alt="">
                                    <p>Kənan Məmmədov</p>
                                </div>
                            </div>
                            <div class="date-and-button">
                                <p>
                                    <ion-icon name="calendar-number"></ion-icon>
                                    28.06.2022
                                </p>
                                <a href="">
                                    <button>Daha Ətraflı
                                        <ion-icon name="arrow-forward"></ion-icon>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="see-all-href">
                    <button class="see-all-button">Bütün tələbələr</button>
                </a>
            </div>
        </section>
    </main>

@endsection

@section('js')
@endsection
