@extends('frontend.app')

@section('css')
@endsection

@section('content')
    <main class="blog">
        <section class="blog-header">
            <div class="blog-header-div container">
                <h1>Bloqlar</h1>
                <p>
                    <a href="{{url('/')}}"> Ana səhifə</a
                    >
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                    Bloqlar
                </p>
            </div>
        </section>
        <section class="blog-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 mb-5">
                        <div class="row">
                            @foreach($blogs as $b)
                                @php($user=\App\Models\User::find($b->author)->with('admin')->get())
                                <div class="col-lg-6 col-md-6 col-sm-12 blog-card-container">
                                    <div class="blog-card">
                                        <img class="blog-card-img" src="data:image/jpeg;base64,{{base64_encode($b->image)}}" alt="">
                                        <div class="details">
                                            <div class="details-1">
                                                <h5><a href="">{{$b->title}}</a>
                                                </h5>
                                                <div class="name-and-img">
                                                    <img style="object-fit: cover" src="data:image/jpeg;base64,{{base64_encode($b->admin->image)}}"
                                                         alt="">
                                                    @if($b->admin->name != null)
                                                        <p>{{$b->admin->name}}</p>
                                                    @else 
                                                        <p>{{$b->users->name}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="date-and-button blog-date">
                                                <p>
                                                    @php($vaxt=$b->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <ion-icon name="calendar-number"></ion-icon>
                                                    {{$vaxt->diffForHumans()}}
                                                </p>
                                                <p>
                                                    <ion-icon name="chatbubble"></ion-icon>
                                                    5 komment
                                                </p>
                                            </div>
                                            <div class="blog-btn">
                                                <a href="{{url('single_blog/'.$b->id)}}">
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
                                @foreach($blog_category as $bg)
                                    <a href="">
                                        <li>{{$bg->name}}</li>
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

