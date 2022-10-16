@extends('student.app')


@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">My Profile</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                    <form class="form" method="POST">
                        {{csrf_field()}}
                        <input name="id" class="form-control form-control-lg form-control-solid" hidden type="text"
                               value="{{$student->id}}"/>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                     style="background-image: url(assets/media/users/blank.png)">

                                    <div class="image-input-wrapper"
                                         style="background-image: url('data:image/jpeg;base64,{{base64_encode($student->image)}}')">
                                    </div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="logo" id="file" accept=".png, .jpg, .jpeg"/>
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
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="name" class="form-control form-control-lg form-control-solid" type="text"
                                       value="{{$student->name}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Surname</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="surname" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->surname}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Father Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="father_name" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->father_name}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Birthday</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="birthday" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->birthday}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Birthday</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-solid date" id="kt_datetimepicker_3" data-target-input="nearest">
                                    <input type="text" name="birthday" class="form-control form-control-solid datetimepicker-input"  value="{{$student->birthday}}"
                                           data-target="#kt_datetimepicker_3"/>
                                    <div class="input-group-append" data-target="#kt_datetimepicker_3" data-toggle="datetimepicker">
                                        <span class="input-group-text"><i class="ki ki-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Gender</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="gender" @if($student->gender=='M') checked @endif value="M"/>
                                        <span></span>
                                        Male
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="gender"  @if($student->gender=='F') checked @endif value="F"/>
                                        <span></span>
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Language</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("Az", explode(',',$student->language)))
                                               checked="checked"
                                               @endif
                                               value="Az"/>
                                        <span></span>
                                        Az
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("En", explode(',',$student->language)))
                                               checked="checked"
                                               @endif
                                               value="En"/>
                                        <span></span>
                                        En
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("Ru", explode(',',$student->language)))
                                               checked="checked"
                                               @endif
                                               value="Ru"/>
                                        <span></span>
                                        Ru
                                    </label>

                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("Tr", explode(',',$student->language)))
                                               checked="checked"
                                               @endif
                                               value="Tr"/>
                                        <span></span>
                                        Tr
                                    </label>

                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("O", explode(',',$student->language)))
                                               checked="checked"
                                               @endif
                                               value="O"/>
                                        <span></span>
                                        Other
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Email</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="email" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->email}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="country" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->country}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="city" type="text"
                                       class="form-control form-control-lg form-control-solid"
                                       value="{{$student->city}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="phone" class="form-control form-control-lg form-control-solid" type="text"
                                       value="{{$student->phone}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Skype Id</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="skype_id" type="text"
                                       class="form-control form-control-lg form-control-solid"
                                       value="{{$student->skype_id}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Parent</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="parent" @if($student->parent=='Yes') checked @endif value="Yes"/>
                                        <span></span>
                                        Yes
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="parent"  @if($student->parent=='No') checked @endif value="No"/>
                                        <span></span>
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Education Level</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="education_level" @if($student->education_level=='Elementary') checked @endif value="Elemen"/>
                                        <span></span>
                                        Elementary
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="education_level"  @if($student->education_level=='Secondary') checked @endif value="Secondary"/>
                                        <span></span>
                                        Secondary
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="education_level"  @if($student->education_level=='Higher') checked @endif value="Higher"/>
                                        <span></span>
                                        Higher
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson Duration</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="lesson_duration" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->lesson_duration}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Lessons Intensivity</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="lessons_intensivity"
                                       class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->lessons_intensivity}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Address</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="address" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->address}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher Status</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="teacher_status" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->teacher_status}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher Gender</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="teacher_gender" @if($student->teacher_gender=='M') checked @endif value="M"/>
                                        <span></span>
                                        Male
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="teacher_gender"  @if($student->teacher_gender=='F') checked @endif value="F"/>
                                        <span></span>
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Students Amount</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="students_amount" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->students_amount}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Student Mission</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="student_mission" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->student_mission}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Payment</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="payment" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->payment}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Balance</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="balance" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->balance}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Verified Status</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="verified_status" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$student->verified_status}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="d-flex justify-content-between border-top pt-10">
                                    <div class="mr-2">
                                    </div>
                                    <div>
                                        <a href="{{url('admin/student/index')}}" type="button"
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

@endsection

@section('js')
@endsection



