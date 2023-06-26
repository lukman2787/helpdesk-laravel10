<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" href="/css/select2.min.css">

        <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
    @endslot

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Add User</h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="select" name="department_id" id="department_id">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $dept)
                                        <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Employee ID <span class="text-danger">*</span></label>
                                <select class="select @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id">
                                    <option value="">-- Select Employee --</option>
                                </select>
                                @error('employee_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Fullname <span class="text-danger">*</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') ?? $user->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Username <span class="text-danger">*</span></label>
                                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username') ?? $user->username }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control @error('confirm-password') is-invalid @enderror" type="password" name="confirm-password" id="confirm-password">
                                @error('confirm-password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Role</label>
                                {{-- <select class="select" name="roles[]" multiple="multiple">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select> --}}
                                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'select', 'multiple']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary submit-btn">Cancel</a>
                    </div>
                </form>
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
            });
            $(document).on('change', '#department_id', function() {
                var idDept = this.value;
                $("#employee_id").html('');
                $.ajax({
                    url: "{{ url('api/fetch-employee') }}",
                    type: "POST",
                    data: {
                        department_id: idDept,
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#employee_id').html('<option value="">-- Select Employee--</option>');
                        $.each(result.employees, function(key, value) {
                            $("#employee_id").append('<option value="' + value.id + '">' + value.employee_id + ' - ' + value.first_name + ' ' + value.last_name + '</option>');
                        });
                        console.log(result.employees);
                    }
                });
            });
        </script>
    @endslot
</x-app-layout>
