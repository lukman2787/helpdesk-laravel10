<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Office_location as Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $branch_data = Branch::join('companies', 'office_locations.company_id', '=', 'companies.company_id')
            ->leftJoin('employees', 'office_locations.location_head', '=', 'employees.id')
            ->select('office_locations.*', 'companies.company_name', 'employees.first_name', 'employees.last_name')
            ->orderBy('location_id', 'desc')
            ->get();

        return view('branch.index', [
            'branch' => $branch_data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branch.create', [
            'company' => DB::table('companies')->orderBy('company_id', 'asc')->get(),
            'employees' => DB::table('employees')->orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'location_name'     => 'required|min:3',
            'company_id'   => 'required',
            'address_1'   => 'required'
        ]);

        Branch::create([
            'company_id'   => $request->company_id,
            'location_name' => $request->location_name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'fax' => $request->fax,
            'phone' => $request->phone,
            'location_head' => $request->location_head,
        ]);
        return redirect()->route('branch.index')->with(['success' => 'Data has been successfully submitted.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get company by ID
        $company = Branch::where('location_id', $id)->first();

        //render view with company
        return view('branch.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Branch::where('location_id', $id)->first();
        return view('branch.edit', [
            'row' => $data,
            'company' => DB::table('companies')->orderBy('company_id', 'asc')->get(),
            'employees' => DB::table('employees')->orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'location_name'     => 'required|min:3',
            'company_id'   => 'required',
            'address_1'   => 'required'
        ]);

        $data = [
            'company_id'   => $request->company_id,
            'location_name' => $request->location_name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'fax' => $request->fax,
            'phone' => $request->phone,
            'location_head' => $request->location_head,
        ];
        Branch::where('location_id', $id)->update($data);
        return redirect()->route('branch.index')->with(['update' => 'Data successfully updated !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Branch::where('location_id', $id)->delete();
        return back()->with(['delete' => 'Data deleted successfully !']);
    }
}
