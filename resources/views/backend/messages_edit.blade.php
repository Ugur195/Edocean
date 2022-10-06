@extends('backend.app')
@section('css')
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="card-label">Messages</h5>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3"></div>
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" value="{{$messages_edit->full_name}}"
                                               class="form-control form-control-solid form-control-lg"
                                               readonly/>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" value="{{$messages_edit->email}}"
                                               class="form-control form-control-solid form-control-lg"
                                               readonly/>
                                    </div>

                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" value="{{$messages_edit->subject}}"
                                               class="form-control form-control-solid form-control-lg"
                                                readonly/>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">Message</label>
                                        <textarea class="form-control form-control-solid form-control-lg"
                                                  id="exampleTextarea" rows="3" readonly>{{$messages_edit->message}} </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">Answer</label>
                                        <textarea class="form-control form-control-solid form-control-lg"
                                                  id="exampleTextarea" rows="4"></textarea>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <div class="col-xl-3"></div>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="d-flex justify-content-between border-top pt-10">
                                    <div class="mr-2">
                                    </div>
                                    <div>
                                        <a href="{{url('admin/contact_us')}}" type="button"
                                           class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                           data-wizard-type="action-submit">Back
                                        </a>
                                        <button class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                data-wizard-type="action-next">Send
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

