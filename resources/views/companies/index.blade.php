<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">
    @endslot
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Companies</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Companies</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="{{ route('companies.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Company</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $key => $company)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->address_1 . ' ' . $company->address_2 }}</td>
                                    <td>{{ $company->city }}</td>
                                    <td>{{ $company->state }}</td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('companies.destroy', $company->company_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('companies.edit', $company->company_id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <button type="submit" class="dropdown-item" id="{{ $company->company_id }}-delete-btn"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-sm" colspan="4">Data post tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @slot('custom_script')
        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                @if (Session::has('success'))
                    toastr.success("{{ Session::get('success') }}");
                @endif
                @if (Session::has('update'))
                    toastr.info("{{ Session::get('update') }}");
                @endif
                @if (Session::has('delete'))
                    toastr.error("{{ Session::get('delete') }}");
                @endif
            })
        </script>
    @endslot
</x-app-layout>
