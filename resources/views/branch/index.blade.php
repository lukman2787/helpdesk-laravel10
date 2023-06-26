<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">
    @endslot
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Branch</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Office Location</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="{{ route('branch.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Branch</a>
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
                                <th>Company</th>
                                <th>Location Name</th>
                                <th>Head of Location</th>
                                <th>Address</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($branch as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->company_name }}</td>
                                    <td>{{ $data->location_name }}</td>
                                    <td>{{ $data->first_name }}</td>
                                    <td>{{ $data->address_1 . ' ' . $data->address_2 . ' ' . $data->city . ' ' . $data->state }}</td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <form onsubmit="return confirm('Are you sure ?');" action="{{ route('branch.destroy', $data->location_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('branch.edit', $data->location_id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <button type="submit" class="dropdown-item" id="{{ $data->location_id }}-delete-btn"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-sm" colspan="6">No data available</td>
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
