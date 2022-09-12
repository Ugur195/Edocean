@extends('frontend.app')

@section('css')
@endsection

@section('content')
    <section class="login-page register-page">
        <img class="man-1" src="./frontendCss/images/man-1.png" alt="">
        <img class="man-2" src="./frontendCss/images/man-2.png" alt="">
        <img class="sign-up-img" src="./frontendCss/images/sign-up.png" alt="">
        <form class="login-form" method="POST">
            {{csrf_field()}}
            <h2 class="login-h2">Qeydiyyat</h2>
            <div class="login-form-div">
                <div>
                    <label for="">Ad, Soyad</label>
                    <input type="text" name="name">
                </div>

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
                    <input type="password" name="password" required>
                </div>
                <div>
                    <label for="">Şifrəni təstiqləyin</label>
                    <input type="password" name="retain_password" required>
                </div>


                <div>
                    <div class="autor">
                        <div>
                            <input type="radio" value="4" name="radio" id="student">
                            <label for="student">Tələbə</label>
                        </div>
                        <div>
                            <input type="radio" value="3" name="radio" id="teacher">
                            <label for="teacher">Müəllim</label>
                        </div>
                        <div>
                            <input type="radio" value="2" name="radio" id="course">
                            <label for="course">Kurs</label>
                        </div>

                    </div>
                </div>
                <div class="btn-and-txt">
                    <input class="login-submit" type="submit" value="Qeydiyyatdan Keç">
                    <a href="./sign_in">Giriş</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('js')
@endsection

