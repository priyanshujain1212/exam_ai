<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\BackendController;
use App\Http\Requests\ExamsRequest;
use App\Models\Exams;
use App\Models\Organisations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class ExamsController extends BackendController
{
    public function __construct()
    {
        $this->data['siteTitle'] = 'Exams';

        $this->middleware(['permission:exams'])->only('index');
        $this->middleware(['permission:exams_create'])->only('create', 'store');
        $this->middleware(['permission:exams_edit'])->only('edit', 'update');
        $this->middleware(['permission:exams_delete'])->only('destroy');
        $this->middleware(['permission:exams_show'])->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.exams.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['organizations'] = Organisations::get();
        return view('admin.exams.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
         ]);

    // Save data
    Exams::create([
        'Exam' => $request->name,
        'organization' => $request->organisation_name,
    ]);

    return redirect()->route('admin.exams.index')->with('success', 'Exams added successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find(1);

        $this->data['user'] = User::role($role->name)->findOrFail($id);

        return view('admin.exams.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find(1);
        $user = User::role($role->name)->findOrFail($id);

        if (($user->id != 1) || (auth()->id() == 1)) {
            $this->data['user'] = $user;
            return view('admin.exams.edit', $this->data);
        }
        return redirect(route('admin.exams.index'))->withError('You don\'t have permission to edit this data');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( AdministratorRequest $request, $id)
    {
        $role = Role::find(1);
        $user = User::role($role->name)->findOrFail($id);

        if (($user->id != 1) || (auth()->id() == 1)) {

            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email      = $request->email;
            $user->username   = $request->username ?? $this->username($request->email);

            if ($request->password) {
                $user->password = Hash::make(request('password'));
            }

            $user->phone   = $request->phone;
            $user->address = $request->address;
            if ($user->id != 1) {
                $user->status = $request->status;
            } else {
                $user->status = UserStatus::ACTIVE;
            }
            $user->save();

            if (request()->file('image')) {
                $user->media()->delete();
                $user->addMedia(request()->file('image'))->toMediaCollection('user');
            }

            $role = Role::find(1);
            $user->assignRole($role->name);

            return redirect(route('admin.exams.index'))->withSuccess('The Data Updated Successfully');
        }
        return redirect(route('admin.exams.index'))->withError('You don\'t have permission to update this data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find(1);
        $user = User::role($role->name)->findOrFail($id);
        if (($user->id != 1) && (auth()->id() == 1)) {
            $user->delete();
            return redirect(route('admin.exams.index'))->withSuccess('The Data Deleted Successfully');
        } else {
            return redirect(route('admin.exams.index'))->withError('You don\'t have permission to delete this data');
        }
    }

    public function getExams()
    {
        // Fetch all records from the exams table
        $exams = Exams::all();
    
        $examArray = [];
        $index = 1;
    
        if (!$exams->isEmpty()) {
            foreach ($exams as $exam) {
                $examArray[$index] = $exam; // Add exam details to the array
                $examArray[$index]['setID'] = $index; // Add a sequential ID
                $index++;
            }
        }
    
        return Datatables::of($examArray)
            ->addColumn('action', function ($exam) {
                $actionButtons = '';
    
                // Actions for Admin User (ID 1)
                if ((auth()->id() == 1) || ($exam->id == auth()->id())) {
                    if (auth()->user()->can('exams_show')) {
                        $actionButtons .= '<a href="' . route('admin.exams.show', $exam) . '" class="btn btn-sm btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></a>';
                    }
    
                    if (auth()->user()->can('exams_edit')) {
                        $actionButtons .= '<a href="' . route('admin.exams.edit', $exam) . '" class="btn btn-sm btn-icon btn-primary ml-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>';
                    }
    
                    if (auth()->user()->can('exams_delete')) {
                        $actionButtons .= '<form class="d-inline" action="' . route('admin.exams.destroy', $exam) . '" method="POST">' 
                            . csrf_field() . method_field('DELETE') 
                            . '<button class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></form>';
                    }
                }
    
                return $actionButtons;
            })
            ->addColumn('organization', function ($exam) {
                // Display organization name
                return $exam->organization;
            })
            ->addColumn('exam', function ($exam) {
                // Display exam name
                return $exam->Exam;
            })
            ->editColumn('id', function ($exam) {
                // Replace ID with setID
                return $exam->setID;
            })
            ->escapeColumns([]) // Prevent escaping of HTML content in action buttons
            ->make(true);
    }
    

    private function username($email)
    {
        $emails = explode('@', $email);
        return $emails[0] . mt_rand();
    }
}
