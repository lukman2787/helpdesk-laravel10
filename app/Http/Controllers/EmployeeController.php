<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Office_location as Branch;
use App\Models\Departments;
use App\Models\Designations;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        if ($request->ajax()) {

            $data = Employees::join('designations', 'employees.designation_id', '=', 'designations.designation_id')
                ->leftJoin('sub_departments', 'employees.sub_department_id', '=', 'sub_departments.sub_department_id')
                ->join('departments', 'designations.department_id', '=', 'departments.department_id')
                ->join('office_locations', 'employees.location_id', '=', 'office_locations.location_id')
                ->join('contract_type', 'employees.contract_type', '=', 'contract_type.contract_type_id')
                ->select('employees.id', 'employees.employee_id', 'employees.first_name', 'employees.last_name', 'employees.email', 'employees.phone', 'office_locations.location_name', 'departments.department_name', 'designations.designation_name', 'contract_type.contract_name', 'employees.date_of_joining', 'employees.end_status_date', 'employees.date_of_leaving', 'employees.pincode', 'employees.profile_picture')
                ->get();

            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $check_employee = '<label class="container-checkbox">
                                        <input type="checkbox" class="coacheck" name="emp_checked[]" value="' . $row->id . '">
                                        <span class="checkmark"></span>
                                    </label>';
                    return $check_employee;
                })
                ->addColumn('employee_name', function ($row) {
                    $employeeName = '
                                    <h2 class="table-avatar">
                                        <a href="' . route('employee.show', $row->id) . '" class="avatar"><img alt src="/img/profiles/' . $row->profile_picture . '" alt="profile_picture"></a>
                                        <a href="' . route('employee.edit', $row->id) . '" class="btn btn-link">' . $row->first_name . ' ' . $row->last_name . ' - <span>' . $row->designation_name . '</span></a>
                                    </h2>
                    ';

                    return $employeeName;
                })
                ->rawColumns(['action', 'employee_name'])
                ->make(true);
        }

        return view('employees.index', [
            'designations' => Designations::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create', [
            'contract_type' => DB::table('contract_type')->orderBy('contract_type_id', 'asc')->get(),
            'shift' => DB::table('office_shift')->orderBy('office_shift_id', 'asc')->get(),
            'branch' => Branch::latest()->get(),
            'departments' => Departments::latest()->get(),
        ]);
    }

    public function bulk_add()
    {
        return view('employees.bulkadd',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'        => 'required|min:3',
            'email'             => 'required|unique:employees',
            'contact_no'        => 'required',
            'place_of_birth'    => 'required',
            'date_of_birth'     => 'required',
            'gender'            => 'required',
            'identity_type'     => 'required',
            'identity_number'   => 'required',
            'marital_status'    => 'required',
            'religion'          => 'required',
            'address_id'        => 'required',
            'city'              => 'required',
            'state'             => 'required',
            'location_id'       => 'required',
            'employee_id'       => 'required|unique:employees',
            'pincode'           => 'required|unique:employees',
            'contract_type'     => 'required',
            'date_of_joining'   => 'required',
            'office_shift_id'   => 'required',

        ]);

        $input = $request->all();
        $input['company_id'] = '1';
        $input['sub_department_id'] = '0';
        $input['profile_picture'] = 'user_default.jpg';

        Employees::create($input);

        return redirect()->route('employee.index')->with(['success' => 'Data saved successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Employees::join('designations', 'employees.designation_id', '=', 'designations.designation_id')
            ->leftJoin('sub_departments', 'employees.sub_department_id', '=', 'sub_departments.sub_department_id')
            ->join('departments', 'designations.department_id', '=', 'departments.department_id')
            ->join('office_locations', 'employees.location_id', '=', 'office_locations.location_id')
            ->join('contract_type', 'employees.contract_type', '=', 'contract_type.contract_type_id')
            ->select(
                'employees.id',
                'employees.employee_id',
                'employees.first_name',
                'employees.last_name',
                'employees.username',
                'employees.gender',
                'employees.email',
                'employees.phone',
                'office_locations.location_name',
                'departments.department_name',
                'designations.designation_name',
                'contract_type.contract_name',
                'employees.date_of_joining',
                'employees.end_status_date',
                'employees.date_of_leaving',
                'employees.pincode',
                'employees.contact_no',
                'employees.profile_picture',
                'employees.place_of_birth',
                'employees.date_of_birth',
                'employees.address_id',
                'employees.city',
                'employees.state',
            )->where('id', $id)->first();
        return view('employees.show', ['profile' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Employees::join('designations', 'employees.designation_id', '=', 'designations.designation_id')
            ->leftJoin('sub_departments', 'employees.sub_department_id', '=', 'sub_departments.sub_department_id')
            ->join('departments', 'designations.department_id', '=', 'departments.department_id')
            ->join('office_locations', 'employees.location_id', '=', 'office_locations.location_id')
            ->join('contract_type', 'employees.contract_type', '=', 'contract_type.contract_type_id')
            ->select(
                'employees.id',
                'employees.employee_id',
                'employees.first_name',
                'employees.last_name',
                'employees.username',
                'employees.gender',
                'employees.email',
                'employees.phone',
                'employees.marital_status',
                'employees.blood_group',
                'employees.religion',
                'employees.identity_type',
                'employees.identity_number',
                'employees.identity_exp_date',
                'office_locations.location_name',
                'departments.department_name',
                'designations.designation_name',
                'employees.contract_type',
                'contract_type.contract_name',
                'employees.date_of_joining',
                'employees.end_status_date',
                'employees.date_of_leaving',
                'employees.pincode',
                'employees.contact_no',
                'employees.profile_picture',
                'employees.place_of_birth',
                'employees.date_of_birth',
                'employees.address_id',
                'employees.address_residential',
                'employees.zipcode',
                'employees.city',
                'employees.state',
            )
            ->where('id', $id)->first();
        return view('employees.edit', [
            'row' => $data,
            'contract_type' => DB::table('contract_type')->orderBy('contract_type_id', 'asc')->get(),
            'shift' => DB::table('office_shift')->orderBy('office_shift_id', 'asc')->get(),
            'branch' => Branch::latest()->get(),
            'departments' => Departments::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
