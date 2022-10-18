@extends('backend.app')


@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
<div class="d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">About Us</h5>
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-5">
                            <!--begin::Tab Content-->
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                <form id="myAboutUs" class="form" method="POST">
                                    {{csrf_field()}}
                                    <input name="id" class="form-control form-control-lg form-control-solid" hidden type="text"
                                        value="{{$about_us->id}}"/>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Our Responsibility</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="our_responsib" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$about_us->our_responsib}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Our Responsibility_Ru</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="our_responsib_ru" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$about_us->our_responsib_ru}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Our Responsibility_En</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="our_responsib_en" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$about_us->our_responsib_en}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Content</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="content_az" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$about_us->content_az}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Content_Ru</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="content_ru" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$about_us->content_ru}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Content_En</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="content_en" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$about_us->content_en}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Video_Link</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="video_link" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$about_us->video_link}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Video_Sub_Title</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="video_sub_title" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$about_us->video_sub_title}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Video_Sub_Title_Ru</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="video_sub_title_ru" type="text"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{$about_us->video_sub_title_ru}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Video_Sub_Title_En</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="video_sub_title_en" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$about_us->video_sub_title_en}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Our Purpose</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="our_purpose" type="text"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{$about_us->our_purpose}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Our_Purpose_Ru</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="our_purpose_ru" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$about_us->our_purpose_ru}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Our_Purpose_En</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="our_purpose_en" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$about_us->our_purpose_en}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="d-flex justify-content-between border-top pt-10">
                                                <div class="mr-2">
                                                </div>
                                                <div>
                                                    <a href="{{url('admin/index')}}" type="button"
                                                    class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                    data-wizard-type="action-submit">Back
                                                    </a>
                                                    <button class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                            data-wizard-type="action-next">Update
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script src="{{asset('backendCssJs/assets/js/pages/custom/contacts/edit-contact.js')}}"></script>
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>


    <script>
        $(document).ready(function () {
            $('#myAboutUs').ajaxForm({
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
                            window.location.href = '/admin/about_us';
                        }, 500)
                    }
                }
            });
        });
    </script>

@endsection
