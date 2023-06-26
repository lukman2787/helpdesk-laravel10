<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Departments;
use App\Models\Designations;
use DataTables;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            // $data = Departments::latest()->get();
            $data = Designations::join('departments', 'designations.department_id', '=', 'departments.department_id')
                ->select('designations.designation_id', 'designations.company_id', 'designations.department_id', 'designations.designation_name', 'departments.department_name')
                ->get();
            return Datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $action = '<div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button type="button" class="dropdown-item editDesignation" data-id="' . $row->designation_id . '"><i class="fa fa-pencil m-r-5"></i> Edit</button>
                                        <button type="button" class="dropdown-item deleteDesignation" data-id="' . $row->designation_id . '"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                    </div>
                                </div>';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('designations.index', [
            'departments' => Departments::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'designation_name'  => 'required|unique:designations',
            'department_id'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        Designations::Create(
            [
                'department_id' => $request->department_id,
                'sub_department_id' => '0',
                'company_id' => '1',
                'designation_name' => $request->designation_name,
                'added_by' => '1',
                'status' => '1',
            ]
        );
        return response()->json(['success' => 'Data saved successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $designation = Designations::join('departments', 'designations.department_id', '=', 'departments.department_id')
            ->select('designations.designation_id', 'designations.company_id', 'designations.department_id', 'designations.designation_name', 'departments.department_name')
            ->where('designation_id', $id)->first();
        return response()->json($designation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'designation_name'  => 'required|unique:designations',
            'department_id'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        $data = [
            'department_id' => $request->department_id,
            'designation_name' => $request->designation_name,
        ];

        Designations::where('designation_id', $id)->update($data);
        return response()->json(['success' => 'Data saved successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Designations::where('designation_id', $id)->delete();
        return response()->json(['deleted' => 'Your file has been deleted.']);
    }
}
