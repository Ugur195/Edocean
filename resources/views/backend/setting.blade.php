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
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Setting</h5>
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-5">
                            <!--begin::Tab Content-->
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                <form id="mySetting" class="form" method="POST">
                                    {{csrf_field()}}
                                    <input name="id" class="form-control form-control-lg form-control-solid" hidden type="text"
                                        value="{{$setting->id}}"/>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Logo</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                                style="background-image: url(assets/media/users/blank.png)">

                                                <div class="image-input-wrapper"
                                                    style="background-image: url('data:image/jpeg;base64,{{base64_encode($setting->logo)}}')">
                                                </div>
                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="logo" id="file" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="profile_avatar_remove"/>
                                                </label>

                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Url</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="url" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->url}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Title</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="title" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->title}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Description</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="description" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->description}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Description_RU</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="description_ru" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->description_ru}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Description_EN</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="description_en" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->description_en}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Keywords</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="keywords" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->keywords}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Analytics</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="analytics" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->analytics}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Author</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="author" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->author}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="phone" type="text"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{$setting->phone}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Fax</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="fax" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->fax}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Email </label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="email" type="text"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{$setting->email}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Facebook</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="facebook" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->facebook}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Twitter</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="twitter" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->twitter}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Instagram</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="instagram" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->instagram}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Youtube</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="youtube" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->youtube}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Whatsapp</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="whatsapp" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->whatsapp}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Google</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="google" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->google}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="address" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->address}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="country" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->country}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="city" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->city}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Maps</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="maps" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->maps}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Smpt_User</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="smpt_user" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->smpt_user}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Smpt_Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="smpt_password" class="form-control form-control-lg form-control-solid"
                                                type="text"
                                                value="{{$setting->smpt_password}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Host</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="host" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->host}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Port</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="port" class="form-control form-control-lg form-control-solid" type="text"
                                                value="{{$setting->port}}"/>
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
            $('#mySetting').ajaxForm({
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
                            window.location.href = '/admin/setting';
                        }, 500)
                    }
                }
            });
        });
    </script>

@endsection
