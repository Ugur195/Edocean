@extends('backend.app')
@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <div class="d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="card-label">Course</h5>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form id="MyCourse" method="POST" class="form">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3"></div>

                                <div class="col-xl-6">

                                    {{--                                    <div class="form-group row">--}}
                                    {{--                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>--}}
                                    {{--                                        <div class="col-lg-9 col-xl-9">--}}
                                    {{--                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"--}}
                                    {{--                                                 style="background-image: url(assets/media/users/blank.png)">--}}

                                    {{--                                                <div class="image-input-wrapper"--}}
                                    {{--                                                     style="background-image: url('data:image/jpeg;base64,{{base64_encode($student_edit->image)}}')">--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <label--}}
                                    {{--                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"--}}
                                    {{--                                                    data-action="change" data-toggle="tooltip" title=""--}}
                                    {{--                                                    data-original-title="Change avatar">--}}
                                    {{--                                                    <i class="fa fa-pen icon-sm text-muted"></i>--}}
                                    {{--                                                    <input type="file" name="logo" id="file" accept=".png, .jpg, .jpeg" />--}}
                                    {{--                                                    <input type="hidden" name="profile_avatar_remove"/>--}}
                                    {{--                                                </label>--}}

                                    {{--                                                <span--}}
                                    {{--                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"--}}
                                    {{--                                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">--}}
                                    {{--                                        <i class="ki ki-bold-close icon-xs text-muted"></i>--}}
                                    {{--                                    </span>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}


                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" value="{{$course_edit->name}}"
                                               class="form-control form-control-solid form-control-lg"
                                               readonly/>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" value="{{$course_edit->email}}" name="email"
                                               class="form-control form-control-solid form-control-lg"
                                               readonly/>
                                    </div>


                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" value="{{$course_edit->phone}}"
                                               class="form-control form-control-solid form-control-lg"
                                               readonly/>
                                    </div>

                                    <div class="form-group">
                                        <label>Subjects</label>
                                        <input type="text" value="{{$course_edit->subjects}}"
                                               class="form-control form-control-solid form-control-lg"
                                               readonly/>
                                    </div>

                                    <div class="form-group">
                                        <label>Lesson Cost</label>
                                        <input type="number" value="{{$course_edit->lesson_cost}}"
                                               class="form-control form-control-solid form-control-lg"
                                               readonly/>
                                    </div>



                                    <div class="form-group">
                                        <label>Balance</label>
                                        <input type="number" value="{{$course_edit->balance}}"
                                               class="form-control form-control-solid form-control-lg"
                                               readonly/>
                                    </div>

                                </div>
                                <div class="col-xl-3"></div>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="d-flex justify-content-between border-top pt-10">
                                    <div class="mr-2">
                                    </div>
                                    <div>
                                        <a href="{{url('admin/course')}}" type="button"
                                           class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                           data-wizard-type="action-submit">Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection


