@extends('backend.app')
@section('css')
    <style>
        i {
            font-size: 20px;
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
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Blog</h5>
                                <div
                                    class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-5">
                            <!--begin::Tab Content-->
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                <form id="BlogEdit" class="form" method="POST" action="{{route('admin.edit.blog', $blogs_edit->id)}}">
                                    {{csrf_field()}}
                                    <div class="col-xl-3"></div>

                                    <div class="form-group row">
                                        {{--                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>--}}
                                        {{--                                        <div class="col-sm4">--}}
                                        {{--                                            <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"--}}
                                        {{--                                                 style="background-image: url(assets/media/users/blank.png)">--}}

                                        {{--                                                <div class="image-input-wrapper"--}}
                                        {{--                                                     style="background-image: url('data:image/jpeg;base64,{{base64_encode($blogs_edit->image)}}')">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <label--}}
                                        {{--                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"--}}
                                        {{--                                                    data-action="change" data-toggle="tooltip" title=""--}}
                                        {{--                                                    data-original-title="Change avatar">--}}
                                        {{--                                                    <i class="fa fa-pen icon-sm text-muted"></i>--}}
                                        {{--                                                    <input type="file" name="image" id="file" accept=".png, .jpg, .jpeg"/>--}}
                                        {{--                                                    <input type="hidden" name="profile_avatar_remove"/>--}}
                                        {{--                                                </label>--}}

                                        {{--                                                <span--}}
                                        {{--                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"--}}
                                        {{--                                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">--}}
                                        {{--                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>--}}
                                        {{--                                                </span>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        <section class="content-with-menu content-with-menu-has-toolbar media-gallery">
                                            <div class="content-with-menu-container">
                                                <div class="inner-body mg-main">
                                                    <div class="row mg-files" data-sort-destination
                                                         data-sort-id="media-gallery">
                                                        @foreach(explode('(xx)',$blogs_edit->image) as $image)
                                                            @if($image!="")
                                                                <div
                                                                    class="isotope-item image col-sm-6 col-md-4 col-lg-2">
                                                                    <div class="thumbnail">
                                                                        <div class="thumb-preview">
                                                                            <img
                                                                                src="data:image/jpeg;base64,{{base64_encode($image)}}"
                                                                                class="img-fluid" alt="Şəkil yoxdur!">
                                                                            <div class="mg-thumb-options">
                                                                                <div class="mg-zoom">
                                                                                    <button type="button"
                                                                                            onclick="sil('{{base64_encode($image)}}','{{$blogs_edit->id}}')"
                                                                                            class="btn btn-danger"><i
                                                                                            class="fa fa-trash"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                    <div class="form__item col-sm">
                                        <div class="likes">
                                            <span>{{$blogs_edit->likes}}</span>
                                            <i style="color: green; vertical-align: -5px; font-size:30px; padding-right: 20px;"
                                               class="la la-thumbs-up"></i>
                                            <span>{{$blogs_edit->dislike}}</span>
                                            <i style="color:red; vertical-align: -5px; font-size:30px; padding-right: 20px;"
                                               class="la la-thumbs-down"></i>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Image</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="image" class="form-control form-control-lg form-control-solid"
                                                   type="file"  accept=".png, .png(), .jpg, .jpg(), .jpeg, .jpeg()"
                                                   multiple
                                                   value=""/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Title</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="title" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$blogs_edit->title}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Title_RU</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="title_ru"
                                                   class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blogs_edit->title_ru}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Title_EN</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="title_en"
                                                   class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blogs_edit->title_en}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Message</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="message"
                                                   class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blogs_edit->message}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Message_RU</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="message_ru"
                                                   class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blogs_edit->message_ru}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Message_EN</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="message_en"
                                                   class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blogs_edit->message_en}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Author</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="author" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{\App\Models\User::find($blogs_edit->author)->name}}"
                                                   readonly/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Category</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control  form-control-solid" id="category_id"
                                                    name="category_id">
                                                <option value="0" selected disabled>Select category</option>
                                                @foreach($blog_category as $bc)
                                                    <option @if($blogs_edit->category_id==$bc->id) selected
                                                            @endif value="{{$bc->id}}">{{$bc->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Slug</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input name="slug" class="form-control form-control-lg form-control-solid"
                                                   type="text"
                                                   value="{{$blogs_edit->slug}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Status</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select name="status"
                                                    class="form-control form-control-lg form-control-solid custom-select"
                                                    id="status">
                                                <option value="0" disabled selected>Select</option>
                                                <option value="1" @if($blogs_edit->status==1) selected @endif>Aktiv
                                                </option>
                                                <option value="0" @if($blogs_edit->status==0) selected @endif>Deaktiv
                                                </option>
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
                                                    <a href="{{route('AdminBlogs')}}" type="button"
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

    <script>
        function sil(image_name, id) {
            console.log(image_name)
            Swal.fire({
                title: 'Bu şəkili silmək istəyirsinizmi?',
                text: "Silinən səkil geri qaytarıla bilmir!",
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Bağla',
                confirmButtonText: 'Sil'
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: '/admin/blogs_image_delete',
                        data: {
                            'image_name': image_name,
                            'id': id,
                            '_token': CSRF_TOKEN
                        },
                        success: function (response) {
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            });
                            if (response.status == 'success') {
                                window.location.href = '/admin/blogs_edit/'+id;
                            }
                        }

                    })
                }
            })
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#BlogEdit').ajaxForm({
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
                },
                error: function (response) {
                    console.log({response})
                }
            });
        });
    </script>

@endsection

