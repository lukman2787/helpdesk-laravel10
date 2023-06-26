<x-app-layout>
    @slot('custom_style')
        <link rel="stylesheet" href="/css/dataTables.bootstrap4.min.css">
    @endslot

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Edit Role</h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Role Name <span class="text-danger">*</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') ?? $role->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Module Permission</th>
                                    <th class="text-center checkBox">
                                        <label for="select_all_permission" class="container-checkbox">
                                            <input type="checkbox" id="select_all_permission">
                                            <span class="checkmark">All</span>
                                        </label>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permission as $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td class="text-center">
                                            <input type="checkbox" class="checkPermission" name="permission[]" value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : null }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary submit-btn">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @slot('custom_script')
        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).on('click', '#select_all_permission', function() {
                if (this.checked) {
                    $('.checkPermission').each(function() {
                        this.checked = true;
                    })
                } else {
                    $('.checkPermission').each(function() {
                        this.checked = false;

                    })
                }
            });

            $(document).on('click', '.checkPermission', function() {
                if ($('.checkPermission:checked').length == $('.checkPermission').length) {
                    $('#select_all_permission').prop('checked', true);
                } else {
                    $('#select_all_permission').prop('checked', false);
                }
            });
        </script>
    @endslot
</x-app-layout>
