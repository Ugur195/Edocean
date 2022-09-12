@extends('frontend.app')

@section('css')
@endsection

@section('content')
    <section class="login-page">
        <img class="man-1" src="./frontendCss/images/man-1.png" alt="">
        <img class="man-2" src="./frontendCss/images/man-2.png" alt="">
        <img class="sign-up-img" src="./frontendCss/images/sign-up.png" alt="">
        <form class="login-form" method="post">
            {{csrf_field()}}
            <h2 class="login-h2">Giriş</h2>
            <div class="login-form-div">
                <div>
                    <label for="">Fin</label>
                    <input type="text" name="fin">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label for="">Şifrə</label>
                    <input type="password" name="password">
                </div>
                <div class="btn-and-txt">
                    <input class="login-submit" type="submit" value="Daxil ol">
                    <a href="./sign_up">Qeydiyyat</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('js')
@endsection

