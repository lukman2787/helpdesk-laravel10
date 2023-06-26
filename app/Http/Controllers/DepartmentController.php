<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use DataTables;


class DepartmentController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            // $data = Departments::latest()->get();
            $data = Departments::select('department_id', 'company_id', 'location_id', 'department_name')->get();
            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<button type="button" data-id="' . $row->department_id . '" class="btn btn-primary btn-sm editDept"><i class="fa fa-pencil m-r-5"></i></button>';

                    $btn = $btn . ' <button data-id="' . $row->department_id . '" class="btn btn-danger btn-sm deleteDept"><i class="fa fa-trash-o m-r-5"></i></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('departments.index');
    }

    public function store(Request $request)
    {
        Departments::updateOrCreate(
            [
                'department_id' => $request->department_id
            ],
            [
                'company_id' => '1',
                'location_id' => '1',
                'department_name' => $request->department_name,
                'added_by' => '1'
            ]
        );
        return response()->json(['success' => 'Product saved successfully.']);
    }

    public function edit($id)
    {
        $department = Departments::where('department_id', $id)->first();
        return response()->json($department);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'department_name'     => 'required|min:2',
        ]);

        $data = [
            'company_id' => '1',
            'location_id' => '1',
            'department_name' => $request->department_name,
            'added_by' => '1'
        ];

        Departments::where('department_id', $id)->update($data);
        return response()->json(['success' => 'Data saved successfully.']);
    }

    public function destroy(string $id)
    {
        Departments::where('department_id', $id)->delete();
        return response()->json(['deleted' => 'Your file has been deleted.']);
    }
}
