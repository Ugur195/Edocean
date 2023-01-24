@extends('frontend.app')

@section('css')
@endsection

@section('content')
    <section class="login-page">
        <img class="man-1" src="./frontendCss/images/man-1.png" alt="">
        <img class="man-2" src="./frontendCss/images/man-2.png" alt="">
        <img class="sign-up-img" src="./frontendCss/images/sign-up.png" alt="">
        <form  class="login-form" action="{{ route('password.request') }}" method="post">
            @csrf
            <h2 class="login-h2">Elektron unvanini tesdiqle</h2>
            <div class="login-form-div">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Elektron unvaniniza mektub gonderildi
                    </div>
                @endif
                <div class="btn-and-txt">
                    <input class="login-submit" id="submit-btn"  type="submit" value="Bir sorgu daha gonder">
                </div>
            </div>
        </form>
    </section>


@endsection

@section('js')

@endsection

