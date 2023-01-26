@extends('account.student.app')

@section('css')
@endsection


@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">


                                <li class="nav-item mr-3">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1" >
														<span class="nav-icon">
															<span class="svg-icon">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                                            fill="#000000" opacity="0.3"/>
																	</g>
																</svg>
															</span>
														</span>
                                        <span class="nav-text font-size-lg">Change Password</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>


                    <div class="card-body">
                        <form  id="ChangePassword"  action="{{route('account.student.changePassword',$student->id)}}"
                               method="POST" class="form needs-validation" novalidate >
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-2"></div>
                                            <div class="col-xl-7">
                                                <div class="row mb-5">
                                                    <label class="col-3"></label>
                                                    <div class="col-9">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-3"></label>
                                                    <div class="col-9">
                                                        <h6 class="text-dark font-weight-bold mb-10">Change Or Recover
                                                            Your Password:</h6>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-right text-left">Current
                                                        Password</label>
                                                    <div class="col-9">
                                                        <input
                                                            class="form-control form-control-lg form-control-solid"
                                                            type="password" name="current-password" required />
                                                        <div class="invalid-feedback">Write your Current Password correct.</div>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-right text-left">New
                                                        Password</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="password" name="new-password" required />
                                                        <div class="invalid-feedback">Write your New Password  correct.</div>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-right text-left">Verify
                                                        Password</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="password"  name="new-password_confirmation" required/>
                                                        <div class="invalid-feedback">Write your New Confirmation Password correct.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-footer pb-0">
                                        <div class="row">
                                            <div class="col-xl-2"></div>
                                            <div class="col-xl-7">
                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="d-flex justify-content-between border-top pt-10">
                                                            <div class="mr-2">
                                                            </div>
                                                            <div>
                                                                <a href="{{url('account/student')}}" type="button"
                                                                   class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                                   data-wizard-type="action-submit">Back
                                                                </a>
                                                                <button
                                                                    class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                                    data-wizard-type="action-next">Save changes
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection

@section('js')
    <script src={{asset('backendCssJs/assets/js/pages/custom/user/edit-user.js')}}></script>
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#ChangePassword').ajaxForm({
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
                            window.location.reload();
                        }, 1000)
                    }
                }
            });
        });

        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

    </script>


@endsection


