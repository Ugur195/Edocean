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
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="certificate"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->certificate}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">MMC</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="mmc" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->mmc}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="address"
                                                   class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$course->address}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Email</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="email" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->email}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="phone" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->phone}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Skype Id</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="skype_id" type="text"
                                                   class="form-control form-control-lg form-control-solid"
                                                   value="{{$course->skype_id}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Profile Title</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="profile_title" type="text"
                                                   class="form-control form-control-lg form-control-solid"
                                                   value="{{$course->profile_title}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">About Course</label>
                                        <div class="col-lg-9 col-xl-6">
                                        <textarea rows='1' name="about_course" type="text"
                                                  class="form-control form-control-lg form-control-solid"
                                                  value="{{$course->about_course}}">{{ $course->about_course }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects
                                            Category</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control formselect required"
                                                    placeholder="Select Subject" id="subject_category_id">
                                                <option value="0" disabled selected>Select Category</option>
                                                @foreach ($data as $categories)
                                                    <option value="{{ $categories->id }}">
                                                        {{ ucfirst($categories->name) }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="browser-default custom-select" name="subcategory"
                                                    id="subcategory">
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
                                                   type="text"
                                                   value="{{$course->lesson_cost}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Balance</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="balance"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->balance}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Rating</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="rating" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->rating}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">likes</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="likes" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->likes}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">dislike</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="dislike"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->dislike}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">see_count</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="see_count"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->see_count}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Course Type</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="course_type"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->course_type}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Language</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="language"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->language}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Lessons
                                            Duration</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="lessons_duration"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->lessons_duration}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Lessons
                                            Intensivity</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="lessons_intensivity"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->lessons_intensivity}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Students
                                            Amount</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="students_amount"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->students_amount}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Slug</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="slug" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->slug}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="country"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->country}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="city" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->city}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Verified
                                            Status</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="verified_status"
                                                   class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->verified_status}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Status</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="status" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$course->status}}"/>
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
    <script>
        const textarea = document.querySelector('textarea');

        textarea.addEventListener('input', autosize);

        function autosize() {
            this.style.height = 'auto';
            let applyNow = this.style.offsetHeight;
            this.style.height = this.scrollHeight - 20 + 'px';
        }


        //Subjects
        $(document).ready(function () {
            $('#subject_category_id').on('change', function () {
                let id = $(this).val();
                $('#subcategory').empty();
                $('#subcategory').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                    type: 'GET',
                    url: 'GetSubCatEdit/' + id,
                    success: function (response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#subcategory').empty();
                        $('#subcategory').append(`<option value="0" disabled selected>Selected Subject</option>`);
                        response.forEach(element => {
                            $('#subcategory').append(`<option value="${element['id']}">${element['name']}</option>`);
                        });
                    }
                })
            })
        })

    </script>
@endsection
