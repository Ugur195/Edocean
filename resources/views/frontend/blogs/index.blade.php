@extends('frontend.app')

@section('css')
@endsection

@section('content')
    <main class="blog">
        <section class="blog-header">
            <div class="blog-header-div container">
                <h1 class="Start">Bloqlar</h1>
                <p><a href="{{url('/')}}"> Ana səhifə</a><ion-icon name="arrow-forward-outline"></ion-icon>Bloqlar</p>
            </div>
        </section>
        <section class="blog-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 mb-5">
                        <div class="row">
                            @foreach($blogs as $b)
                                @php($user=\App\Models\User::find($b->author)->with('admin')->get())
                                @php($blogs_comments = \App\Models\BlogComment::where(['blog_id'=>$b->id,'status' => 1])->get())
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
                                                <a href="{{url('single_blog/'.$b->id)}}">
                                                    <p>
                                                        <ion-icon  name="chatbubble"></ion-icon>
                                                        ({{count($blogs_comments)}}) komment
                                                    </p>
                                                </a>

                                            </div>
                                            <div class="blog-btn">
                                                <a href="{{route('frontend.blogs.edit',$b->id)}}">
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
                            @foreach($blogs as $bl)
                                <div class="recent-post-div d-flex align-items-center">
                                    <img style="object-fit: contain;" class="blog-card-img" src="data:image/jpeg;base64,{{base64_encode($bl->image)}}" alt="">
                                    <div class="recent-post-text">
                                        <p>
                                            @php($vaxt=$bl->created_at)
                                            @php($vaxt->setLocale('az'))
                                            {{$vaxt->diffForHumans()}}
                                        </p>
                                        <h5><a href="">{{$bl->message}}</a></h5>
                                    </div>
                                </div>
                            @endforeach
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

