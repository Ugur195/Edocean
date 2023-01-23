@extends('account.teacher.app')

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
                                    <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                        <span class="nav-icon">
															<span class="svg-icon">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path
                                                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            opacity="0.3"/>
																		<path
                                                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                                            fill="#000000" fill-rule="nonzero"/>
																	</g>
																</svg>
															</span>
														</span>
                                        <span class="nav-text font-size-lg">Account</span>
                                    </a>
                                </li>


                                <li class="nav-item mr-3">
                                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
															<span class="nav-icon mr-2">
																	<span class="svg-icon mr-3">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path
                                                                                    d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z"
                                                                                    fill="#000000" fill-rule="nonzero"
                                                                                    opacity="0.3"/>
																				<path
                                                                                    d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z"
                                                                                    fill="#000000"/>
																			</g>
																		</svg>
																	</span>
																</span>
                                        <span class="nav-text font-size-lg">Contacts</span>
                                    </a>
                                </li>



                                <li class="nav-item mr-3">
                                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
													<span class="nav-icon mr-2">
															<span class="svg-icon mr-3">
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                                                            fill="#000000" fill-rule="nonzero"/>
																		<circle fill="#000000" opacity="0.3" cx="12"
                                                                                cy="10" r="6"/>
																	</g>
																</svg>
															</span>
														</span>
                                        <span class="nav-text font-size-lg">Education</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{route('account.teacher.update',$teacher->id)}}"
                              method="POST" enctype="multipart/form-data" id="kt_form">
                            @method('put')
                            @csrf
                            <div class="tab-content">
{{--                                about me--}}
                                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-7 my-2">
                                            <div class="row">
                                                <label class="col-3"></label>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-form-label col-3 text-lg-right text-left">Image</label>
                                                <div class="col-9">
                                                    <div class="image-input image-input-empty image-input-outline"
                                                         id="kt_user_edit_avatar"
                                                         style="background-image: url(assets/media/users/blank.png)">

                                                        <div class="image-input-wrapper"
                                                             style="background-size:fill; background-position:center; background-image: url('data:image/jpeg;base64,{{base64_encode($teacher->image)}}')">
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
                                                            data-action="cancel" data-toggle="tooltip"
                                                            title="Cancel avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="remove" data-toggle="tooltip"
                                                            title="Remove avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Video
                                                    Presentatiton</label>
                                                <div class="col-lg-9 ">
                                                    <input name="video_presentation"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->video_presentation}}"/>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">First
                                                    Name</label>
                                                <div class="col-9">
                                                    <input name="name"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text" value="{{Auth::user()->name}}"/>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Last
                                                    Name</label>
                                                <div class="col-9">
                                                    <input name="surname"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text" value="{{$teacher->surname}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Father
                                                    Name</label>
                                                <div class="col-9">
                                                    <input name="father_name"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text" value="{{$teacher->father_name}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Birthday</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-solid date"
                                                         id="kt_datetimepicker_3"
                                                         data-target-input="nearest">
                                                        <input type="text" name="birthday"
                                                               class="form-control form-control-solid datetimepicker-input"
                                                               value="{{$teacher->birthday}}"
                                                               data-target="#kt_datetimepicker_3"/>
                                                        <div class="input-group-append"
                                                             data-target="#kt_datetimepicker_3"
                                                             data-toggle="datetimepicker">
                                                            <span class="input-group-text"><i
                                                                    class="ki ki-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Gender</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="gender"
                                                                   @if($teacher->gender=='Kişi') checked
                                                                   @endif value="Kişi"/>
                                                            <span></span>
                                                            Kişi
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="gender"
                                                                   @if($teacher->gender=='Qadın') checked
                                                                   @endif value="Qadın"/>
                                                            <span></span>
                                                            Qadın
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">About
                                                    Teacher</label>
                                                <div class="col-lg-9 ">
                                                  <textarea name="about_teacher"
                                                            class="form-control form-control-lg form-control-solid"
                                                            cols="30"
                                                            rows="5">{{$teacher->about_teacher}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Speciality</label>
                                                <div class="col-lg-9">
                                                    <input name="speciality"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->speciality}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Degree</label>
                                                <div class="col-lg-9">
                                                    <input name="degree"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->degree}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Subjects
                                                    Category</label>
                                                <div class="col-lg-9">
                                                    <select name="subjects_category"
                                                            class="form-control form-control-lg form-control-solid custom-select"
                                                            placeholder="Select Subject" id="subject_category_id">
                                                        <option value="0" disabled selected>Select Category</option>
                                                        @foreach ($data as $categories)
                                                            <option
                                                                @if($categories->id == $teacher->subjects_category) selected
                                                                @endif value="{{$categories->id}}">
                                                                {{ucfirst($categories->name)}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-3 col-lg-3 text-right col-form-label">Subjects</label>
                                                <div class="col-lg-9">
                                                    <select data-selected="{{$teacher->subjects}}"
                                                            class="form-control form-control-lg form-control-solid custom-select"
                                                            name="subjects" id="subjects">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Lesson
                                                    Price</label>
                                                <div class="col-lg-9 ">
                                                    <input name="lesson_price"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->lesson_price}}"/>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                {{--contact--}}
                                <div class="tab-pane" id="kt_user_edit_tab_2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-7 my-2">

                                            <div class="row">
                                                <label class="col-3"></label>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control  form-control-solid" id="country"
                                                            name="country">
                                                        <option value="{{$teacher->country}}">Select a country</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control  form-control-solid" id="state" name="city">
                                                        <option value="{{$teacher->city}}">Select a city</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Phone</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="phone"
                                                               class="form-control form-control-lg form-control-solid"
                                                               value="{{$teacher->phone}}" placeholder="Phone"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Email</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text">
                                                                <i class="la la-at"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="email"
                                                               class="form-control form-control-lg form-control-solid"
                                                               value="{{Auth::user()->email}}" placeholder="Email"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Whatsapp</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text">
                                                                <i class="la la-whatsapp"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="whatsapp"
                                                               class="form-control form-control-lg form-control-solid"
                                                               value="{{$teacher->whatsapp}}" placeholder="Whatsapp"/>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Facebook</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text">
                                                                <i class="la la-facebook"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="facebook"
                                                               class="form-control form-control-lg form-control-solid"
                                                               value="{{$teacher->facebook}}" placeholder="Facebook"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left">Instagram</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text">
                                                                <i class="la la-instagram"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="instagram"
                                                               class="form-control form-control-lg form-control-solid"
                                                               value="{{$teacher->instagram}}" placeholder="Instagram"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Teacher
                                                    Address</label>
                                                <div class="col-lg-9">
                                                    <input name="teacher_address"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->teacher_address}}"/>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

{{--education--}}
                                <div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-7 my-2">
                                            <div class="row">
                                                <label class="col-3"></label>
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
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Certificate</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="certificate"
                                                                   @if($teacher->certificate=='Yoxdu') checked
                                                                   @endif value="Yoxdu"/>
                                                            <span></span>
                                                            No
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="certificate"
                                                                   @if($teacher->certificate=='Var') checked
                                                                   @endif value="Var"/>
                                                            <span></span>
                                                            Yes
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Certificate
                                                    Image</label>
                                                <div class="col-lg-9 ">
                                                    <input name="ctf_image"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->ctf_image}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Education
                                                    Place</label>
                                                <div class="col-lg-9 ">
                                                    <input name="education_place"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->education_place}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Work
                                                    Experience</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="work_experience"
                                                                   @if($teacher->work_experience== 'Yoxdu') checked
                                                                   @endif value="Yoxdu"/>
                                                            <span></span>
                                                            Don't have
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="work_experience"
                                                                   @if($teacher->work_experience=='1 il') checked
                                                                   @endif value="1 il"/>
                                                            <span></span>
                                                            1 year
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="work_experience"
                                                                   @if($teacher->work_experience=='3-5 il') checked
                                                                   @endif value="3-5 il"/>
                                                            <span></span>
                                                            3-5 years
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="work_experience"
                                                                   @if($teacher->work_experience=='10 ildən çox') checked
                                                                   @endif value="10 ildən çox"/>
                                                            <span></span>
                                                            over 10 years
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Place</label>
                                                <div class="col-lg-9">
                                                    <input name="work_place"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->work_place}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Position</label>
                                                <div class="col-lg-9 ">
                                                    <input name="work_position"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->work_position}}"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Work Date</label>
                                                <div class="col-lg-9">
                                                    <input name="work_date"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text"
                                                           value="{{$teacher->work_date}}"/>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 text-right col-form-label">Student Level</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="student_level"
                                                                   @if($teacher->student_level=='Ibditai') checked
                                                                   @endif value="Ibditai"/>
                                                            <span></span>
                                                            Beginner
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="student_level"
                                                                   @if($teacher->student_level=='Orta') checked
                                                                   @endif value="Orta"/>
                                                            <span></span>
                                                            Elementary
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="student_level"
                                                                   @if($teacher->student_level=='Ela') checked
                                                                   @endif value="Ela"/>
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
                                                                   @if($teacher->students_amount=='tək') checked
                                                                   @endif value="tək"/>
                                                            <span></span>
                                                            alone
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="students_amount"
                                                                   @if($teacher->students_amount=='Qrup şəklində (3-4 nəfər)') checked
                                                                   @endif value="Qrup şəklində (3-4 nəfər)"/>
                                                            <span></span>
                                                            In a group (3-4 people)
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="students_amount"
                                                                   @if($teacher->students_amount=='Qrup şəklində (5-7 nəfər)') checked
                                                                   @endif value="Qrup şəklində (5-7 nəfər)"/>
                                                            <span></span>
                                                            In a group (5-7 people)
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
                                                            <input type="radio" name="lessons_duration"
                                                                   @if($teacher->lessons_duration=='1 saat') checked
                                                                   @endif value="1 saat"/>
                                                            <span></span>
                                                            1 hour
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="lessons_duration"
                                                                   @if($teacher->lessons_duration=='1 saat 30 dəqiqə') checked
                                                                   @endif value="1 saat 30 dəqiqə"/>
                                                            <span></span>
                                                            1 hour 30 min
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="lessons_duration"
                                                                   @if($teacher->lessons_duration=='2 saat') checked
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
                                                                   @if($teacher->lessons_intensivity=='həftədə 2 dəfə') checked
                                                                   @endif value="həftədə 2 dəfə"/>
                                                            <span></span>
                                                            2 times per week
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="lessons_intensivity"
                                                                   @if($teacher->lessons_intensivity=='həftədə 3 dəfə') checked
                                                                   @endif value="həftədə 3 dəfə"/>
                                                            <span></span>
                                                            3 times per week
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="lessons_intensivity"
                                                                   @if($teacher->lessons_intensivity=='həftədə 5 dəfə') checked
                                                                   @endif value="həftədə 5 dəfə"/>
                                                            <span></span>
                                                            5 times per week
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
                                                                   @if($teacher->teaching_time=='1 saat') checked
                                                                   @endif value="1 saat"/>
                                                            <span></span>
                                                            1 hour
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="teaching_time"
                                                                   @if($teacher->teaching_time=='1 saat 30 dəqiqə') checked
                                                                   @endif value="1 saat 30 dəqiqə"/>
                                                            <span></span>
                                                            1 hour 30 min
                                                        </label>

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="teaching_time"
                                                                   @if($teacher->teaching_time=='2 saat') checked
                                                                   @endif value="2 saat"/>
                                                            <span></span>
                                                            2 hours
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card-footer pb-0">
                                                        <div class="row">
                                                            <div class="col-3"></div>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div class="d-flex justify-content-between border-top pt-10">
                                                                    <div class="mr-2">
                                                                    </div>
                                                                    <div>
                                                                        <a href="{{url('account/teacher')}}" type="button"
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
                url: '/account/teacher/category/' + categoryId + '/subjects',
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
