@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <main class="blog-single-main">
        <form id="mySingleBlog" method="post">
            {{csrf_field()}}
            <section class="blog-details-bg-img">
                <div class="blog-details-header-div container ">
                    @foreach($about_us as $ab)
                        <h1>{{$ab->our_responsib}}</h1>
                    @endforeach
                    <div class="author-and-date">
                        <div class="author">
                            @php($user=\App\Models\User::find($blogs_id->author)->with('admin')->get())
                            <img class="author-img"
                                 src="data:image/jpeg;base64,{{base64_encode($blogs_id->admin->image)}}"
                                 alt="">
                            @if($blogs_id->admin->name != null)
                                <p>{{$blogs_id->admin->name}}</p>
                            @else
                                <p>{{$blogs_id->users->name}}</p>
                            @endif
                        </div>
                        <p class="detail-time">
                            @php($vaxt=$blogs_id->created_at)
                            @php($vaxt->setLocale('az'))
                            <ion-icon name="time-outline"></ion-icon>
                            <span> {{$vaxt->diffForHumans()}}</span></p>
                    </div>
                </div>
            </section>
            <section class="blog-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 blog-detail-info mb-5">
                            {{--                            <img class="blog-detail-img mb-5"--}}
                            {{--                                 src="data:image/jpeg;base64,{{base64_encode($blogs_id->image)}} "--}}
                            {{--                                 alt="">--}}
                            <section class="tchr-certficates">
                                <div class="tchr_crtf">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach(explode('(xx)',$blogs_id->image) as $key => $bimg)
                                                @if($bimg !="")
                                                    <div class="carousel-item {{$key == 0 ? 'active' : ''}} crtf">

                                                        <img
                                                            class="d-block"
                                                            src="data:image/jpeg;base64,{{base64_encode($bimg)}}"
                                                            alt="">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls"
                                                data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls"
                                                data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </section>

                            <h3 class="mb-3">{{$blogs_id->title}}</h3>
                            <p class="pb-4">
                                {{$blogs_id->message}}
                            </p>
                            <div class="blog-comments mb-5">
                                <h3 class="mt-4 mb-4">Comments({{count($blogs_comments)}})</h3>
                                @foreach($blogs_comments as $bc)
                                    @php($user=$bc->UsersComments)
                                    @if($bc->parent_id==0)
                                        <div class="comment-item d-flex align-items-flex-start mb-3">
                                            @if(isset($user->teacher))
                                                @php(dd($user))
                                                <img
                                                    src="@if($user->teacher->image!=null)
                                                        data:image/jpeg;base64,{{base64_encode($user->teacher->image)}}
                                                    @else
                                                        /frontendCss/images/kanan.png @endif">
                                                <div class="comment-detail">
                                                    <h5>
                                                        @if($bc->user_id==0)
                                                            {{$bc->name}}
                                                        @else
                                                            {{$user->teacher->name}}
                                                        @endif
                                                    </h5>
                                                    @php($vaxt=$bc->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <p class="comment-time mb-3">{{$vaxt->diffForHumans()}}</p>
                                                    <p class="mb-3">
                                                        {{$bc->message}}
                                                    </p>
                                                    <a onclick="parentBlogsComments('{{$bc->id}}')">Reply</a>
                                                </div>
                                            @elseif(isset($user->student))
                                                <img
                                                    src="@if($user->student->image!=null)
                                                        data:image/jpeg;base64,{{base64_encode($user->student->image)}}
                                                    @else
                                                        /frontendCss/images/kanan.png @endif">
                                                <div class="comment-detail">
                                                    <h5>
                                                        @if($bc->user_id==0)
                                                            {{$bc->name}}
                                                        @else
                                                            {{$user->student->name}}
                                                        @endif
                                                    </h5>
                                                    @php($vaxt=$bc->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <p class="comment-time mb-3">{{$vaxt->diffForHumans()}}</p>
                                                    <p class="mb-3">
                                                        {{$bc->message}}
                                                    </p>
                                                    <a onclick="parentBlogsComments('{{$bc->id}}')">Reply</a>
                                                </div>
                                            @elseif(isset($user->course))
                                                <img
                                                    src="@if($user->course->image!=null)
                                                        data:image/jpeg;base64,{{base64_encode($user->course->image)}}
                                                    @else
                                                        /frontendCss/images/kanan.png @endif">
                                                <div class="comment-detail">
                                                    <h5>
                                                        @if($bc->user_id==0)
                                                            {{$bc->name}}
                                                        @else
                                                            {{$user->course->name}}
                                                        @endif
                                                    </h5>
                                                    @php($vaxt=$bc->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <p class="comment-time mb-3">{{$vaxt->diffForHumans()}}</p>
                                                    <p class="mb-3">
                                                        {{$bc->message}}
                                                    </p>
                                                    <a onclick="parentBlogsComments('{{$bc->id}}')">Reply</a>
                                                </div>
                                            @else
                                                <img
                                                    src="/frontendCss/images/kanan.png">
                                                <div class="comment-detail">
                                                    <h5>
                                                        @if($bc->user_id==0)
                                                            {{$bc->name}}
                                                        @else
                                                            {{$user->name}}
                                                        @endif
                                                    </h5>
                                                    @php($vaxt=$bc->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <p class="comment-time mb-3">{{$vaxt->diffForHumans()}}</p>
                                                    <p class="mb-3">
                                                        {{$bc->message}}
                                                    </p>
                                                    <a onclick="parentBlogsComments('{{$bc->id}}')">Reply</a>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    @foreach($bc->ParentBlogsComments->where('status',1) as $bb)
                                        @php($user=$bb->UsersComments)
                                        <div
                                             class="comment-item d-flex align-items-flex-start mb-3 comment-reply">
                                            @if(isset($user->teacher))
                                                <img
                                                    src="@if($user->teacher->image!=null)
                                                        data:image/jpeg;base64,{{base64_encode($user->teacher->image)}}
                                                    @else
                                                        /frontendCss/images/kanan.png @endif">
                                                <div class="comment-detail">
                                                    <h5>
                                                        @if($bb->user_id==0)
                                                            {{$bb->name}}
                                                        @else
                                                            {{$user->teacher->name}}
                                                        @endif
                                                    </h5>
                                                    @php($vaxt=$bb->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <p class="comment-time mb-3">{{$vaxt->diffForHumans()}}</p>
                                                    <p class="mb-3">
                                                        {{$bb->message}}
                                                    </p>
                                                    <a onclick="parentBlogsComments('{{$bb->id}}')">Reply</a>
                                                </div>
                                            @elseif(isset($user->student))
                                                <img
                                                    src="@if($user->student->image!=null)
                                                        data:image/jpeg;base64,{{base64_encode($user->student->image)}}
                                                    @else
                                                        /frontendCss/images/kanan.png @endif">
                                                <div class="comment-detail">
                                                    <h5>
                                                        @if($bb->user_id==0)
                                                            {{$bb->name}}
                                                        @else
                                                            {{$user->student->name}}
                                                        @endif
                                                    </h5>
                                                    @php($vaxt=$bb->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <p class="comment-time mb-3">{{$vaxt->diffForHumans()}}</p>
                                                    <p class="mb-3">
                                                        {{$bb->message}}
                                                    </p>
                                                    <a onclick="parentBlogsComments('{{$bb->id}}')">Reply</a>
                                                </div>
                                            @elseif(isset($user->course))
                                                <img
                                                    src="@if($user->course->image!=null)
                                                        data:image/jpeg;base64,{{base64_encode($user->course->image)}}
                                                    @else
                                                        /frontendCss/images/kanan.png @endif">
                                                <div class="comment-detail">
                                                    <h5>
                                                        @if($bb->user_id==0)
                                                            {{$bb->name}}
                                                        @else
                                                            {{$user->course->name}}
                                                        @endif
                                                    </h5>
                                                    @php($vaxt=$bb->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <p class="comment-time mb-3">{{$vaxt->diffForHumans()}}</p>
                                                    <p class="mb-3">
                                                        {{$bb->message}}
                                                    </p>
                                                    <a onclick="parentBlogsComments('{{$bb->id}}')">Reply</a>
                                                </div>
                                            @else
                                                <img
                                                    src="/frontendCss/images/kanan.png">
                                                <div class="comment-detail">
                                                    <h5>
                                                        @if($bb->user_id==0)
                                                            {{$bb->name}}
                                                        @else
                                                            {{$user->name}}
                                                        @endif
                                                    </h5>
                                                    @php($vaxt=$bb->created_at)
                                                    @php($vaxt->setLocale('az'))
                                                    <p class="comment-time mb-3">{{$vaxt->diffForHumans()}}</p>
                                                    <p class="mb-3">
                                                        {{$bb->message}}
                                                    </p>
                                                    <a onclick="parentBlogsComments('{{$bb->id}}')">Reply</a>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            <hr id="writeBlogsComments" class="solid my-5">
                            <h3 class="mb-3 write_review">Leave a comment</h3>
                            <div id="forParentBlogsComments"></div>
                            <form action="" class="comment_form col-lg-12">
                                <div class="name_and_email mb-3 d-flex justify-content-between ">
                                    @if(!Auth::check())
                                        <input class="name_input" id="name" name="name" type="text"
                                               placeholder="Your name">
                                        <input class="email_input" id="email" name="email" type="text"
                                               placeholder="Your email">
                                    @endif
                                </div>
                                <textarea class="comment_textarea" name="comment" id="comment" cols="30"
                                          rows="10"
                                          placeholder="Enter your comment ..."></textarea>
                                <button class="comment_button">Post comment</button>
                            </form>
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
                            </div>
                            <div class="blog-categories">
                                <h4>Category</h4>
                                <ul class="bl-cat">
                                    @foreach($blog_category as $bc)
                                        <a href="">
                                            <li>{{$bc->name}}</li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </main>
@endsection

@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/sweetalert2.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#mySingleBlog').ajaxForm({
                beforeSubmit: function () {
                },
                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false
                        }
                    )
                    if (response.status === 'success') {
                        setTimeout(function () {
                            window.location.href = '/single_blog/{{$blogs_id->id}}';
                        }, 1000)
                    }
                }
            });
        });
    </script>


    <script>
        function parentBlogsComments(id) {
            var parent_id = '<input type="hidden" value="' + id + '" name="parent_id" id="parent_id"  />';
            document.getElementById("forParentBlogsComments").innerHTML = parent_id;
            $('html, body').animate({
                scrollTop: $("#writeBlogsComments").offset().top
            }, 1000);
        }
    </script>

@endsection


