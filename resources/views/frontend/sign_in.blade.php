@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <section class="login-page">
        <img class="man-1" src="./frontendCss/images/man-1.png" alt="">
        <img class="man-2" src="./frontendCss/images/man-2.png" alt="">
        <img class="sign-up-img" src="./frontendCss/images/sign-up.png" alt="">
        <form id="MySignIn" class="login-form" method="post">
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
                    <input class="login-submit" id="submit-btn"  type="submit" value="Daxil ol">
                    <a href="{{url('sign_up')}}">Qeydiyyat</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/sweetalert2.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#submit-btn').click(function (e) {
                e.preventDefault()
                $.ajax({
                    'url': $('#MySignIn').attr('action'),
                    'type': 'post',
                    'data': $('#MySignIn').serialize(),
                    success: function (response) {
                        console.log({response})
                        if (response.status == 'validation-error') {
                            $('#MySignIn .invalid-feedback').remove();
                            $('#MySignIn .form-control').removeClass('is-invalid')
                            console.log(response.errors)
                            $.each(response.errors, function (key, value) {
                                $('#MySignIn input[name="' + key + '"]').addClass('is-invalid').after('<span class="mt-1 invalid-feedback d-block">' + value[0] + '</span>')
                            })
                        } else {
                            $('.invalid-feedback').remove();
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false,
                            })
                        }
                    }
                })
            })

        });
    </script>


@endsection

