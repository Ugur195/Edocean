@extends('frontend.app')

@section('css')
 <style>
    .teacher-card-img {
        width: 70% !important;
        margin-left:auto;
        margin-right:auto;
        margin-top: 20px;
    }
 </style>
@endsection

@section('content')
    <main class="blog">
        <section class="blog-header">
            <div class="blog-header-div container">
                <h1>Muellimler</h1>
                <p>
                    <a href="{{url('/')}}"> Ana səhifə</a
                    >
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                    Muellimler
                </p>
            </div>
        </section>
        <section class="blog-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 mb-5">
                        <div class="row">
                        @foreach ($teacher as $t)
                            <div class="col-lg-6 col-md-6 col-sm-12 blog-card-container">
                                <div class="blog-card">
                                    <img class="teacher-card-img"
                                         src="data:image/jpeg;base64,{{base64_encode($t->image)}}" alt="">
                                    <div class="details">
                                        <div class="details-1">
                                            <hr style="margin-top:-5px;" />
                                            <div class="row">
                                                <div class="name-and-img">
                                                    <h3>{{ $t->name }} <br /> {{$t->surname}}</h3>
                                                    <h5 style="margin-left: auto;">{{ $t->speciality }}</h5>
                                                </div>
                                                <div class="rating-and-views" style="margin-top: 20px">
                                                    <p>
                                                        <ion-icon name="eye"></ion-icon>
                                                        {{ $t->see_count }}
                                                    </p>
                                                    <p>
                                                        <ion-icon name="star"></ion-icon>
                                                        4.6(50)
                                                    </p>
                                                </div>
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
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 blog-main-right-container">
                        <div class="recent-posts">
                            <h4>Recent posts</h4>
                            <div class="recent-post-div d-flex align-items-center">
                                <img src="./images/teacher-card-img.jpg" alt="">
                                <div class="recent-post-text">
                                    <p>October 15, 2021</p>
                                    <h5><a href="">The Importance Intrinsic Motivation.</a></h5>
                                </div>
                            </div>
                            <div class="recent-post-div d-flex align-items-center">
                                <img src="./images/teacher-card-img.jpg" alt="">
                                <div class="recent-post-text">
                                    <p>October 15, 2021</p>
                                    <h5><a href="">The Importance Intrinsic Motivation.</a></h5>
                                </div>
                            </div>
                            <div class="recent-post-div d-flex align-items-center">
                                <img src="./images/teacher-card-img.jpg" alt="">
                                <div class="recent-post-text">
                                    <p>October 15, 2021</p>
                                    <h5><a href="">The Importance Intrinsic Motivation.</a></h5>
                                </div>
                            </div>
                            <div class="recent-post-div d-flex align-items-center">
                                <img src="./images/teacher-card-img.jpg" alt="">
                                <div class="recent-post-text">
                                    <p>October 15, 2021</p>
                                    <h5><a href="">The Importance Intrinsic Motivation.</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="blog-categories">
                            <h4>Category</h4>
                            <ul class="bl-cat">
                                @foreach($teachers_course as $tc)
                                    <a href="">
                                        <li>{{$tc->name}}</li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('js')



@endsection

