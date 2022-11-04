@extends('backend.app')

@section('css')
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
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New Blog</h5>
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-5">
                            <!--begin::Tab Content-->
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                <form id="myAddBlog" class="form" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="col-xl-3"></div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                                 style="background-image: url(assets/media/users/blank.png)">

                                                <div class="image-input-wrapper"
                                                     style="background-image: url('data:image/jpeg;base64,')">
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
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Title</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" placeholder="Blog Name" name="title" type="text" value=""/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Title RU</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" placeholder="Blog Name" name="title_ru" type="text" value=""/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Title EN</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" placeholder="Blog Name" name="title_en" type="text" value=""/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Message</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <textarea rows='1' name="message" type="text"
                                                  class="form-control form-control-lg form-control-solid" placeholder="Write a short description of the course"
                                                  value=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Message RU</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <textarea rows='1' name="message_ru" type="text"
                                                  class="form-control form-control-lg form-control-solid" placeholder="Write a short description of the course"
                                                  value=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Message EN</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <textarea rows='1' name="message_en" type="text"
                                                  class="form-control form-control-lg form-control-solid" placeholder="Write a short description of the course"
                                                  value=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Author</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input  readonly class="form-control form-control-lg form-control-solid" name="author" type="text" value="{{ Auth::user()->name }}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Category</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control  form-control-solid" id="category" name="blog_category">
                                                <option value="0" selected disabled>Select a Category</option>
                                                @foreach ($blog_category as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
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
                                                    <a href="{{url('admin/blogs')}}" type="button"
                                                       class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                       data-wizard-type="action-submit">Back
                                                    </a>
                                                    <button
                                                        class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                        data-wizard-type="action-next">Create
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


    <script>
        const textarea = document.querySelector('textarea');

        textarea.addEventListener('input', autosize);

        function autosize() {
            this.style.height = 'auto';
            let applyNow = this.style.offsetHeight;
            this.style.height = this.scrollHeight - 20 + 'px';
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#myAddBlog').ajaxForm({
                beforeSubmit: function () {
                },

                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false
                        }
                    )
                    if (response.status === 'success') {
                        setTimeout(function () {
                            window.location.href = '/admin/blogs';
                        }, 1000)
                    }

                }
            });
        });
    </script>
@endsection

