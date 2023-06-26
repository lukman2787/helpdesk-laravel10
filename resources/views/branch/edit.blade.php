<x-app-layout>
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Branch Settings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Office Location</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Form Edit</h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Branch Information</h4>
                        <form action="{{ route('branch.update', $row->location_id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Company</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-select @error('company_id') is-invalid @enderror" name="company_id">
                                                <option value=""> - Select Company -</option>
                                                @foreach ($company as $comp)
                                                    <option value="{{ $comp->company_id }}" {{ $row->company_id == $comp->company_id ? 'selected' : null }}>{{ $comp->company_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('company_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Branch Name</label>
                                        <div class="col-lg-8">
                                            <input class="form-control @error('location_name') is-invalid @enderror" type="text" name="location_name" value="{{ old('location_name') ?? $row->location_name }}">
                                            @error('location_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Head Of Branch</label>
                                        <div class="col-lg-8">
                                            <select class="form-control form-select @error('location_head') is-invalid @enderror">
                                                <option value=""> - Select Head -</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}" {{ $row->location_head == $employee->id ? 'selected' : null }}>{{ $employee->first_name . ' ' . $employee->last_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('location_head')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $row->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Phone</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $row->phone }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Fax</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax') ?? $row->fax }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title">Address</h4>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Address Line 1</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control @error('address_1') is-invalid @enderror" name="address_1" value="{{ old('addfress_1') ?? $row->address_1 }}">
                                            @error('address_1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Address Line 2</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control @error('address_2') is-invalid @enderror" name="address_2" value="{{ old('address_2') ?? $row->address_2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">State</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="state" value="{{ old('state') ?? $row->state }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">City</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="city" value="{{ old('city') ?? $row->city }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Postal Code</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="zipcode" value="{{ old('zipcode') ?? $row->zipcode }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('branch.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
