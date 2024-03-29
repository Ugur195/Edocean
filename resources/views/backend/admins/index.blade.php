@extends('backend.app')


@section('css')
@endsection

@section('content')
    <div class="d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Admins</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i>Export
                                </button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="nav flex-column nav-hover">
                                        <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">
                                            Choose an
                                            option:
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon la la-print"></i>
                                                <span class="nav-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon la la-copy"></i>
                                                <span class="nav-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon la la-file-excel-o"></i>
                                                <span class="nav-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon la la-file-text-o"></i>
                                                <span class="nav-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon la la-file-pdf-o"></i>
                                                <span class="nav-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                            <!--end::Dropdown-->
                            <!--begin::Button-->
                            <a href="{{ route('admin.admins.create') }}" class="btn btn-primary font-weight-bolder">
                                <i class="la la-plus"></i>Add Admin</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Father Name</th>
                                <th>Birthday</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>IMAGE</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>FATHER NAME</th>
                                <th>BIRTHDAY</th>
                                <th>EMAIL</th>
                                <th>STATUS</th>
                                <th>OPTIONS</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('backendCssJs/assets/plugins/custom/datatables/datatables.bundle.js?v='.time())}}"></script>
    <script src="{{asset('backendCssJs/assets/js/pages/crud/datatables/admins.js?v='.time())}}"></script>

    <script>
        function blokUnblok(element, status, id) {
            let action = $(element).data('action');
            let title = '';
            let text = '';
            let icon = '';
            let confBtnText = '';
            if (status == 0) {
                title = 'Blokdan cixartmaq Isteyirsinizmi?';
                text = 'Unblock etdikden sonra Blok etmek mumkundu!';
                icon = 'info';
                confBtnText = 'Blokdan cixart';
            } else if (status == 1) {
                title = 'Blok etmek Isteyirsinizmi?';
                text = 'Blok etdikden sonra Unblock etmek mumkundu!';
                icon = 'warning';
                confBtnText = 'Blok et';
            }
            swal.fire({
                title: title,
                text: text,
                icon: icon,
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: 'Bagla',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: confBtnText,
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "Post",
                        url: action,
                        data: {
                            'id': id,
                            'status': status,
                            'btn_block': 'btn_block',
                            'btn_unblock': 'btn_unblock',
                            '_token': CSRF_TOKEN
                        },

                        success: function (response) {
                            swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            })
                            if (response.status === 'success') {
                                setTimeout(function () {
                                    window.location.href = '/admin/admins';
                                }, 1000)
                            }

                        }
                    })
                }
            })
        }

        function sil(setir, id) {
            var sira = setir.parentNode.parentNode.rowIndex;
            let action = $(setir).data('action');
            swal.fire({
                title: 'Silmek Isteyirsinizmi?',
                text: 'Sildikden sonra berpa etmek olmayacaq!',
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: 'Bagla',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil',
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "Post",
                        url: action,
                        data: {
                            'id': id,
                            '_method': 'delete',
                            '_token': CSRF_TOKEN
                        },

                        success: function (response) {
                            if (response.status == 'success') {
                                document.getElementById("kt_datatable").deleteRow(sira);
                            }
                            swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            })
                            if (response.status === 'success') {
                                setTimeout(function () {
                                    window.location.href = '/admin/admins';
                                }, 500)
                            }

                        }
                    })
                }
            })
        }
    </script>

@endsection


