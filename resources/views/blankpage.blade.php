<x-app-layout>
    @slot('custom_style')
    @endslot

    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Blank Page</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="admin-dashboard.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ul>
                </div>
            </div>
        </div>
        Content Starts Here
    </div>

    @slot('custom_script')
    @endslot
</x-app-layout>
