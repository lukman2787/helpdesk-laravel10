<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Employees;
use App\Models\Ticket_categories as Category;
use App\Models\Tickets;


class TicketController extends Controller
{
    public function index()
    {
        return view('support.tickets.index', [
            'categories' => Category::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('support.tickets.create', [
            'departments' => Departments::latest()->get(),
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'assigned_to'       => 'required',
            'priority'          => 'required',
            'category_id'       => 'required',
            'title'             => 'required',
            'description'       => 'required',
        ]);

        Tickets::create([
            'requester_id' => auth()->user()->employee_id,
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'category_id' => $request->category_id,
            'assigned_to' => $request->assigned_to,
        ]);


        return redirect()->route('myticket.index')
            ->with(['success' => 'Ticket has been created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Tickets::join('ticket_categories as T1', 'tickets.category_id', '=', 'T1.category_id')
            ->leftJoin('employees as T2', 'tickets.requester_id', '=', 'T2.id')
            ->leftJoin('designations as T3', 'T2.designation_id', '=', 'T3.designation_id')
            ->leftJoin('employees as T4', 'tickets.assigned_to', '=', 'T4.id')
            ->leftJoin('designations as T5', 'T4.designation_id', '=', 'T5.designation_id')
            ->select('tickets.ticket_id', 'tickets.requester_id', 'tickets.title', 'tickets.description', 'tickets.attach_file', 'tickets.status', 'tickets.priority', 'tickets.last_reply', 'tickets.category_id', 'T1.category_name', 'tickets.assigned_to', 'T2.first_name as request_firstname', 'T2.last_name as request_lastname', 'tickets.created_at', 'T2.profile_picture as request_pict', 'T4.first_name as assigned_firstname', 'T4.last_name as assigned_lastname', 'T4.profile_picture as assigned_pict', 'T5.designation_name')
            ->where('tickets.ticket_id', $id)->first();

        $status = $data->status;
        $issued_status = '';
        if ($status == 'O') {
            $issued_status = 'Open';
        } else if ($status == 'P') {
            $issued_status = 'In Progress';
        } else if ($status == 'R') {
            $issued_status = 'Reopened';
        } else if ($status == 'C') {
            $issued_status = 'Resolved or Closed';
        }

        return view('support.tickets.show', ['tickets' => $data, 'status' => $issued_status]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tickets::join('ticket_categories as T1', 'tickets.category_id', '=', 'T1.category_id')
            ->leftJoin('employees as T2', 'tickets.requester_id', '=', 'T2.id')
            ->leftJoin('designations as T3', 'T2.designation_id', '=', 'T3.designation_id')
            ->leftJoin('employees as T4', 'tickets.assigned_to', '=', 'T4.id')
            ->leftJoin('designations as T5', 'T4.designation_id', '=', 'T5.designation_id')
            ->select('tickets.ticket_id', 'tickets.requester_id', 'tickets.title', 'tickets.description', 'tickets.attach_file', 'tickets.status', 'tickets.priority', 'tickets.last_reply', 'tickets.category_id', 'T1.category_name', 'tickets.assigned_to', 'T2.first_name as request_firstname', 'T2.last_name as request_lastname', 'tickets.created_at', 'T2.profile_picture as request_pict', 'T4.first_name as assigned_firstname', 'T4.department_id as assigned_dept_id', 'T4.last_name as assigned_lastname', 'T4.profile_picture as assigned_pict', 'T5.designation_name')
            ->where('tickets.ticket_id', $id)->first();
        $dept_id = $data->assigned_dept_id;

        return view('support.tickets.edit', [
            'row' => $data,
            'departments' => Departments::latest()->get(),
            'assign_staff' => Employees::where("department_id", $dept_id)->get(),
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'assigned_to'       => 'required',
            'priority'          => 'required',
            'category_id'       => 'required',
            'title'             => 'required',
            'description'       => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'category_id' => $request->category_id,
            'assigned_to' => $request->assigned_to,
        ];

        Tickets::where('ticket_id', $id)->update($data);
        return redirect()->route('myticket.index')
            ->with(['update' => 'Ticket has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tickets::where('ticket_id', $id)->delete();
        return response()->json(['deleted' => 'Ticket deleted successfully']);
    }

    public function fetchMyticket(Request $request)
    {
        if ($request->ajax()) {

            $query_data = Tickets::join('ticket_categories as T1', 'tickets.category_id', '=', 'T1.category_id')
                ->leftJoin('employees as T2', 'tickets.requester_id', '=', 'T2.id')
                ->leftJoin('designations as T3', 'T2.designation_id', '=', 'T3.designation_id')
                ->leftJoin('employees as T4', 'tickets.assigned_to', '=', 'T4.id')
                ->leftJoin('designations as T5', 'T4.designation_id', '=', 'T5.designation_id')
                ->select('tickets.ticket_id', 'tickets.requester_id', 'tickets.title', 'tickets.description', 'tickets.attach_file', 'tickets.status', 'tickets.priority', 'tickets.last_reply', 'tickets.category_id', 'T1.category_name', 'tickets.assigned_to', 'T2.first_name as request_firstname', 'T2.last_name as request_lastname', 'tickets.created_at', 'T2.profile_picture as request_pict', 'T4.first_name as assigned_firstname', 'T4.last_name as assigned_lastname', 'T4.profile_picture as assigned_pict', 'T5.designation_name')
                ->where('requester_id', auth()->user()->employee_id)
                ->orderBy('tickets.ticket_id');

            if ($request->filter_title) {
                $data = $query_data->where('title', 'LIKE', "%$request->filter_title%")->get();
            } else if ($request->filter_status) {
                $data = $query_data->where('tickets.status', $request->filter_status)->get();
            } else if ($request->filter_priority) {
                $data = $query_data->where('tickets.priority', $request->filter_priority)->get();
            } else if ($request->filter_from_date) {
                $data = $query_data->where('tickets.created_at', '>=', $request->filter_from_date)->get();
            } else if ($request->filter_end_date) {
                $data = $query_data->where('tickets.created_at', '<=', $request->filter_end_date)->get();
            } else {
                $data = $query_data->get();
            }


            return datatables()::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->status == "C") {
                        $action = '';
                    } else {
                        $action = '<div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="' . route('myticket.edit', $row->ticket_id) . '" class="dropdown-item" data-id="' . $row->ticket_id . '"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <button type="button" class="dropdown-item btn-completed" data-id="' . $row->ticket_id . '"><i class="fa fa-check m-r-5"></i> Mark Completed</button>
                                            <button type="button" class="dropdown-item delTicket" data-id="' . $row->ticket_id . '"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                        </div>
                                    </div>';
                    }
                    return $action;
                })
                ->addColumn('ticket_subject', function ($row) {
                    $subject = '<h2>#' . $row->ticket_id . ' <a href="' . route('myticket.show', $row->ticket_id) . '" class="btn btn-link">' . $row->title . '</a></h2>
                    <small class="block text-ellipsis">
                        <span>To</span> <span class="text-muted">' . $row->assigned_firstname . ' ' . $row->assigned_lastname . '</span>
                        <span> / </span> <span class="text-muted">' . $row->designation_name . '</span> </span></br>
                        <span>Created at : <span class="text-muted">' . $row->created_at->format('d/M/Y') . '</span> </span>
                    </small>';
                    return $subject;
                })
                ->addColumn('assigned_staff', function ($row) {
                    $assignedStaff = '
                                    <h2 class="table-avatar">
                                        <a href="' . route('myticket.show', $row->ticket_id) . '" class="avatar"><img alt src="/img/profiles/' . $row->assigned_pict . '" alt="profile_picture"></a>
                                        <a href="#">' . $row->assigned_firstname . ' ' . $row->assigned_lastname . ' <span>' . $row->designation_name . '</a>
                                    </h2>
                    ';

                    return $assignedStaff;
                })
                ->addColumn('issued_status', function ($row) {
                    $status = $row->status;
                    $issued_status = '';
                    if ($status == 'O') {
                        $issued_status = '<span class="badge bg-inverse-info">' . $row->priority . ' - Open</span>';
                    } else if ($status == 'P') {
                        $issued_status = '<span class="badge bg-inverse-info">' . $row->priority . ' - In Progress</span>';
                    } else if ($status == 'R') {
                        $issued_status = '<span class="badge bg-inverse-warning">' . $row->priority . ' - Reopened</span>';
                    } else if ($status == 'C') {
                        $issued_status = '<span class="badge bg-inverse-success">' . $row->priority . ' -  Resolved or Closed</span>';
                    }
                    return $issued_status;
                })
                ->addColumn('created_at', function ($row) {
                    $date_format = $row->created_at->format('d/M/Y');
                    return $date_format;
                })

                ->rawColumns(['action', 'ticket_subject', 'assigned_staff', 'issued_status'])
                ->make(true);
        }
    }

    public function ticket_completed(Request $request, string $id)
    {
        Tickets::where('ticket_id', $id)->update(['status' => $request->status]);
        return response()->json(['closed' => 'Ticket has been closed successfully']);
    }

    public function ticket_reopened(Request $request, string $id)
    {
        Tickets::where('ticket_id', $id)->update(['status' => $request->status]);
        return response()->json(['reopened' => 'Ticket has been Reopen successfully']);
    }
}
