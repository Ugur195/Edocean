@extends('teacher.app')


@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
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
                            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">About Student</h5>
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
                                    value="{{$student->id}}"/>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                            style="background-size:fill; background-position:center; background-image: url(assets/media/users/blank.png)">

                                            <div class="image-input-wrapper"
                                                style="background-size:fill; background-position:center; background-image: url('data:image/jpeg;base64,{{base64_encode($student->image)}}')">
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
                                        <input name="name" class="form-control form-control-lg form-control-solid" type="text"
                                            value="{{$student->name}}" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Surname</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="surname" class="form-control form-control-lg form-control-solid"
                                            type="text"
                                            value="{{$student->surname}}" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Father Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="father_name" class="form-control form-control-lg form-control-solid"
                                            type="text"
                                            value="{{$student->father_name}}" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Birthday</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="father_name" class="form-control form-control-lg form-control-solid"
                                            type="text"
                                            value="{{$student->birthday}}" readonly/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Gender</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="gender" @if($student->gender=='M') checked
                                                    @endif value="M" readonly/>
                                                <span></span>
                                                Male
                                            </label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="gender" @if($student->gender=='F') checked
                                                    @endif value="F" readonly/>
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
                                                    value="Az" readonly/>
                                                <span></span>
                                                Az
                                            </label>
                                            <label class="checkbox checkbox-primary">
                                                <input type="checkbox" name="langs[]"
                                                    @if(in_array("En", explode(',',$student->language)))
                                                    checked="checked"
                                                    @endif
                                                    value="En" readonly/>
                                                <span></span>
                                                En
                                            </label>
                                            <label class="checkbox checkbox-primary">
                                                <input type="checkbox" name="langs[]"
                                                    @if(in_array("Ru", explode(',',$student->language)))
                                                    checked="checked"
                                                    @endif
                                                    value="Ru" readonly/>
                                                <span></span>
                                                Ru
                                            </label>

                                            <label class="checkbox checkbox-primary">
                                                <input type="checkbox" name="langs[]"
                                                    @if(in_array("Tr", explode(',',$student->language)))
                                                    checked="checked"
                                                    @endif
                                                    value="Tr" readonly/>
                                                <span></span>
                                                Tr
                                            </label>

                                            <label class="checkbox checkbox-primary">
                                                <input type="checkbox" name="langs[]"
                                                    @if(in_array("O", explode(',',$student->language)))
                                                    checked="checked"
                                                    @endif
                                                    value="O" readonly/>
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
                                            value="{{$student->email}}" readonly/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control  form-control-solid" id="country" name="country">
                                            <option value="{{$student->country}}" readonly>Select a country</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control  form-control-solid" id="state" name="city">
                                            <option value="{{$student->city}}" readonly>Select a city</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="phone"  id="tel" class="form-control form-control-lg form-control-solid" type="text"
                                            value="{{$student->phone}}" readonly/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Skype Id</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="skype_id" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{$student->skype_id}}" readonly/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Parent</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="parent" @if($student->parent=='Yes') checked
                                                    @endif value="Yes" readonly/>
                                                <span></span>
                                                Yes
                                            </label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="parent" @if($student->parent=='No') checked
                                                    @endif value="No" readonly/>
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
                                                        @endif value="{{ $categories->id }}" readonly>
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
                                                name="subjects" id="subjects" readonly>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Education Level</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="education_level"
                                                    @if($student->education_level=='Elementary') checked
                                                    @endif value="Elemen" readonly/>
                                                <span></span>
                                                Elementary
                                            </label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="education_level"
                                                    @if($student->education_level=='Secondary') checked
                                                    @endif value="Secondary" readonly/>
                                                <span></span>
                                                Secondary
                                            </label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="education_level"
                                                    @if($student->education_level=='Higher') checked @endif value="Higher" readonly/>
                                                <span></span>
                                                Higher
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson Duration</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="lesson_duration"
                                                    @if($student->lesson_duration=='1 hour') checked @endif value="1 hour" readonly/>
                                                <span></span>
                                                1 hour
                                            </label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="lesson_duration"
                                                    @if($student->lesson_duration=='1 hour 30 min') checked
                                                    @endif value="1 hour 30 min" readonly/>
                                                <span></span>
                                                1 hour 30 min
                                            </label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="lesson_duration"
                                                    @if($student->lesson_duration=='2 hours') checked
                                                    @endif value="2 hours" readonly/>
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
                                                    @if($student->lessons_intensivity=='2 times per week') checked
                                                    @endif value="2 times per week" readonly/>
                                                <span></span>
                                                2 times per week
                                            </label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="lessons_intensivity"
                                                    @if($student->lessons_intensivity=='3 times per week') checked
                                                    @endif value="3 times per week" readonly/>
                                                <span></span>
                                                3 times per week
                                            </label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="lessons_intensivity"
                                                    @if($student->lessons_intensivity=='5 times per week') checked
                                                    @endif value="5 times per week" readonly/>
                                                <span></span>
                                                5 times per week
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="address" class="form-control form-control-lg form-control-solid"
                                            type="text"
                                            value="{{$student->address}}" readonly/>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher Status</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select name="teacher_status" class=" custom-select form-control  form-control-solid">
                                            <option disabled  selected>Open this select menu</option>
                                            <option value="primary education (I-IV)" readonly
                                                    @if($student->teacher_status=='primary education (I-IV)')selected @endif>
                                                primary education (I-IV)
                                            </option>
                                            <option value="general secondary education (V-IX)"
                                                    @if($student->teacher_status=='general secondary education (V-IX)') selected @endif>
                                                general secondary education (V-IX)
                                            </option>
                                            <option value="complete secondary education (X-XI)"
                                                    @if($student->teacher_status=='complete secondary education (X-XI)') selected @endif>
                                                complete secondary education (X-XI)
                                            </option>
                                            <option value="higher education (bachelors , masters , doctoral degrees)"
                                                    @if($student->teacher_status=='higher education (bachelors , masters , doctoral degrees)') selected @endif>
                                                higher education (bachelor's, master's, doctoral degrees)
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher Gender</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="teacher_gender"
                                                    @if($student->teacher_gender=='M') checked @endif value="M"/>
                                                <span></span>
                                                Male
                                            </label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="teacher_gender"
                                                    @if($student->teacher_gender=='F') checked @endif value="F"/>
                                                <span></span>
                                                Female
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
                                                    @if($student->students_amount=='Alone') checked @endif value="Alone"/>
                                                <span></span>
                                                Alone
                                            </label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="students_amount"
                                                    @if($student->students_amount=='In a group (3-4 people)') checked
                                                    @endif value="In a group (3-4 people)"/>
                                                <span></span>
                                                In a group (3-4 people)
                                            </label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="students_amount"
                                                    @if($student->students_amount=='In a group (5-7 people)') checked
                                                    @endif value="In a group (5-7 people)"/>
                                                <span></span>
                                                In a group (5-7 people)
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Student Mission</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="student_mission" class="form-control form-control-lg form-control-solid"
                                            type="text"
                                            value="{{$student->student_mission}}" readonly/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Payment</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="payment" class="form-control form-control-lg form-control-solid"
                                            type="text"
                                            value="{{$student->payment}}" readonly/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">Balance</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="balance" class="form-control form-control-lg form-control-solid"
                                            type="text"
                                            value="{{$student->balance}}" readonly/>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="d-flex justify-content-between border-top pt-10">
                                            <div class="mr-2">
                                            </div>
                                            <div>
                                                <a href="{{route('TeacherStudents')}}" type="button"
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
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
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
                url: 'GetSubCatStuEdit/' + categoryId,
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



