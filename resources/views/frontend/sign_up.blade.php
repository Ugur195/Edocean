@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <section class="login-page register-page">
        <img class="man-1" src="./frontendCss/images/man-1.png" alt="">
        <img class="man-2" src="./frontendCss/images/man-2.png" alt="">
        <img class="sign-up-img" src="./frontendCss/images/sign-up.png" alt="">
        <form id="formSignUp" class="login-form" method="POST">
            {{csrf_field()}}
            <h2 class="login-h2">Qeydiyyat</h2>
            <div class="login-form-div">
                <div>
                    <label for="">Ad, Soyad</label>
                    <input type="text" name="name" id="user_name">
                </div>

                <div>
                    <label for="">Fin</label>
                    <input type="text" name="fin" id="user_fin">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email" id="user_email">
                </div>

                <div>
                    <label for="">Şifrə</label>
                    <div class="input-and-iconn">
                        <input type="password" name="password" id="passwordd">
                        <ion-icon class="show-pass" name="eye-off"></ion-icon>

                    </div>

                </div>
                <div>

                    <label for="">Şifrəni təstiqləyin</label>
                    <div class="input-and-iconn">
                        <input type="password" name="retain_password" id="re-passwordd">
                        <ion-icon class="show-repass" name="eye-off"></ion-icon>
                    </div>

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
                    <input class="login-submit" id="submit-btn" type="submit" value="Qeydiyyatdan Keç">
                    <a href="./sign_in">Giriş</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/sweetalert2.js')}}"></script>
    <script src="{{asset('jsValidate/register.js')}}"></script>




    <script>
        $(document).ready(function () {
            $('#formSignUp').ajaxForm({
                success: function (response) {

                    if (response.status == 'success') {
                        Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false,
                            }
                        )
                        window.location.href = '/sign_in';
                    }else{
                        document.getElementById('user_email').value=' email var';
                        document.getElementById('user_fin').value='fin var';
                    }
                }
            });
        });
    </script>




@endsection

