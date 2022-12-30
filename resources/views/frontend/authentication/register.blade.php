@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <section class="login-page register-page">
        <img class="man-1" src="./frontendCss/images/man-1.png" alt="">
        <img class="man-2" src="./frontendCss/images/man-2.png" alt="">
        <img class="sign-up-img" src="./frontendCss/images/sign-up.png" alt="">
        <form id="formSignUp" class="login-form" action="{{route('register.user')}}" method="POST">
            @csrf
            <h2 class="login-h2">Qeydiyyat</h2>
            <div class="login-form-div">
                <div>
                    <label for="">Ad</label>
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
                        <input type="password" name="password_confirmation" id="re-passwordd">
                        <ion-icon class="show-repass" name="eye-off"></ion-icon>
                    </div>

                </div>


                <div>
                    <div class="autor">
                        <div>
                            <input type="radio" value="4" name="author" id="student" checked>
                            <label for="student">Tələbə</label>
                        </div>
                        <div>
                            <input type="radio" value="3" name="author" id="teacher">
                            <label for="teacher">Müəllim</label>
                        </div>
                        <div>
                            <input type="radio" value="2" name="author" id="course">
                            <label for="course">Kurs</label>
                        </div>

                    </div>
                </div>
                <div class="btn-and-txt">
                    <button class="btn login-submit" id="submit-btn" type="button">Qeydiyyatdan Keç</button>
                    <a href="{{route('login')}}">Giriş</a>
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
            $('#submit-btn').click(function (e) {
                e.preventDefault()
                $.ajax({
                    'url': $('#formSignUp').attr('action'),
                    'type': 'post',
                    'data': $('#formSignUp').serialize(),
                    success: function (response) {
                        console.log({response})
                        if (response.status == 'validation-error') {
                            $('#formSignUp .invalid-feedback').remove();
                            $('#formSignUp input').removeClass('is-invalid')
                            $.each(response.errors, function (key, value) {
                              if(key == 'author') {
                                $('#formSignUp .autor').append('<span class="mt-1 invalid-feedback d-block">' + value[0] + '</span>')
                              } else
                                $('#formSignUp input[name="' + key + '"]').addClass('is-invalid').after('<span class="mt-1 invalid-feedback d-block">' + value[0] + '</span>')

                            })
                        } else {
                            $('.invalid-feedback').remove();
                            Swal.fire({
                                    title: response.title,
                                    text: response.message,
                                    icon: response.status,
                                    allowOutsideClick: false,
                                })
                                if(response.status === 'success') {
                                    window.location.href = '/login';
                                }
                        }
                    }
                })
            })

        });
    </script>

@endsection

