<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" href="/css/select2.min.css">

        <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
    @endslot

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Employee</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="{{ url('employee/create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
                    <div class="view-icons">
                        {{-- <a href="{{ url('employee') }}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> --}}
                        {{-- <a href="{{ url('employee') }}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> --}}
                        <a class="list-view btn btn-link" id="empDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-text">
                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="empDropdown">
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa fa-user-plus" aria-hidden="true"></i> Employee Transfer</a>
                            <a class="dropdown-item" href="{{ url('employee/bulk_add') }}"><i class="fa fa-users" aria-hidden="true"></i> Bulk Add Employee</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-wrench" aria-hidden="true"></i> Bulk Update</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-clone" aria-hidden="true"></i> Insight</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee ID</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <select class="select floating" name="designation_id" id="designation_id">
                        <option>Select Designation</option>
                        @foreach ($designations as $data)
                            <option value="{{ $data->designation_id }}">{{ $data->designation_name }}</option>
                        @endforeach
                    </select>
                    <label class="focus-label">Designation</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-success w-100"> Search </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table" id="employees-data" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkBox">
                                    <label for="select_all" class="container-checkbox">
                                        <input type="checkbox" id="select_all">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>Employee</th>
                                <th>Branch</th>
                                <th>Organization</th>
                                <th>Employment Status</th>
                                <th class="text-nowrap">Join Date</th>
                                <th>End Date</th>
                                <th>Resign Date</th>
                                <th>Barcode</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="add_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Employee</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Last Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Confirm Password</label>
                                    <input class="form-control" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone </label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Company</label>
                                    <select class="select">
                                        <option value>Global Technologies</option>
                                        <option value="1">Delta Infotech</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select Department</option>
                                        <option>Web Development</option>
                                        <option>IT Management</option>
                                        <option>Marketing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select Designation</option>
                                        <option>Web Designer</option>
                                        <option>Web Developer</option>
                                        <option>Android Developer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive m-t-15">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Create</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Import</th>
                                        <th class="text-center">Export</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Holidays</td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Leaves</td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Clients</td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Projects</td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tasks</td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chats</td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Assets</td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Timing Sheets</td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @slot('custom_script')
        <script src="/js/select2.min.js"></script>

        <script src="/js/moment.min.js"></script>
        <script src="/js/bootstrap-datetimepicker.min.js"></script>

        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('body').addClass('mini-sidebar');

                @if (Session::has('success'))
                    toastr.success("{{ Session::get('success') }}");
                @endif
                @if (Session::has('update'))
                    toastr.info("{{ Session::get('update') }}");
                @endif
                @if (Session::has('delete'))
                    toastr.error("{{ Session::get('delete') }}");
                @endif

                let table_data = $('#employees-data').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('employee.index') }}",
                    columns: [{
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'employee_name',
                            name: 'employee_name'
                        },
                        {
                            data: 'location_name',
                            name: 'location_name'
                        },
                        {
                            data: 'department_name',
                            name: 'department_name'
                        },
                        {
                            data: 'contract_name',
                            name: 'contract_name'
                        },
                        {
                            data: 'date_of_joining',
                            name: 'date_of_joining'
                        },
                        {
                            data: 'end_status_date',
                            name: 'end_status_date'
                        },
                        {
                            data: 'date_of_leaving',
                            name: 'date_of_leaving'
                        },
                        {
                            data: 'pincode',
                            name: 'pincode'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                    ],
                    columnDefs: [{
                        targets: [-1],
                        className: 'DT-left'
                    }],
                });
            });
        </script>
    @endslot
</x-app-layout>
