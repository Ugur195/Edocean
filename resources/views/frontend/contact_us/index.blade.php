@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')

    <main class="contact">
        <section class="contact-header">
            <div class="contact-header-div container">
                <h1>Əlaqə</h1>
                <p>
                    <a href="./index.html"> Ana səhifə</a
                    >
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                    Əlaqə
                </p>
            </div>
        </section>
        <section class="contact-main">
            <div class="container">
                <div class="contact-form">
                    <h3>Bizə mesaj yazın</h3>
                    <form id="formContactUs" action="{{route('frontend.contact_us.send_message')}}" method="POST">
                        @csrf
                        <div class="input-and-label">
                            <label for=""> Full name</label>
                            <input name="full_name" id="full_name" type="text" class="form-control"/>
                        </div>
                        <div class="input-and-label">
                            <label for="">Email</label>
                            <input name="email" id="email" type="email" class="form-control"/>
                        </div>
                        <div class="input-and-label">
                            <label for="">Subject</label>
                            <input name="subject" id="subject" type="text" class="form-control"/>
                        </div>
                        <div class="input-and-label">
                            <label for="">Your message</label>
                            <textarea name="message" id="message" class="contact-textarea form-control"
                                      cols="30"
                                      rows="10"></textarea>
                        </div>
                        <a href="">
                            <button class="btn-submit" id="submit-btn">Send Message</button>
                        </a>
                    </form>
                </div>

                <div class="contact-information">
                    <h3>Əlaqə məlumatları</h3>
                    <div class="informations">
                        <div class="information-detail">
                            <ion-icon name="location-outline"></ion-icon>
                            <div>
                                <h3>Bizim Ofis</h3>
                                <p>{{$setting->address}}</p>
                            </div>
                        </div>
                        <div class="information-detail">
                            <ion-icon name="mail-outline"></ion-icon>
                            <div>
                                <h3>Email</h3>
                                <p>{{$setting->email}}</p>
                            </div>
                        </div>
                        <div class="information-detail">
                            <ion-icon name="call-outline"></ion-icon>
                            <div>
                                <h3>Phone</h3>
                                <p>{{$setting->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/sweetalert2.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#submit-btn').click(function (e) {
                e.preventDefault()
                $.ajax({
                    'url': $('#formContactUs').attr('action'),
                    'type': 'post',
                    'data': $('#formContactUs').serialize(),
                    success: function (response) {
                        console.log({response})
                        if (response.status == 'validation-error') {
                            $('#formContactUs .invalid-feedback').remove();
                            $('#formContactUs .form-control').removeClass('is-invalid')
                            console.log(response.errors)
                            $.each(response.errors, function (key, value) {
                                    $('#formContactUs .form-control[name="' + key + '"]').addClass('is-invalid').after('<span class="mt-1 invalid-feedback d-block">' + value[0] + '</span>')
                            })
                        } else {
                            $('.invalid-feedback').remove();
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false,
                            })
                            if (response.status === 'success') {
                                setTimeout(function () {
                                    window.location.href = '/contact_us';
                                }, 500)
                            }
                        }
                    }
                })
            })

        });
    </script>


@endsection
