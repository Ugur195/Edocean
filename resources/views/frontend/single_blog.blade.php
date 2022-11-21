@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <main class="blog-single-main">
        <section class="blog-details-bg-img">
            <div class="blog-details-header-div container ">
                <h1>The Challenge Of Global Learning In Public Education</h1>
                <div class="author-and-date">
                    <div class="author">
                        <img class="author-img" src="./images/kanan.png" alt="">
                        @php($user=\App\Models\User::find($blogs->author))
                        <p class="author-name">{{$user->name}}</p>
                    </div>
                    <p class="detail-time">
                        <ion-icon name="time-outline"></ion-icon>
                        <span>18.11.2022</span></p>
                </div>
            </div>
        </section>
        <section class="blog-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 blog-detail-info mb-5">
                        <img class="blog-detail-img mb-5" src="./images/blog-detail-img.jpg" alt="">
                        <h3 class="mb-3">{{$blogs->title}}</h3>
                        <p class="pb-4">
                            {{$blogs->message}}
                        </p>
                        <div class="blog-comments mb-5">
                            <h3 class="mt-4 mb-4">Comments</h3>
                            <div class="comment-item d-flex align-items-flex-start mb-1">
                                <img src="./images/kanan.png" alt="">
                                <div class="comment-detail">
                                    <h5>Kanan Mammadov</h5>
                                    <p class="comment-time mb-3">18.11.22</p>
                                    <p class="mb-3">So I said lurgy dropped a clanger Jeffrey bugger cuppa gosh David
                                        blatant have it, standard A bit of how's your father my lady absolutely.</p>
                                    <a href="">Reply</a>
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-3 write_review">Write a review</h3>
                        <form action="" class="comment_form col-lg-12">
                            <div class="name_and_email mb-3 d-flex justify-content-between ">
                                <input class="name_input" type="text" placeholder="Your name">
                                <input class="email_input" type="text" placeholder="Your email">
                            </div>
                            <textarea class="comment_textarea mb-3" name="" id="comment_textarea" cols="30" rows="10"
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
    </main>
@endsection

@section('js')



@endsection


