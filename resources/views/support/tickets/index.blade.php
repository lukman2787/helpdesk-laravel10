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
                    <h3 class="page-title">My Tickets</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">My Tickets</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="{{ route('myticket.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> New Support Ticket</a>
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
                        <option value=""> -- All Status -- </option>
                        <option value="O" selected> Open </option>
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
                        <option value=""> -- All Priority -- </option>
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
            {{-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-1 col-12">
                <button type="button" class="btn btn-secondary" id="btn-reset"><i class="fa fa-recycle"></i></button>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">All Tickets</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0" id="usertickets-data" cellspacing="0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tickets Subject </th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-footer">
                        <a href="#">View all tickets</a>
                    </div> --}}
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
                    let table_tickets = $('#usertickets-data').DataTable({
                        paging: false,
                        ordering: false,
                        info: false,
                        searching: false,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('mytickets.filter') }}",
                            data: {
                                filter_status: $('#filter_by_status').val(),
                                filter_title: $('#filter_by_title').val(),
                                filter_priority: $('#filter_by_priority').val(),
                                filter_from_date: $('#from_date').val(),
                                filter_end_date: $('#end-date').val(),
                            }
                        },
                        columns: [{
                                data: 'ticket_subject',
                                name: 'ticket_subject'
                            },
                            {
                                data: 'description',
                                name: 'description',
                            },
                            {
                                data: 'issued_status',
                                name: 'issued_status',
                            },
                            {
                                data: 'action',
                                name: 'action'
                            },

                        ],
                        columnDefs: [{
                            targets: [-1],
                            className: 'text-end'
                        }],
                    });
                }

                $('#btn-search').click(function() {
                    $('#usertickets-data').DataTable().destroy();
                    fill_gridmyticket();
                });

                $('#btn-reset').click(function() {
                    $('#filter_by_title').val('');
                    $('#filter_by_status').val('');
                    $('#filter_by_priority').val('');
                    $('#from_date').val('');
                    $('#end_date').val('');
                    $('#usertickets-data').DataTable().destroy();
                    fill_gridmyticket();
                });

            });

            $(document).on('click', '.btn-completed', function(e) {
                e.preventDefault();
                let ticket_id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to Closed this ticket",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#85D630',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, completed it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('support/closed-myticket') }}" + '/' + ticket_id,
                            type: "PUT",
                            dataType: "json",
                            data: {
                                'status': 'C',
                            },
                            success: function(response) {
                                toastr.success(response.closed);
                            },
                            error: function(xhr, status, error) {
                                // Terjadi error pada saat mengirim request
                                console.log(xhr.responseText);
                            }
                        });
                    }
                })

            });

            $(document).on('click', '.delTicket', function() {
                let ticket_id = $(this).data("id");
                // confirm("Are You sure want to delete !");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('myticket.store') }}" + '/' + ticket_id,
                            success: function(response) {
                                $('#usertickets-data').DataTable().ajax.reload();
                                toastr.error(response.deleted);
                            },
                            error: function(xhr, status, error) {
                                // Terjadi error pada saat mengirim request
                                console.log(xhr.responseText);
                            }
                        });
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endslot
</x-app-layout>
