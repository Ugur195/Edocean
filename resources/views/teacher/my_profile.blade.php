@extends('teacher.app')


@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>

    <style>
        i {
            font-size: 20px;
        }
        .far {
            vertical-align: -2px;
        }
        .small {
            font-size: 13px;
        }
        textarea {
            overflow: hidden;
            padding: 10px;
            border: 1px solid #556677;
            min-height: 100px;
        }
        .row {
            align-items: center;
        }
        .col-sm4 {
            padding-left: 10px;
        }
        .form__item {
            padding-left: 60px;
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .likes {
            margin-top: 5px !important;
        }
        .status {
            margin-left: -200px;
        }
        .status svg {
            color: #ffd300;
        }
        .placeholder {
            height: 40px;
        }
        .fas {
            color: #ffd300;
        }
        .see_count {
            margin-top: 20px;
        }

    </style>
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
                            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">My Profile</h5>
                            <div
                                class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content pt-5">
                        <!--begin::Tab Content-->
                        <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                            <form class="form" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input name="id" class="form-control form-control-lg form-control-solid" hidden
                                       type="text"
                                       value="{{$teacher->id}}"/>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                    <div class="col-sm4">
                                        <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                             style="background-size:fill; background-position:center; background-image: url(assets/media/users/blank.png)">

                                            <div class="image-input-wrapper"
                                                 style="background-size:fill; background-position:center; background-image: url('data:image/jpeg;base64,{{base64_encode($teacher->image)}}')">
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


                                    <div class="form__item col-sm">
                                            <div class="placeholder" style="color: lightgray;">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span class="small">({{ $teacher->rating }})</span>

                                                <div class="overlay" style="position: relative;top: -22px;">

                                                    @while($teacher->rating>0)
                                                        @if($teacher->rating >0.5)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="fas fa-star-half"></i>
                                                        @endif
                                                        @php $teacher->rating--; @endphp
                                                    @endwhile

                                                </div>
                                            </div>

                                        <div class="likes">
                                            <span>{{ $teacher->likes }}</span>
                                            <i style="color: green; vertical-align: -5px; font-size:30px; padding-right: 20px;" class="la la-thumbs-up"></i>
                                            <span>{{ $teacher->dislike }}</span>
                                            <i style="color:red; vertical-align: -5px; font-size:30px; padding-right: 20px;" class="la la-thumbs-down"></i>
                                        </div>

                                        <div class="see_count">
                                            <span style="margin-right: 10px;">{{ $teacher->see_count }}</span>
                                            <svg style="width: 30px; margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3
                                                 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4
                                                 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 
                                                 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 
                                                 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4
                                                 .4c5.3 9.3 8.4 20.1 8.4 31.6z" fill="#14427C";/></svg>
                                        </div>
                                    </div>



                                    <div class="form__item col-sm">
                                        <div class="status">
                                            <xml version="1.0" encoding="iso-8859-1">
                                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg style="width: 60px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                                            <g>
                                                    <polygon points="214.05,182.273 175.855,291.388 137.651,182.273 110.174,182.273 162.15,327.186 163.072,329.729
                                                        188.629,329.729 239.727,187.41 241.553,182.273" fill="#E1A907"/>
                                                    <rect x="252.203" y="182.273" width="26.999" height="147.447" fill="#E1A907"/>
                                                    <path d="M396.544,207.275c-2.97-5.598-7.168-10.351-12.467-14.123c-5.171-3.661-11.324-6.434-18.278-8.235
                                                        c-6.775-1.749-14.199-2.637-22.05-2.637h-37.623v147.448h27v-55.202h5.803c8.576,0,16.7-1.067,24.149-3.174
                                                        c7.526-2.15,14.174-5.274,19.746-9.301c5.675-4.087,10.197-9.139,13.423-15.027c3.226-5.939,4.872-12.663,4.872-19.985
                                                        C401.118,219.597,399.565,212.95,396.544,207.275z M371.755,236.971c-1.579,2.935-3.874,5.504-6.827,7.612
                                                        c-3.046,2.176-6.724,3.84-10.948,4.975c-4.352,1.178-9.208,1.766-14.43,1.766h-6.426v-45.85h10.001
                                                        c4.446,0,8.721,0.435,12.723,1.297c3.772,0.785,7.074,2.091,9.847,3.866c2.628,1.715,4.727,3.874,6.204,6.46
                                                        c1.476,2.56,2.227,5.828,2.227,9.728C374.127,230.639,373.325,234.053,371.755,236.971z" fill="#E1A907"/>
                                                    <path d="M504.508,237.901l-59.981-59.981v-84.83c0-14.14-11.46-25.6-25.6-25.6h-84.838L274.108,7.51
                                                        C269.303,2.697,262.793,0.001,256,0.001s-13.303,2.697-18.099,7.501L177.92,67.482H93.082c-14.14,0-25.6,11.46-25.6,25.6v84.83
                                                        L7.501,237.893C-2.5,247.894-2.5,264.099,7.501,274.1l59.981,59.981v84.83c0,14.14,11.46,25.6,25.6,25.6h84.838l59.981,59.981
                                                        c4.796,4.813,11.307,7.509,18.099,7.509s13.303-2.697,18.099-7.501l59.981-59.981h84.838c14.14,0,25.6-11.46,25.6-25.6v-84.83
                                                        l59.981-59.981C514.5,264.107,514.5,247.894,504.508,237.901z M418.918,323.482v95.437h-95.437L256,486.401l-67.482-67.482H93.082
                                                        v-95.437L25.6,256.001l67.482-67.482V93.082h95.437L256,25.601l67.482,67.482h95.437v95.437l67.482,67.482L418.918,323.482z" fill="#E1A907"/>
                                                    <circle cx="256" cy="76.801" r="12.8" fill="#E1A907"/>
                                                    <circle cx="256" cy="435.201" r="12.8" fill="#E1A907"/>
                                                    <circle cx="129.28" cy="129.281" r="12.8" fill="#E1A907"/>
                                                    <circle cx="382.711" cy="382.712" r="12.8" fill="#E1A907"/>
                                                    <circle cx="382.711" cy="129.281" r="12.8" fill="#E1A907"/>
                                                    <circle cx="129.28" cy="382.712" r="12.8" fill="#E1A907"/>
                                                    <circle cx="435.2" cy="256.001" r="12.8" fill="#E1A907"/>
                                                    <circle cx="76.8" cy="256.001" r="12.8" fill="#E1A907"/>
                                            </g>
                                            </svg>

                                        </div>
                                    </div>
                                </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="name" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->name}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Surname</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="surname"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->surname}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Father Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="father_name"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->father_name}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher
                                            Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="teacher_address"
                                                   class="form-control form-control-lg form-control-solid"
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
                                                           @if($teacher->teaching_time=='1 hour') checked
                                                           @endif value="1 hour"/>
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Video
                                            Presentatiton</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="video_presentation"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->video_presentation}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control  form-control-solid" id="country"
                                                    name="country">
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
                                            <input name="phone" class="form-control form-control-lg form-control-solid"
                                                   type="text" id="tel"
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
                                            <input name="profile_title"
                                                   class="form-control form-control-lg form-control-solid"
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Education
                                            Place</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="education_place"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->education_place}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Speciality</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="speciality"
                                                   class="form-control form-control-lg form-control-solid"
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Certificate
                                            Image</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="ctf_image"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->ctf_image}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Work
                                            Experience</label>
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
                                            <input name="work_place"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->work_place}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Position</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="work_position"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->work_position}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Date</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="work_date"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->work_date}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects
                                            Category</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select name="subjects_category"
                                                    class="form-control form-control-lg form-control-solid custom-select"
                                                    placeholder="Select Subject" id="subject_category_id">
                                                <option value="0" disabled selected>Select Category</option>
                                                @foreach ($data as $categories)
                                                    <option @if($categories->id == $teacher->subjects_category) selected
                                                            @endif value="{{ $categories->id }}">
                                                        {{ ucfirst($categories->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select data-selected="{{$teacher->subjects}}"
                                                    class="form-control form-control-lg form-control-solid custom-select"
                                                    name="subjects" id="subjects">
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson
                                            Duration</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="lessons_duration"
                                                           @if($teacher->lessons_duration=='1 hour') checked
                                                           @endif value="1 hour"/>
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Lessons
                                            Intensivity</label>
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Students
                                            Amount</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="students_amount"
                                                           @if($teacher->students_amount=='alone') checked
                                                           @endif value="alone"/>
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
                                            <input name="lesson_price"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->lesson_price}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Balance</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="balance"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$teacher->balance}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Verified
                                            Status</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="verified_status"
                                                   class="form-control form-control-lg form-control-solid"
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
                                                    <a href="{{url('admin/teacher/index')}}" type="button"
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
    <script type="text/javascript" src="{{asset('backendCssJs/assets/countryes/countries.js')}}"></script>
    <script src="{{asset('js/maskinput.js')}}"></script>



    <script>
        //Subjects

        let selectedCategoryId = $('#subject_category_id').val();
        let selectedSubject = $('#subjects').data('selected');
        listSubjects(selectedCategoryId, selectedSubject);


        //Subjects
        $(document).ready(function () {
            $('#subject_category_id').on('change', function () {
                let id = $(this).val();
                let selected = $('#subjects').data('selected');
                listSubjects(id, selected)
            })
        })

        function listSubjects(categoryId, selected) {
            $('#subjects').empty();
            $('#subjects').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: 'GetSubCatTeachEdit/' + categoryId,
                success: function (response) {
                    var response = JSON.parse(response);
                    $('#subjects').empty();
                    $('#subjects').append(`<option value="0" disabled selected>Selected Subject</option>`);
                    response.forEach(element => {
                        let selectedAttribute = '';
                        if (selected == element['id']) selectedAttribute = 'selected';
                        $('#subjects').append(`<option ${selectedAttribute} value="${element['id']}">${element['name']}</option>`);
                    });
                }
            })
        }
    </script>

    <script>
        //Country and City
        populateCountries("country", "state");
        $('#country').val('{{$teacher->country}}').trigger('change')
        $('#state').val('{{$teacher->city}}').trigger('change')
    </script>

    <script>
        //Birthday
        $('#kt_datetimepicker_3').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    </script>


    <script type="text/javascript">
        //Phone
        jQuery(function ($) {
            $("#tel").mask("+994(88) 888-88-88");
        });
    </script>

@endsection




