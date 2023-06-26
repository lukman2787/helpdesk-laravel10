<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/select2.min.css">
        <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
    @endslot

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Employees</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashbaord') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Bulk add Employee</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('employee.store') }}" method="post">
                            @csrf
                            <div class="row justify-content-md-center">
                                <div class="col-sm-8">
                                    <div class="form-row row">

                                        <div class="col-md-12">
                                            <figure class="text-center">
                                                <blockquote class="blockquote">
                                                    <p>Download and Complete</p>
                                                </blockquote>
                                                <figcaption class="blockquote-footer">
                                                    Import Employee <cite title="Source Title">Data</cite>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                                <strong><i class="fa fa-file"></i></strong> Template_Bulk_Add_Employee.xlsx
                                                <a href="" class="btn btn-link"><i class="fa fa-download"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-info">Few Tips :</label>
                                                <ol class="list-group list-group-numbered">
                                                    <li class="list-group-item">Make sure employee ID Haven't used.</li>
                                                    <li class="list-group-item">Make sure your already create organization, branch, job position etc, in setting page.</li>
                                                    <li class="list-group-item">Check sheet "Instruction" on spreadsheet to read instruction.</li>
                                                    <li class="list-group-item">Check available option for employee in "Information Data"</li>
                                                </ol>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Upload spreadsheet</label>
                                                <input type="file" class="form-control">
                                                <span class="form-text text-muted">Recommended excel files (.xlsx)</span>
                                                @error('last_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="text-center mt-3">
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
            <script src="/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
            <script src="/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
            <script>
                $(document).ready(function() {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                });
            </script>
        @endslot

</x-app-layout>
