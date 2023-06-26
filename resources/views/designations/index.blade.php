<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/select2.min.css">

        <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">
    @endslot

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Designations</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Designations</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <button type="button" class="btn add-btn" id="addNewBtn" data-bs-toggle="modal" data-bs-target="#designationModal"><i class="fa fa-plus"></i> Add Designation</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0" id="designations-data" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Designation </th>
                                <th>Department </th>
                                <th style="width: 5%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="designationModal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Designation</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="designationForm">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <input class="form-control" type="hidden" name="designation_id" id="designation_id">
                        <div class="form-group">
                            <label>Designation Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="designation_name" id="designation_name">
                        </div>
                        <div class="form-group">
                            <label>Department <span class="text-danger">*</span></label>
                            <select class="form-select" name="department_id" id="department_id">
                                <option>Select Department</option>
                                @foreach ($departments as $data)
                                    <option value="{{ $data->department_id }}">{{ $data->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="submit-section">
                            <button type="button" class="btn btn-primary submit-btn btn-sm" id="saveBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @slot('custom_script')
        <script src="/js/select2.min.js"></script>

        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('.select2').select2({
                    dropdownParent: $('#designationModal')
                });

                let table_data = $('#designations-data').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('designation.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'designation_name',
                            name: 'designation_name'
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

            $(document).on('click', '#addNewBtn', function() {
                $('#saveBtn').html("Create Designation");
                $('#designation_id').val('');
                $('#designationForm').trigger("reset");
                $('.model-title').html("Create New Designation");
                $(".print-error-msg").css('display', 'none');
            });

            $(document).on('click', '#saveBtn', function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                let designation_id = $('#designation_id').val();
                if (designation_id != '') {
                    var url = "{{ url('designation') }}" + '/' + designation_id;
                    var method = "PUT";
                    var value_btn = "Update Designation";
                } else {
                    var url = "{{ route('designation.store') }}";
                    var method = "POST";
                    var value_btn = " Create Designation";
                }
                $.ajax({
                    url: url,
                    type: method,
                    dataType: "json",
                    // data: $('#accountForm').serialize(),
                    data: {
                        'designation_name': $('#designation_name').val(),
                        'department_id': $('#department_id').val(),
                    },
                    success: function(response) {

                        if ($.isEmptyObject(response.error)) {
                            $('#designationForm').trigger("reset");
                            $('#designationModal').modal('hide');
                            $('#designations-data').DataTable().ajax.reload();
                            toastr.success(response.success);
                        } else {
                            $('#saveBtn').html(value_btn);
                            printErrorMsg(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Terjadi error pada saat mengirim request
                        console.log(xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.editDesignation', function() {
                var designation_id = $(this).data('id');
                $.get("{{ route('designation.index') }}" + '/' + designation_id + '/edit', function(data) {
                    $('.modal-title').html("Edit Akun COA");
                    $(".print-error-msg").css('display', 'none');
                    $('#saveBtn').html("Update");
                    $('#designationModal').modal('show');
                    $('#designation_id').val(data.designation_id);
                    $('#designation_name').val(data.designation_name);
                    $('#department_id').val(data.department_id);
                })
            });

            $(document).on('click', '.deleteDesignation', function() {
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
                            url: "{{ route('designation.store') }}" + '/' + dept_id,
                            success: function(response) {
                                $('#designations-data').DataTable().ajax.reload();
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

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        </script>
    @endslot
</x-app-layout>
