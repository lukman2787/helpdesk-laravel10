<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/select2.min.css">
        <link rel="stylesheet" href="/css/ckeditor.css">
        <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
    @endslot

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">My Tickets</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Support Ticket</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit a ticket</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('myticket.update', $row->ticket_id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Requester</label>
                                        <input class="form-control" type="text" value="{{ $row->request_firstname . ' ' . $row->request_lastname }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Assign Department</label>
                                        <select class="select" name="department_id" id="department_id">
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $dept)
                                                <option value="{{ $dept->department_id }}" {{ $dept->department_id == $row->assigned_dept_id ? 'selected' : null }}>{{ $dept->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Assign Staff</label>
                                        <select class="select @error('assigned_to') is-invalid @enderror" name="assigned_to" id="assigned_to">
                                            <option value="">-</option>
                                            @foreach ($assign_staff as $staff)
                                                <option value="{{ $staff->id }}" {{ $staff->id == $row->assigned_to ? 'selected' : null }}>{{ $staff->first_name . ' ' . $staff->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('assigned_to')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <select class="form-select @error('priority') is-invalid @enderror" name="priority" id="priority">
                                            <option value="">Select Priority</option>
                                            <option value="low" {{ $row->priority == 'low' ? 'selected' : null }}> Low </option>
                                            <option value="medium" {{ $row->priority == 'medium' ? 'selected' : null }}> Medium</option>
                                            <option value="high" {{ $row->priority == 'high' ? 'selected' : null }}> High </option>
                                        </select>
                                        @error('priority')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->category_id }}" {{ $cat->category_id == $row->category_id ? 'selected' : null }}>{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Ticket Subject</label>
                                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') ?? $row->title }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" cols="4" name="description" id="description">{{ old('title') ?? $row->description }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Upload Files</label>
                                        <input class="form-control" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('support/myticket') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @slot('custom_script')
        <script src="/js/ckeditor.js"></script>
        <script src="/js/select2.min.js"></script>
        <script src="/js/moment.min.js"></script>
        <script src="/js/bootstrap-datetimepicker.min.js"></script>

        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


            });


            $(document).on('change', '#department_id', function() {
                var idDept = this.value;
                $("#assigned_to").html('');

                $.ajax({
                    url: "{{ url('api/fetch-assigned') }}",
                    type: "POST",
                    data: {
                        department_id: idDept,
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#assigned_to').html('<option value="">-- Select Employee--</option>');
                        $.each(result.employees, function(key, value) {
                            $("#assigned_to").append('<option value="' + value.id + '">' + value.first_name + ' ' + value.last_name + '</option>');

                            // console.log(value.first_name);
                        });
                    }
                });
            });
        </script>
    @endslot

</x-app-layout>
