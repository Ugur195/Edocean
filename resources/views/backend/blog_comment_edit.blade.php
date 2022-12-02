@extends('backend.app')
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
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Blog Comment Edit</h5>
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-5">
                            <!--begin::Tab Content-->
                            <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                                <form id="mySetting" class="form" method="POST">
                                    {{csrf_field()}}
                                    <div class="col-xl-3"></div>


                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blog_comment_edit->name}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Email</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blog_comment_edit->email}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Message</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blog_comment_edit->message}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Blog</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{\App\Models\Blogs::find($blog_comment_edit->blog_id)->title}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 text-right col-form-label">Parent Comment</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="{{$blog_comment_edit->parent_id}}" readonly/>
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
                                                    <a href="{{route('AdminBlogComment')}}" type="button"
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

@endsection
