<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">
    @endslot
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Departments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Department</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="javascript:void(0)" class="btn add-btn" id="createNewDepartment"><i class="fa fa-plus"></i> Add Department</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped mb-0" id="department-data" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Department Name</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="add_department" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Department</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm" name="addForm">
                        <div class="form-group">
                            <label>Department Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="department_name" id="department_name">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" id="saveBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_department" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Department</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" name="editForm">
                        <input type="hidden" class="form-control" name="department_id" id="department_id">
                        <div class="form-group">
                            <label>Department Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="dept_name_edit" id="dept_name_edit">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" id="updateBtn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @slot('custom_script')
        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let table_data = $('#department-data').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('department.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'department_name',
                            name: 'department_name'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    columnDefs: [{
                        targets: [-1],
                        className: 'dt-left'
                    }],
                });
            });

            $(document).on('click', '#createNewDepartment', function() {
                $('#saveBtn').html("Create Department");
                $('#department_id').val('');
                $('#addForm').trigger("reset");
                $('.model-title').html("Create New Department");
                $('#add_department').modal('show');
            });

            $(document).on('click', '#saveBtn', function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    url: "{{ route('department.store') }}",
                    method: 'post',
                    data: {
                        'department_id': $('#department_id').val(),
                        'department_name': $('#department_name').val()
                    },
                    success: function(response) {
                        $('#addForm').trigger("reset");
                        $('#add_department').modal('hide');
                        $('#department-data').DataTable().ajax.reload();
                        toastr.success(response.success);
                    },
                    error: function(xhr, status, error) {
                        // Terjadi error pada saat mengirim request
                        console.log(xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.editDept', function() {
                var dept_id = $(this).data('id');
                $.get("{{ route('department.index') }}" + '/' + dept_id + '/edit', function(data) {
                    $('#modelHeading').html("Edit Department");
                    $('#updateBtn').html("Update");
                    $('#edit_department').modal('show');
                    $('#department_id').val(data.department_id);
                    $('#dept_name_edit').val(data.department_name);
                })
            });

            $(document).on('click', '#updateBtn', function(e) {
                e.preventDefault();
                $(this).html('Updating..');

                $.ajax({
                    url: "{{ url('department') }}" + '/' + $('#department_id').val(),
                    method: 'post',
                    data: {
                        '_method': 'PUT',
                        'department_id': $('#department_id').val(),
                        'company_id': '1',
                        'location_id': '1',
                        'department_name': $('#dept_name_edit').val()
                    },
                    success: function(response) {
                        $('#editForm').trigger("reset");
                        $('#edit_department').modal('hide');
                        $('#department-data').DataTable().ajax.reload();
                        toastr.success(response.success);
                    },
                    error: function(xhr, status, error) {
                        // Terjadi error pada saat mengirim request
                        console.log(xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.deleteDept', function() {
                let dept_id = $(this).data("id");
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
                            url: "{{ route('department.store') }}" + '/' + dept_id,
                            success: function(response) {
                                $('#department-data').DataTable().ajax.reload();
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
