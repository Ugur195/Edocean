@extends('backend.app')
@section('css')
@endsection

@section('content')
    <div class="d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header card-header-tabs-line">
{{--                        <div class="card-toolbar">--}}
{{--                            <div class="d-flex align-items-center flex-wrap mr-2">--}}
{{--                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Admin</h5>--}}
{{--                                <div--}}
{{--                                    class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                <!--begin::Item-->
                                <li class="nav-item  mr-3">
                                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                        <span class="nav-text font-size-lg">Profile</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link" data-toggle="tab"  href="#">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
																		<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
																		<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                        <span href="{{url('admin/admins/show-password')}}" class="nav-text font-size-lg">Change Password</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                            </ul>
                        </div>
                        <!--end::Toolbar-->

                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-5">
                            <!--begin::Tab Content-->
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                <form id="EditAdmin" class="form"
                                      action="{{route('admin.admins.update',$admins_edit->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="col-xl-3"></div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                                 style="background-size:fill; background-position:center;
                                                  background-image: url(assets/media/users/blank.png)">
                                                <div class="image-input-wrapper"
                                                     style="background-size:fill;
                                                      background-position:center; background-image:
                                                       url('data:image/jpeg;base64,{{base64_encode($admins_edit->image)}}')">
                                                </div>
                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="image" id="file"
                                                           accept=".png, .png(), .jpg, .jpg(), .jpeg, .jpeg()"/>
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">First Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid"
                                                   name="first_name" type="text"
                                                   @if ($admins_edit->first_name !== null)
                                                       value="{{ $admins_edit->first_name }}"
                                                   @else
                                                       value="{{$admins_edit->name}}"
                                                @endif
                                            />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Last Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid"
                                                   name="last_name" type="text"
                                                   value="{{$admins_edit->last_name}}" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Father Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid"
                                                   name="father_name" type="text"
                                                   value="{{$admins_edit->father_name}}" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Birthday</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-solid date" id="kt_datetimepicker_3"
                                                 data-target-input="nearest">
                                                <input type="text" name="birthday"
                                                       class="form-control form-control-solid datetimepicker-input"
                                                       value="{{$admins_edit->birthday}}"
                                                       data-target="#kt_datetimepicker_3" required/>
                                                <div class="input-group-append" data-target="#kt_datetimepicker_3"
                                                     data-toggle="datetimepicker">
                                                    <span class="input-group-text"><i class="ki ki-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Email</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" name="email"
                                                   type="text"
                                                   value="{{$admins_edit->email}}" required/>
                                        </div>
                                    </div>


                                    <div class="col-xl-3"></div>
                                    <!--begin::Actions-->
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="d-flex justify-content-between border-top pt-10">
                                                <div class="mr-2">
                                                </div>
                                                <div>
                                                    <a href="{{route('admin.admins.index')}}" type="button"
                                                       class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                       data-wizard-type="action-submit">Back
                                                    </a>

                                                    <button
                                                        class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
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
            $('#EditAdmin').ajaxForm({
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
                            window.location.href = '/admin/admins';
                        }, 1000)
                    }
                }
            });
        });

    </script>

    <script>
        //Birthday
        $('#kt_datetimepicker_3').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    </script>
@endsection


