@extends('course.app')


@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
    <style>
        textarea {
            overflow: hidden;
            padding: 10px;
            border: 1px solid #556677;
            min-height: 100px;
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
                                           value="{{$course->id}}"/>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                                 style="background-image: url(assets/media/users/blank.png)">

                                                <div class="image-input-wrapper"
                                                     style="background-image: url('data:image/jpeg;base64,{{base64_encode($course->image)}}')">
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
                                            <input name="name" class="form-control form-control-lg form-control-solid"
                                                   type="text" placeholder="Course name"
                                                   value="{{$course->name}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Video
                                            Presentation</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="video_presentation"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->video_presentation}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Certificate</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="certificate"
                                                        @if($course->teacher_gender=='Yes') checked @endif value="Yes"/>
                                                    <span></span>
                                                    Yes
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="certificate"
                                                        @if($course->certificate=='No') checked @endif value="No"/>
                                                    <span></span>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">MMC</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="mmc" class="form-control form-control-lg form-control-solid"
                                                   type="text" placeholder="Course MMC"
                                                   value="{{$course->mmc}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="address" placeholder="Course Address"
                                                   class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$course->address}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Email</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="email" class="form-control form-control-lg form-control-solid"
                                                   type="text" placeholder="Course Email"
                                                   value="{{$course->email}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="phone" class="form-control form-control-lg form-control-solid"
                                                   type="text" id="tel"
                                                   value="{{$course->phone}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Skype Id</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="skype_id" type="text"
                                                   class="form-control form-control-lg form-control-solid" placeholder="Course Skype login"
                                                   value="{{$course->skype_id}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Profile Title</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="profile_title" type="text"
                                                   class="form-control form-control-lg form-control-solid" placeholder="Course profile name"
                                                   value="{{$course->profile_title}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">About Course</label>
                                        <div class="col-lg-9 col-xl-6">
                                        <textarea rows='1' name="about_course" type="text"
                                                  class="form-control form-control-lg form-control-solid" placeholder="Write a short description of the course"
                                                  value="{{$course->about_course}}">{{ $course->about_course }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects Category</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select name="subjects_category" class="form-control form-control-lg form-control-solid custom-select"
                                                    placeholder="Select Subject" id="subject_category_id">
                                                <option value="0" disabled selected>Select Category</option>
                                                @foreach ($data as $categories)
                                                    <option @if($categories->id == $course->subjects_category) selected @endif value="{{ $categories->id }}">
                                                        {{ ucfirst($categories->name) }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select data-selected="{{$course->subjects}}" class="form-control form-control-lg form-control-solid custom-select" name="subjects"
                                                    id="subjects">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Demo Lesson</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="demo_lesson"
                                                           @if($course->demo_lesson=='Yes') checked
                                                           @endif value="Yes"/>
                                                    <span></span>
                                                    Yes
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="demo_lesson"
                                                           @if($course->demo_lesson=='No') checked
                                                           @endif value="No"/>
                                                    <span></span>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson Cost</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="lesson_cost"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="number" placeholder="Enter the price in ₼"
                                                   value="{{$course->lesson_cost}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Balance</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="balance"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="number" placeholder="Course balance in ₼"
                                                   value="{{$course->balance}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Rating</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="rating" class="form-control form-control-lg form-control-solid"
                                                   type="number" placeholder="Course rating"
                                                   value="{{$course->rating}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">likes</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="likes" class="form-control form-control-lg form-control-solid"
                                                   type="number" placeholder="Course likes"
                                                   value="{{$course->likes}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">dislike</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="dislike"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="number" placeholder="Course dislikes"
                                                   value="{{$course->dislike}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">see_count</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="see_count"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="number" placeholder="Course count"
                                                   value="{{$course->see_count}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Course Type</label>
                                        <div class="col-9 col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="course_type"
                                                           @if($course->course_type=='Basic') checked
                                                           @endif value="Basic"/>
                                                    <span></span>
                                                    Basic
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="course_type"
                                                           @if($course->course_type=='Standart') checked
                                                           @endif value="Standart"/>
                                                    <span></span>
                                                    Standart
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="course_type"
                                                           @if($course->course_type=='Premium') checked
                                                           @endif value="Premium"/>
                                                    <span></span>
                                                    Premium
                                                </label>
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="course_type"
                                                           @if($course->course_type=='VIP') checked
                                                           @endif value="VIP"/>
                                                    <span></span>
                                                    VIP
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Language</label>
                                        <div class="col-9 col-form-label">
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-primary">
                                                    <input type="checkbox" name="language[]"
                                                        @if(in_array("Az", explode(',',$course->language)))
                                                        checked="checked"
                                                        @endif
                                                        value="Az"/>
                                                    <span></span>
                                                    Az
                                                </label>
                                                <label class="checkbox checkbox-primary">
                                                    <input type="checkbox" name="language[]"
                                                        @if(in_array("En", explode(',',$course->language)))
                                                        checked="checked"
                                                        @endif
                                                        value="En"/>
                                                    <span></span>
                                                    En
                                                </label>
                                                <label class="checkbox checkbox-primary">
                                                    <input type="checkbox" name="language[]"
                                                        @if(in_array("Ru", explode(',',$course->language)))
                                                        checked="checked"
                                                        @endif
                                                        value="Ru"/>
                                                    <span></span>
                                                    Ru
                                                </label>

                                                <label class="checkbox checkbox-primary">
                                                    <input type="checkbox" name="language[]"
                                                        @if(in_array("Tr", explode(',',$course->language)))
                                                        checked="checked"
                                                        @endif
                                                        value="Tr"/>
                                                    <span></span>
                                                    Tr
                                                </label>

                                                <label class="checkbox checkbox-primary">
                                                    <input type="checkbox" name="language[]"
                                                        @if(in_array("O", explode(',',$course->language)))
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Lessons
                                            Duration</label>
                                            <div class="col-9 col-form-label">
                                                <div class="radio-inline">
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="lessons_duration"
                                                            @if($course->lessons_duration=='1 hour') checked @endif value="1 hour"/>
                                                        <span></span>
                                                        1 hour
                                                    </label>
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="lessons_duration"
                                                            @if($course->lessons_duration=='1 hour 30 min') checked
                                                            @endif value="1 hour 30 min"/>
                                                        <span></span>
                                                        1 hour 30 min
                                                    </label>
        
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="lessons_duration"
                                                            @if($course->lessons_duration=='2 hours') checked
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
                                                            @if($course->lessons_intensivity=='2 times per week') checked
                                                            @endif value="2 times per week"/>
                                                        <span></span>
                                                        2 times per week
                                                    </label>
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="lessons_intensivity"
                                                            @if($course->lessons_intensivity=='3 times per week') checked
                                                            @endif value="3 times per week"/>
                                                        <span></span>
                                                        3 times per week
                                                    </label>
        
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="lessons_intensivity"
                                                            @if($course->lessons_intensivity=='5 times per week') checked
                                                            @endif value="5 times per week"/>
                                                        <span></span>
                                                        5 times per week
                                                    </label>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Courses
                                            Amount</label>
                                            <div class="col-9 col-form-label">
                                                <div class="radio-inline">
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="students_amount"
                                                            @if($course->students_amount=='Alone') checked @endif value="Alone"/>
                                                        <span></span>
                                                        Alone
                                                    </label>
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="students_amount"
                                                            @if($course->students_amount=='In a group (3-4 people)') checked
                                                            @endif value="In a group (3-4 people)"/>
                                                        <span></span>
                                                        In a group (3-4 people)
                                                    </label>
        
                                                    <label class="radio radio-primary">
                                                        <input type="radio" name="students_amount"
                                                            @if($course->students_amount=='In a group (5-7 people)') checked
                                                            @endif value="In a group (5-7 people)"/>
                                                        <span></span>
                                                        In a group (5-7 people)
                                                    </label>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control  form-control-solid" id="country" name="country">
                                                <option value="{{$course->country}}">Select a country</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control  form-control-solid" id="state" name="city">
                                                <option value="{{$course->city}}">Select a city</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Verified
                                            Status</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="verified_status"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="number"
                                                   value="{{$course->verified_status}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="d-flex justify-content-between border-top pt-10">
                                                <div class="mr-2">
                                                </div>
                                                <div>
                                                    <a href="{{url('admin/course/index')}}" type="button"
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
    <script type="text/javascript" src="{{asset('backendCssJs/assets/countryes/countries.js')}}"></script>
    <script src="{{asset('js/maskinput.js')}}"></script>
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>

    <script>
        const textarea = document.querySelector('textarea');

        textarea.addEventListener('input', autosize);

        function autosize() {
            this.style.height = 'auto';
            let applyNow = this.style.offsetHeight;
            this.style.height = this.scrollHeight - 20 + 'px';
        }

        let selectedCategoryId = $('#subject_category_id').val();
        let selectedSubject = $('#subjects').data('selected');
        listSubjects(selectedCategoryId, selectedSubject)

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
                url: 'GetSubCatEdit/' + categoryId,
                success: function (response) {
                    var response = JSON.parse(response);
                    $('#subjects').empty();
                    $('#subjects').append(`<option value="0" disabled selected>Selected Subject</option>`);
                    response.forEach(element => {
                        let selectedAttribute = '';
                        if(selected == element['id']) selectedAttribute = 'selected';
                        $('#subjects').append(`<option ${selectedAttribute} value="${element['id']}">${element['name']}</option>`);
                    });
                }
            })
        }
    </script>
    
    {{-- Phone --}}
    <script type="text/javascript">
        jQuery(function($){
        $("#tel").mask("+994(88) 888-88-88");
        });
    </script>


    <script>
        populateCountries("country", "state");
        $('#country').val('{{$course->country}}').trigger('change')
        $('#state').val('{{$course->city}}').trigger('change')
    </script>

@endsection
