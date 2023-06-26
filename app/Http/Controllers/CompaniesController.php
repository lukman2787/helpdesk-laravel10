<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Companies::orderBy('company_id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create', [
            'comp_type' => DB::table('company_type')->orderBy('type_id', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name'     => 'required|min:3',
            'trading_name'   => 'required',
            'address_1'   => 'required'
        ]);

        Companies::create([
            'type_id'   => '5',
            'company_name' => $request->company_name,
            'trading_name' => $request->trading_name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'registration_no' => $request->registration_no,
            'government_tax' => $request->government_tax,
            'website_url' => $request->website_url,
        ]);
        return redirect()->route('companies.index')->with(['success' => 'Data saved successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get company by ID
        $company = Companies::where('company_id', $id)->first();

        //render view with company
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Companies::where('company_id', $id)->first();
        return view('companies.edit', ['row' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'company_name'     => 'required|min:3',
            'trading_name'   => 'required',
            'address_1'   => 'required'
        ]);

        $data = [
            'company_name' => $request->company_name,
            'trading_name' => $request->trading_name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'registration_no' => $request->registration_no,
            'government_tax' => $request->government_tax,
            'website_url' => $request->website_url,
        ];
        Companies::where('company_id', $id)->update($data);
        return back()->with(['update' => 'Data successfully updated !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Companies::find($id)->delete();
        Companies::where('company_id', $id)->delete();
        return back()->with(['delete' => 'Data deleted successfully !']);
    }
}
