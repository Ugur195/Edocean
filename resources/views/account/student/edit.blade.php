@extends('account.student.app')


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
                                <form class="form" action="{{route('account.student.update',$student->id)}}"
                                      method="POST" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <input name="id" class="form-control form-control-lg form-control-solid" hidden
                                           type="text"
                                           value="{{$student->id}}"/>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                                 style="background-size:fill; background-position:center; background-image: url(assets/media/users/blank.png)">

                                                <div class="image-input-wrapper"
                                                     style="background-size:fill; background-position:center; background-image: url('data:image/jpeg;base64,{{base64_encode($student->image)}}')">
                                                </div>
                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="image" id="file"
                                                           accept=".png, .jpg, .jpeg"/>
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
                                            <input name="name" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{Auth::user()->name}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Surname</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="surname"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$student->surname}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Father Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="father_name"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$student->father_name}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Email</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="email" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{Auth::user()->email}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Birthday</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-solid date" id="kt_datetimepicker_3"
                                                 data-target-input="nearest">
                                                <input type="text" name="birthday"
                                                       class="form-control form-control-solid datetimepicker-input"
                                                       value="{{$student->birthday}}"
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
                                                    <input type="radio" name="gender"
                                                           @if($student->gender=='Kişi') checked
                                                           @endif value="Kişi"/>
                                                    <span></span>
                                                    Male
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="gender"
                                                           @if($student->gender=='Qadın') checked
                                                           @endif value="Qadın"/>
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control  form-control-solid" id="country"
                                                    name="country">
                                                <option value="{{$student->country}}">Select a country</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control  form-control-solid" id="state" name="city">
                                                <option value="{{$student->city}}">Select a city</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="phone" id="tel"
                                                   class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$student->phone}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Parent</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="parent"
                                                           @if($student->parent=='Var') checked
                                                           @endif value="Var"/>
                                                    <span></span>
                                                    Yes
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="parent"
                                                           @if($student->parent=='Yoxdu') checked
                                                           @endif value="Yoxdu"/>
                                                    <span></span>
                                                    No
                                                </label>
                                            </div>
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
                                                    <option @if($categories->id == $student->subjects_category) selected
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
                                            <select data-selected="{{$student->subjects}}"
                                                    class="form-control form-control-lg form-control-solid custom-select"
                                                    name="subjects" id="subjects">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Education
                                            Level</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="education_level"
                                                           @if($student->education_level=='İbtidai') checked
                                                           @endif value="İbtidai"/>
                                                    <span></span>
                                                    Elementary
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="education_level"
                                                           @if($student->education_level=='Orta') checked
                                                           @endif value="Orta"/>
                                                    <span></span>
                                                    Secondary
                                                </label>

                                                <label class="radio radio-primary">
                                                    <input type="radio" name="education_level"
                                                           @if($student->education_level=='Ali') checked
                                                           @endif value="Ali"/>
                                                    <span></span>
                                                    Higher
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson
                                            Duration</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="lesson_duration"
                                                           @if($student->lesson_duration=='1 saat') checked
                                                           @endif value="1 saat"/>
                                                    <span></span>
                                                    1 hour
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="lesson_duration"
                                                           @if($student->lesson_duration=='1 saat 30 dəqiqə') checked
                                                           @endif value="1 saat 30 dəqiqə"/>
                                                    <span></span>
                                                    1 hour 30 min
                                                </label>

                                                <label class="radio radio-primary">
                                                    <input type="radio" name="lesson_duration"
                                                           @if($student->lesson_duration=='2 saat') checked
                                                           @endif value="2 saat"/>
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
                                                           @if($student->lessons_intensivity=='həftədə 2 dəfə') checked
                                                           @endif value="həftədə 2 dəfə"/>
                                                    <span></span>
                                                    2 times per week
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="lessons_intensivity"
                                                           @if($student->lessons_intensivity=='həftədə 3 dəfə') checked
                                                           @endif value="həftədə 3 dəfə"/>
                                                    <span></span>
                                                    3 times per week
                                                </label>

                                                <label class="radio radio-primary">
                                                    <input type="radio" name="lessons_intensivity"
                                                           @if($student->lessons_intensivity=='həftədə 5 dəfə') checked
                                                           @endif value="həftədə 5 dəfə"/>
                                                    <span></span>
                                                    5 times per week
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="address"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$student->address}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher
                                            Status</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select name="teacher_status"
                                                    class=" custom-select form-control  form-control-solid">
                                                <option disabled selected>Open this select menu</option>
                                                <option value="Ibtidai təhsil (I-IV)"
                                                        @if($student->teacher_status=='Ibtidai təhsil (I-IV)')selected @endif>
                                                    primary education (I-IV)
                                                </option>
                                                <option value="Ümumi orta təhsil (V-IX)"
                                                        @if($student->teacher_status=='Ümumi orta təhsil (V-IX)') selected @endif>
                                                    general secondary education (V-IX)
                                                </option>
                                                <option value="Tam orta təhsil (X-XI)"
                                                        @if($student->teacher_status=='Tam orta təhsil (X-XI)') selected @endif>
                                                    complete secondary education (X-XI)
                                                </option>
                                                <option value="Ali təhsil (bakalavr, magistr, doktorantura)"
                                                        @if($student->teacher_status=='Ali təhsil (bakalavr, magistr, doktorantura)') selected @endif>
                                                    higher education (bachelor's, master's, doctoral degrees)
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher
                                            Gender</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="teacher_gender"
                                                           @if($student->teacher_gender=='Kişi') checked
                                                           @endif value="Kişi"/>
                                                    <span></span>
                                                    Male
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="teacher_gender"
                                                           @if($student->teacher_gender=='Qadın') checked
                                                           @endif value="Qadın"/>
                                                    <span></span>
                                                    Female
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
                                                           @if($student->students_amount=='Tək') checked
                                                           @endif value="Tək"/>
                                                    <span></span>
                                                    Alone
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="students_amount"
                                                           @if($student->students_amount=='Qrup şəklində (3-4 nəfər)') checked
                                                           @endif value="Qrup şəklində (3-4 nəfər)"/>
                                                    <span></span>
                                                    In a group (3-4 people)
                                                </label>

                                                <label class="radio radio-primary">
                                                    <input type="radio" name="students_amount"
                                                           @if($student->students_amount=='Qrup şəklində (5-7 nəfər)') checked
                                                           @endif value="Qrup şəklində (5-7 nəfər)"/>
                                                    <span></span>
                                                    In a group (5-7 people)
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Student
                                            Mission</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="student_mission"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$student->student_mission}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Payment</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="payment"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$student->payment}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="d-flex justify-content-between border-top pt-10">
                                                <div class="mr-2">
                                                </div>
                                                <div>
                                                    <a href="{{route('account.student.index')}}" type="button"
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
                url: '/account/student/category/' + categoryId + '/subjects',
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
        $('#country').val('{{$student->country}}').trigger('change')
        $('#state').val('{{$student->city}}').trigger('change')
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



