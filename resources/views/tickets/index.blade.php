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
                    <h3 class="page-title">Tickets</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tickets</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="{{ route('tickets.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Ticket</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card-group m-b-30">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block">New Tickets</span>
                                </div>
                                <div>
                                    <span class="text-success">0%</span>
                                </div>
                            </div>
                            <h3 class="mb-3">1</h3>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block">Solved Tickets</span>
                                </div>
                                <div>
                                    <span class="text-success">0%</span>
                                </div>
                            </div>
                            <h3 class="mb-3">0</h3>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block">Open Tickets</span>
                                </div>
                                <div>
                                    <span class="text-danger">0%</span>
                                </div>
                            </div>
                            <h3 class="mb-3">0</h3>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <span class="d-block">Pending Tickets</span>
                                </div>
                                <div>
                                    <span class="text-danger">0%</span>
                                </div>
                            </div>
                            <h3 class="mb-3">0</h3>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row filter-row">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating" name="filter_by_title" id="filter_by_title">
                    <label class="focus-label">Subject</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select class="select floating" name="filter_by_status" id="filter_by_status">
                        <option value=""> -- Select -- </option>
                        <option value="O"> Open </option>
                        <option value="P"> In Progress </option>
                        <option value="C"> Resolved or Closed </option>
                        <option value="R"> Reopened </option>
                    </select>
                    <label class="focus-label">Status</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select class="select floating" name="filter_by_priority" id="filter_by_priority">
                        <option value=""> -- Select -- </option>
                        <option value="low"> Low </option>
                        <option value="medium"> Medium</option>
                        <option value="high"> High </option>
                    </select>
                    <label class="focus-label">Priority</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text" name="from_date" id="from_date">
                    </div>
                    <label class="focus-label">From</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text" name="end_date" id="end_date">
                    </div>
                    <label class="focus-label">To</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <button type="button" class="btn btn-success" id="btn-search"><i class="fa fa-search"></i> Search</button>
                <button type="button" class="btn btn-warning" id="btn-reset"><i class="fa fa-recycle"></i></button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0" id="alltickets-data" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ticket Id</th>
                                <th>Ticket Subject</th>
                                <th>Assigned Staff</th>
                                <th>Created Date</th>
                                <th>Last Reply</th>
                                <th>Priority</th>
                                <th class="text-center">Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="add_ticket" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Ticket</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ticket Subject</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ticket Id</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Assign Staff</label>
                                    <select class="select">
                                        <option>-</option>
                                        <option>Mike Litorus</option>
                                        <option>John Smith</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select class="select">
                                        <option>-</option>
                                        <option>Delta Infotech</option>
                                        <option>International Software Inc</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <select class="select">
                                        <option>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>CC</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Assign</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ticket Assignee</label>
                                    <div class="project-members">
                                        <a title="John Smith" data-placement="top" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-02.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add Followers</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ticket Followers</label>
                                    <div class="project-members">
                                        <a title="Richard Miles" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-09.jpg" alt="">
                                        </a>
                                        <a title="John Smith" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-10.jpg" alt="">
                                        </a>
                                        <a title="Mike Litorus" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-05.jpg" alt="">
                                        </a>
                                        <a title="Wilmer Deluna" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-11.jpg" alt="">
                                        </a>
                                        <span class="all-team">+2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload Files</label>
                                    <input class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_ticket" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Ticket</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ticket Subject</label>
                                    <input class="form-control" type="text" value="Laptop Issue">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ticket Id</label>
                                    <input class="form-control" type="text" readonly value="TKT-0001">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Assign Staff</label>
                                    <select class="select">
                                        <option>-</option>
                                        <option selected>Mike Litorus</option>
                                        <option>John Smith</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select class="select">
                                        <option>-</option>
                                        <option>Delta Infotech</option>
                                        <option selected>International Software Inc</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <select class="select">
                                        <option>High</option>
                                        <option selected>Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>CC</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Assign</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ticket Assignee</label>
                                    <div class="project-members">
                                        <a title="John Smith" data-placement="top" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-02.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add Followers</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ticket Followers</label>
                                    <div class="project-members">
                                        <a title="Richard Miles" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-09.jpg" alt="">
                                        </a>
                                        <a title="John Smith" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-10.jpg" alt="">
                                        </a>
                                        <a title="Mike Litorus" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-05.jpg" alt="">
                                        </a>
                                        <a title="Wilmer Deluna" data-bs-toggle="tooltip" href="#" class="avatar">
                                            <img src="/img/profiles/avatar-11.jpg" alt="">
                                        </a>
                                        <span class="all-team">+2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload Files</label>
                                    <input class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal custom-modal fade" id="delete_ticket" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Ticket</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
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

                // $('body').addClass('mini-sidebar');

                @if (Session::has('success'))
                    toastr.success("{{ Session::get('success') }}");
                @endif
                @if (Session::has('update'))
                    toastr.info("{{ Session::get('update') }}");
                @endif
                @if (Session::has('delete'))
                    toastr.error("{{ Session::get('delete') }}");
                @endif

                fill_gridmyticket();

                function fill_gridmyticket() {
                    let table_data = $('#alltickets-data').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('tickets.index') }}",
                            data: {
                                filter_status: $('#filter_by_status').val(),
                                filter_title: $('#filter_by_title').val(),
                                filter_priority: $('#filter_by_priority').val(),
                                filter_from_date: $('#from_date').val(),
                                filter_end_date: $('#end-date').val(),
                            }
                        },
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex'
                            },
                            {
                                data: 'ticket_no',
                                name: 'ticket_no',
                            },
                            {
                                data: 'title',
                                name: 'title',
                            },
                            {
                                data: 'assigned_staff',
                                name: 'assigned_staff'
                            },

                            {
                                data: 'created_at',
                                name: 'created_at'
                            },
                            {
                                data: 'last_reply',
                                name: 'last_reply'
                            },
                            {
                                data: 'priority',
                                name: 'priority'
                            },
                            {
                                data: 'issued_status',
                                name: 'issued_status'
                            },
                            {
                                data: 'action',
                                name: 'action'
                            },

                        ],
                        columnDefs: [{
                            targets: [-1],
                            className: 'text-left'
                        }],
                    });
                }

                $('#btn-search').click(function() {
                    $('#alltickets-data').DataTable().destroy();
                    fill_gridmyticket();
                });

                $('#btn-reset').click(function() {
                    $('#filter_by_title').val('');
                    $('#filter_by_status').val('');
                    $('#filter_by_priority').val('');
                    $('#from_date').val('');
                    $('#end_date').val('');
                    $('#alltickets-data').DataTable().destroy();
                    fill_gridmyticket();
                });
            });
        </script>
    @endslot
</x-app-layout>
