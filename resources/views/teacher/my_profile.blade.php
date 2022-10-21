@extends('teacher.app')


@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">My Teacher Profile</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                    <form class="form" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="id" class="form-control form-control-lg form-control-solid" hidden type="text"
                               value="{{$teacher->id}}"/>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                     style="background-image: url(assets/media/users/blank.png)">

                                    <div class="image-input-wrapper"
                                         style="background-image: url('data:image/jpeg;base64,{{base64_encode($teacher->image)}}')">
                                    </div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="image" id="file" accept=".png, .jpg, .jpeg"/>
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
                                       value="{{$teacher->name}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Surname</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="surname" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->surname}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Father Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="father_name" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->father_name}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher Address</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="teacher_address" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->teacher_address}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Email</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="email" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->email}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Birthday</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-solid date" id="kt_datetimepicker_3"
                                     data-target-input="nearest">
                                    <input type="text" name="birthday"
                                           class="form-control form-control-solid datetimepicker-input"
                                           value="{{$teacher->birthday}}"
                                           data-target="#kt_datetimepicker_3"/>
                                    <div class="input-group-append" data-target="#kt_datetimepicker_3"
                                         data-toggle="datetimepicker">
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
                                        <input type="radio" name="gender" @if($teacher->gender=='M') checked
                                               @endif value="M"/>
                                        <span></span>
                                        Male
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="gender" @if($teacher->gender=='F') checked
                                               @endif value="F"/>
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
                                               @if(in_array("Az", explode(',',$teacher->language)))
                                               checked="checked"
                                               @endif
                                               value="Az"/>
                                        <span></span>
                                        Az
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("En", explode(',',$teacher->language)))
                                               checked="checked"
                                               @endif
                                               value="En"/>
                                        <span></span>
                                        En
                                    </label>
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("Ru", explode(',',$teacher->language)))
                                               checked="checked"
                                               @endif
                                               value="Ru"/>
                                        <span></span>
                                        Ru
                                    </label>

                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("Tr", explode(',',$teacher->language)))
                                               checked="checked"
                                               @endif
                                               value="Tr"/>
                                        <span></span>
                                        Tr
                                    </label>

                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="langs[]"
                                               @if(in_array("O", explode(',',$teacher->language)))
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
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Teaching Time</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="teaching_time"
                                               @if($teacher->teaching_time=='1 hour') checked @endif value="1 hour"/>
                                        <span></span>
                                        1 hour
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="teaching_time"
                                               @if($teacher->teaching_time=='1 hour 30 min') checked
                                               @endif value="1 hour 30 min"/>
                                        <span></span>
                                        1 hour 30 min
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="teaching_time"
                                               @if($teacher->teaching_time=='2 hours') checked
                                               @endif value="2 hours"/>
                                        <span></span>
                                        2 hours
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Demo Lesson</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="demo_lesson"
                                               @if($teacher->demo_lesson=='No') checked
                                               @endif value="No"/>
                                        <span></span>
                                        No
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="demo_lesson"
                                               @if($teacher->demo_lesson=='Yes') checked
                                               @endif value="Yes"/>
                                        <span></span>
                                        Yes
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Video Presentatiton</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="video_presentation" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->video_presentation}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control  form-control-solid" id="country" name="country">
                                    <option value="{{$teacher->country}}">Select a country</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control  form-control-solid" id="state" name="city">
                                    <option value="{{$teacher->city}}">Select a city</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="phone" class="form-control form-control-lg form-control-solid" type="text"
                                       value="{{$teacher->phone}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Skype Id</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="skype_id" type="text"
                                       class="form-control form-control-lg form-control-solid"
                                       value="{{$teacher->skype_id}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Profile Title</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="profile_title" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->profile_title}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">About Teacher</label>
                            <div class="col-lg-9 col-xl-6">
                                 <textarea name="about_teacher" class="form-control form-control-lg form-control-solid"
                                           cols="30"
                                           rows="5">{{$teacher->about_teacher}}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Education Place</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="education_place" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->education_place}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Speciality</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="speciality" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->speciality}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Degree</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="degree" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->degree}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Certificate</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="certificate"
                                               @if($teacher->certificate=='No') checked
                                               @endif value="No"/>
                                        <span></span>
                                        No
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="certificate"
                                               @if($teacher->certificate=='Yes') checked
                                               @endif value="Yes"/>
                                        <span></span>
                                        Yes
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Certificate Image</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="ctf_image" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->ctf_image}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Experience</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="work_experience"
                                               @if($teacher->work_experience== 'dont have') checked
                                               @endif value="dont have"/>
                                        <span></span>
                                        Don't have
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="work_experience"
                                               @if($teacher->work_experience=='1 year') checked
                                               @endif value="1 year"/>
                                        <span></span>
                                        1 year
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="work_experience"
                                               @if($teacher->work_experience=='3-5 years') checked
                                               @endif value="3-5 years"/>
                                        <span></span>
                                        3-5 years
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="work_experience"
                                               @if($teacher->work_experience=='over 10 years') checked
                                               @endif value="over 10 years"/>
                                        <span></span>
                                        over 10 years
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Place</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="work_place" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->work_place}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Position</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="work_position" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->work_position}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Date</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="work_date" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->work_date}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Subject</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="subjects" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->subjects}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects Category</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="subjects_category" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->subjects_category}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson Duration</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="lessons_duration"
                                               @if($teacher->lessons_duration=='1 hour') checked @endif value="1 hour"/>
                                        <span></span>
                                        1 hour
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="lessons_duration"
                                               @if($teacher->lessons_duration=='1 hour 30 min') checked
                                               @endif value="1 hour 30 min"/>
                                        <span></span>
                                        1 hour 30 min
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="lessons_duration"
                                               @if($teacher->lessons_duration=='2 hours') checked
                                               @endif value="2 hours"/>
                                        <span></span>
                                        2 hours
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Lessons Intensivity</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="lessons_intensivity"
                                               @if($teacher->lessons_intensivity=='2 times per week') checked
                                               @endif value="2 times per week"/>
                                        <span></span>
                                        2 times per week
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="lessons_intensivity"
                                               @if($teacher->lessons_intensivity=='3 times per week') checked
                                               @endif value="3 times per week"/>
                                        <span></span>
                                        3 times per week
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="lessons_intensivity"
                                               @if($teacher->lessons_intensivity=='5 times per week') checked
                                               @endif value="5 times per week"/>
                                        <span></span>
                                        5 times per week
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Student Level</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="student_level"
                                               @if($teacher->student_level=='Beginner') checked
                                               @endif value="Beginner"/>
                                        <span></span>
                                        Beginner
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="student_level"
                                               @if($teacher->student_level=='Elementary') checked
                                               @endif value="Elementary"/>
                                        <span></span>
                                        Elementary
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="student_level"
                                               @if($teacher->student_level=='Intermediate') checked
                                               @endif value="Intermediate"/>
                                        <span></span>
                                        Intermediate
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Students Amount</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="students_amount"
                                               @if($teacher->students_amount=='alone') checked @endif value="alone"/>
                                        <span></span>
                                        alone
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="students_amount"
                                               @if($teacher->students_amount=='In a group (3-4 people)') checked
                                               @endif value="In a group (3-4 people)"/>
                                        <span></span>
                                        In a group (3-4 people)
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="students_amount"
                                               @if($teacher->students_amount=='In a group (5-7 people)') checked
                                               @endif value="In a group (5-7 people)"/>
                                        <span></span>
                                        In a group (5-7 people)
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Profile Type</label>
                            <div class="col-9 col-form-label">
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="profile_type"
                                               @if($teacher->profile_type=='Basic') checked
                                               @endif value="Basic"/>
                                        <span></span>
                                        Basic
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="profile_type"
                                               @if($teacher->profile_type=='Standard') checked
                                               @endif value="Standard"/>
                                        <span></span>
                                        Standard
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="profile_type"
                                               @if($teacher->profile_type=='Premium') checked
                                               @endif value="Premium"/>
                                        <span></span>
                                        Premium
                                    </label>

                                    <label class="radio radio-primary">
                                        <input type="radio" name="profile_type"
                                               @if($teacher->profile_type=='Vip') checked
                                               @endif value="Vip"/>
                                        <span></span>
                                        Vip
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson Price</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="lesson_price" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->lesson_price}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Balance</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="balance" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->balance}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Verified Status</label>
                            <div class="col-lg-9 col-xl-6">
                                <input name="verified_status" class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       value="{{$teacher->verified_status}}"/>
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
    <script type="text/javascript" src="{{asset('backendCssJs/assets/countryes/countries.js')}}"></script>

    <script>
        populateCountries("country", "state");
        $('#country').val('{{$teacher->country}}').trigger('change')
        $('#state').val('{{$teacher->city}}').trigger('change')
    </script>

    <script src="{{asset('backendCssJs/assets/js/pages/custom/contacts/edit-contact.js')}}"></script>
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script>
        $('#kt_datetimepicker_3').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    </script>
@endsection




