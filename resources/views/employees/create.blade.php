<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/select2.min.css">
        <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
    @endslot

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Employees</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employee Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Add Employee</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employee.store') }}" method="post">
                            @csrf
                            <h4 class="card-title">Personal Information</h4>
                            <div class="row justify-content-md-center">
                                <div class="col-sm-9">
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                                @error('first_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                                @error('last_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username </label>
                                                <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
                                                @error('username')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Phone <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('contact_no') is-invalid @enderror" name="contact_no" id="contact_no" value="{{ old('contact_no') }}">
                                                @error('contact_no')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Place Of Birth <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('place_of_birth') is-invalid @enderror" name="place_of_birth" id="place_of_birth" value="{{ old('place_of_birth') }}">
                                                @error('place_of_birth')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birthdate <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" aria-label="Date of Birth" aria-describedby="basic-addon2">
                                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                                                    @error('date_of_birth')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="d-block">Gender <span class="text-danger">*</span> :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input is-nvalid" type="radio" name="gender" id="gender_male" value="M">
                                                    <label class="form-check-label" for="gender_male">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input is-nvalid" type="radio" name="gender" id="gender_female" value="F">
                                                    <label class="form-check-label" for="gender_female">Female</label>
                                                </div>
                                                @error('gender')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Marital Status <span class="text-danger">*</span></label>
                                                <select class="form-select @error('marital_status') is-invalid @enderror" name="marital_status" id="marital_status">
                                                    <option value="">Select Marital</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="separated">Separated</option>
                                                    <option value="widowed">Widowed</option>
                                                </select>
                                                @error('marital_status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Blood Type <span class="text-danger">*</span></label>
                                                <select class="form-select" name="blood_group" id="blood_group">
                                                    <option value="">Select Blood</option>
                                                    <option value="A">A</option>
                                                    <option value="O">O</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Religion <span class="text-danger">*</span></label>
                                                <select class="form-select @error('religion') is-invalid @enderror" name="religion" id="religion">
                                                    <option value="">Select Religion</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Catholic">Catholic</option>
                                                    <option value="Christian">Christian</option>
                                                    <option value="Buddhist">Buddhist</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Jewish">Jewish</option>
                                                    <option value="Sikh">Sikh</option>
                                                    <option value="No Religion">No Religion</option>
                                                </select>
                                                @error('religion')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <h4 class="card-title">Identity & Address</h4>
                            <div class="row justify-content-md-center">
                                <div class="col-sm-9">
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Identity Type <span class="text-danger">*</span></label>
                                                <select class="form-select form-select-sm @error('identity_type') is-invalid @enderror" name="identity_type" id="identity_type">
                                                    <option value="">Select Type</option>
                                                    <option value="KTP">KTP</option>
                                                    <option value="SIM">SIM</option>
                                                    <option value="Passport">Passport</option>
                                                </select>
                                                @error('identity_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Identity Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control form-control-sm @error('identity_number') is-invalid @enderror" name="identity_number" id="identity_number" value="{{ old('identity_number') }}">
                                                @error('identity_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Identity Expiry Date</label>
                                                <input type="text" class="form-control form-control-sm datetimepicker @error('identity_exp_date') is-invalid @enderror" name="identity_exp_date" id="identity_exp_date" value="{{ old('identity_exp_date') }}">
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input" id="checkIDexpired">
                                                    <label class="custom-control-label text-muted" for="checkIDexpired">Permanent</label>
                                                </div>
                                                @error('identity_expired')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control form-control-sm @error('zipcode') is-invalid @enderror" name="zipcode" id="zipcode" value="{{ old('zipcode') }}">
                                                @error('zipcode')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('city') is-invalid @enderror" name="city" id="city" value="{{ old('city') }}">
                                                @error('city')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('state') is-invalid @enderror" name="state" id="state" value="{{ old('state') }}">
                                                @error('state')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Citizen ID Address</label>
                                                <textarea rows="3" cols="4" class="form-control @error('address_id') is-invalid @enderror" name="address_id" id="address_id"> {{ old('address_id') }} </textarea>
                                                @error('address_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input" id="checkAddressId">
                                                    <label class="custom-control-label text-muted" for="checkAddressId">Use a residential adresss</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Residential Address</label>
                                                <textarea rows="3" cols="4" class="form-control @error('address_residential') is-invalid @enderror" name="address_residential" id="address_residential"></textarea>
                                                @error('address_residential')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>

                            <h4 class="card-title">Employment Data</h4>
                            <div class="row justify-content-md-center">
                                <div class="col-sm-9">
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employee ID <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-sm @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" value="{{ old('employee_id') }}">
                                                @error('employee_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Barcode <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control form-control-sm @error('pincode') is-invalid @enderror" name="pincode" id="pincode" value="{{ old('pincode') }}">
                                                @error('pincode')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employement Status <span class="text-danger">*</span></label>
                                                <select class="form-select form-select-sm @error('contract_type') is-invalid @enderror" name="contract_type" id="contract_type">
                                                    <option value="">Select Type</option>
                                                    @foreach ($contract_type as $data)
                                                        <option value="{{ $data->contract_type_id }}">{{ $data->contract_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('contract_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Join date <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control datetimepicker form-control-sm @error('date_of_joining') is-invalid @enderror" name="date_of_joining" id="date_of_joining" value="{{ old('date_of_joining') }}">
                                                @error('date_of_joining')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End status date</label>
                                                <input type="text" class="form-control datetimepicker form-control-sm" name="end_status_date" id="end_status_date" value="{{ old('end_status_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Branch <span class="text-danger">*</span></label>
                                                <select class="form-select @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                                                    <option value="">Select Branch</option>
                                                    @foreach ($branch as $data)
                                                        <option value="{{ $data->location_id }}">{{ $data->location_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('location_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Organization <span class="text-danger">*</span></label>
                                                <select class="select @error('department_id') is-invalid @enderror" name="department_id" id="department_id">
                                                </select>
                                                @error('department_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Job Position <span class="text-danger">*</span></label>
                                                <select class="select @error('designation_id') is-invalid @enderror" name="designation_id" id="designation_id">
                                                </select>
                                                @error('designation_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Schedule Shift <span class="text-danger">*</span></label>
                                                <select class="form-select @error('office_shift_id') is-invalid @enderror" name="office_shift_id" id="office_shift_id">
                                                    <option value="">Select Shift</option>
                                                    @foreach ($shift as $data)
                                                        <option value="{{ $data->office_shift_id }}">{{ $data->shift_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('office_shift_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Approval Line</label>
                                                <select class="select" name="reports_to" id="reports_to">
                                                </select>
                                                @error('reports_to')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <h4 class="card-title">Salary</h4>
                            <div class="row justify-content-md-center">
                                <div class="col-sm-9">
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Basic Salary</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text" id="sizing-addon3">Rp</span>
                                                    <input type="text" class="form-control form-control-sm @error('basic_salary') is-invalid @enderror" name="basic_salary" id="basic_salary" value="{{ old('basic_salary') }}" placeholder="Exs : 1000000 (tanpa titik (.))" aria-describedby="sizing-addon3">
                                                </div>
                                                @error('basic_salary')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="d-block">Salary Type <span class="text-danger">*</span> :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="wages_type" id="wages_type_month" value="M">
                                                    <label class="form-check-label" for="wages_type_month">Monthly</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="wages_type" id="wages_type_daily" value="D">
                                                    <label class="form-check-label" for="wages_type_daily">Daily</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="wages_type" id="wages_type_contractor" value="C">
                                                    <label class="form-check-label" for="wages_type_contractor">Piecework Workers</label>
                                                </div>
                                                @error('wages_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Schedule</label>
                                                <select class="select" name="" id="">
                                                    <option>Select Schedule</option>
                                                </select>
                                                @error('')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="d-block">Allowed For Overtime <span class="text-danger">*</span> :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="allow_overtime" id="allow_overtime_yes" value="Yes">
                                                    <label class="form-check-label" for="allow_overtime_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="allow_overtime" id="allow_overtime_no" value="No">
                                                    <label class="form-check-label" for="allow_overtime_no">No</label>
                                                </div>
                                                @error('allow_overtime')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('employee') }}" class="btn btn-default">Cancel</a>
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
            <script>
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                });

                $(document).on('change', '#location_id', function() {
                    var idLocation = this.value;
                    $("#department_id").html('');
                    $.ajax({
                        url: "{{ url('api/fetch-department') }}",
                        type: "POST",
                        data: {
                            location_id: idLocation,
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#department_id').html('<option value="">-- Select Organization --</option>');
                            $.each(result.department, function(key, value) {
                                $("#department_id").append('<option value="' + value.department_id + '">' + value.department_name + '</option>');
                            });
                        }
                    });
                });
                $(document).on('change', '#department_id', function() {
                    var idDept = this.value;
                    $("#designation_id").html('');
                    $.ajax({
                        url: "{{ url('api/fetch-designation') }}",
                        type: "POST",
                        data: {
                            department_id: idDept,
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#designation_id').html('<option value="">-- Select Job Position--</option>');
                            $.each(result.designation, function(key, value) {
                                $("#designation_id").append('<option value="' + value.designation_id + '">' + value.designation_name + '</option>');
                            });
                        }
                    });
                });

                $(document).on('click', '#checkIDexpired', function() {
                    if ($('#checkIDexpired:checked').length > 0) {
                        $('#identity_exp_date').val('');
                        $('#identity_exp_date').attr('placeholder', 'Permanent');
                        $('#identity_exp_date').prop('readonly', true);
                    } else {
                        $('#identity_exp_date').removeAttr('placeholder');
                        $('#identity_exp_date').prop('readonly', false);
                    }
                });


                $(document).on('click', '#checkAddressId', function() {
                    if ($('#checkAddressId:checked').length > 0) {
                        let address_id = $('#address_id').val();
                        $('#address_residential').val(address_id);
                        $('#address_residential').prop('readonly', true);
                    } else {
                        $('#address_residential').val('');
                        $('#address_residential').prop('readonly', false);
                    }
                });
            </script>
        @endslot

</x-app-layout>
