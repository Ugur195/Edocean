@extends('teacher.app')
@section('css')
@endsection

@section('content')
    <div class="d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">About Course</h5>
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-5">
                            <!--begin::Tab Content-->
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                <form  class="form" method="POST">
                                    {{csrf_field()}}
                                    <div class="col-xl-3"></div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                                 style="background-size:fill; background-position:center; background-image: url(assets/media/users/blank.png)">

                                                <div class="image-input-wrapper"
                                                     style="background-size:fill; background-position:center; background-image: url('data:image/jpeg;base64,{{base64_encode($course->image)}}')">
                                                </div>

                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$course->name}}" readonly/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Email</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$course->email}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$course->phone}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$course->subjects}}" readonly/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson Cost</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$course->lesson_cost}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Balance</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$course->balance}}" readonly/>
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
                                                    <a href="{{route('TeacherCourses')}}" type="button"
                                                       class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                       data-wizard-type="action-submit">Back
                                                    </a>
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

@endsection

