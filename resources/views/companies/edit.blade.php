<x-app-layout>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Company Settings</h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('companies.update', $row->company_id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company Name <span class="text-danger">*</span></label>
                                <input class="form-control @error('company_name') is-invalid @enderror" type="text" name="company_name" value="{{ old('company_name') ?? $row->company_name }}">
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Trading Name <span class="text-danger">*</span></label>
                                <input class="form-control @error('trading_name') is-invalid @enderror" type="text" name="trading_name" value="{{ old('trading_name') ?? $row->trading_name }}">
                                @error('trading_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Address line 1</label>
                                <input class="form-control @error('address_1') is-invalid @enderror" name="address_1" value="{{ old('address_1') ?? $row->address_1 }}" type="text">
                                @error('address_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Address line 2</label>
                                <input class="form-control" name="address_2" value="{{ old('address_2') ?? $row->address_2 }}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" name="city" value="{{ old('city') ?? $row->city }}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>State/Province</label>
                                <input class="form-control" name="state" value="{{ old('state') ?? $row->state }}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input class="form-control" name="zipcode" value="{{ old('zipcode') ?? $row->zipcode }}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{ old('email') ?? $row->email }}" type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" name="contact_number" value="{{ old('contact_number') ?? $row->contact_number }}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Registration Number</label>
                                <input class="form-control" name="registration_no" value="{{ old('registration_no') ?? $row->registration_no }}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Government Tax</label>
                                <input class="form-control" name="government_tax" value="{{ old('government_tax') ?? $row->government_tax }}" type="text">
                                <div class="invalid_feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Website Url</label>
                                <input class="form-control" name="website_url" value="{{ old('website_url') ?? $row->website_url }}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        @if (Session::has('update'))
            toastr.info("{{ Session::get('update') }}");
        @endif
    })
</script>
