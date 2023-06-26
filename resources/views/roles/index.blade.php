<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">
    @endslot

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Roles & Permissions</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                <a href="{{ route('roles.create') }}" class="btn btn-primary w-100"><i class="fa fa-plus"></i> Add Roles</a>
                <div class="roles-menu">
                    <ul>
                        @foreach ($roles as $key => $role)
                            <li class="{{ $key == '0' ? 'active' : null }}">
                                <a href="javascript:void(0);">{{ $role->name }}
                                    <span class="role-action">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <span href="{{ route('roles.edit', $role->id) }}" class="action-circle large">
                                                <i class="material-icons">edit</i>
                                            </span>
                                            <span type="submit" class="action-circle large delete-btn">
                                                <i class="material-icons">delete</i>
                                            </span>
                                        </form>

                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                <h6 class="card-title m-b-20">Module Access</h6>
                <div class="m-b-30">
                    <ul class="list-group notification-list">
                        @foreach ($permission as $value)
                            <li class="list-group-item">
                                {{ $value->name }}
                                <div class="status-toggle">
                                    <input type="checkbox" id="module_{{ $value->id }}" class="check" checked>
                                    <label for="module_{{ $value->id }}" class="checktoggle">checkbox</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>Module Permission</th>
                                <th class="text-center">Read</th>
                                <th class="text-center">Write</th>
                                <th class="text-center">Create</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">Import</th>
                                <th class="text-center">Export</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permission as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="add_role" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Role</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Role Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive m-t-15">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th class="text-center checkBox">
                                            <label for="select_all_roles" class="container-checkbox">
                                                <input type="checkbox" id="select_all_roles">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        {{-- <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Create</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Import</th>
                                        <th class="text-center">Export</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permission as $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td class="text-center">
                                                <input type="checkbox" name="permission[]" value="{{ $value->id }}">
                                            </td>
                                            {{-- <td class="text-center">
                                                <input type="checkbox">
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox">
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox">
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox">
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox">
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox">
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @slot('custom_script')
        <script src="/js/moment.min.js"></script>
        <script src="/js/bootstrap-datetimepicker.min.js"></script>

        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap4.min.js"></script>
    @endslot
</x-app-layout>
