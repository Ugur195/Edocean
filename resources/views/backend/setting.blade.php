@extends('backend.app')
@section('css')
@endsection

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Setting</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                    <form class="form">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Logo</label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="image-input image-input-outline" id="kt_contacts_edit_avatar"
                                     style="background-image: url('/backendCssJs/assets/media/users/blank.png')">
                                    <div class="image-input-wrapper"
                                         style="background-image: url('/backendCssJs/assets/media/users/100_3.jpg')"></div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="profile_avatar_remove"/>
                                    </label>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="remove" data-toggle="tooltip" title="Remove avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Url</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Title</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Description</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Description_RU</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Description_EN</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Keywords</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Analytics</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Author</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-phone"></i>
																	</span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                           value="" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Fax</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Email </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-at"></i>
																	</span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                           value="" placeholder=""/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Facebook</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Twitter</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Instagram</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Youtube</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Whatsapp</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Google</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Address</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Country</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">City</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Maps</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Smpt_User</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Smpt_Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Host</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label">Port</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                       value=""/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 text-right col-form-label"></label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="d-flex justify-content-between border-top pt-10">
                                    <div class="mr-2">

                                    </div>
                                    <div>
                                        <a href="{{url('admin/index')}}" type="button"
                                           class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                           data-wizard-type="action-submit">Back
                                        </a>
                                        <button type="button"
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


@endsection

@section('js')

@endsection
