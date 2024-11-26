<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\BackendController;
use App\Http\Requests\AdministratorRequest;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class StudentController extends BackendController
{
    public function __construct()
    {
        $this->data['siteTitle'] = 'Students';

        $this->middleware(['permission:students'])->only('index');
        $this->middleware(['permission:students_create'])->only('create', 'store');
        $this->middleware(['permission:students_edit'])->only('edit', 'update');
        $this->middleware(['permission:students_delete'])->only('destroy');
        $this->middleware(['permission:students_show'])->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.students.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( AdministratorRequest $request)
    {
        $user             = new User;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->username   = $request->username ?? $this->username($request->email);
        $user->password   = Hash::make(request('password'));
        $user->phone      = $request->phone;
        $user->address    = $request->address;
        $user->status     = $request->status;
        $user->save();

        if (request()->file('image')) {
            $user->addMedia(request()->file('image'))->toMediaCollection('user');
        }

        $role = Role::find(1);
        $user->assignRole($role->name);

        return redirect(route('admin.students.index'))->withSuccess('The Data Inserted Successfully');
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

        return view('admin.students.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = Students::findOrFail($id);

        if (($user->id != 1) || (auth()->id() == 1)) {
            $this->data['user'] = $user;
            return view('admin.students.edit', $this->data);
        }
        return redirect(route('admin.students.index'))->withError('You don\'t have permission to edit this data');
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

            return redirect(route('admin.students.index'))->withSuccess('The Data Updated Successfully');
        }
        return redirect(route('admin.students.index'))->withError('You don\'t have permission to update this data');
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
            return redirect(route('admin.students.index'))->withSuccess('The Data Deleted Successfully');
        } else {
            return redirect(route('admin.students.index'))->withError('You don\'t have permission to delete this data');
        }
    }

    public function getStudents()
    {
        // Fetch all students from the 'students' table
        $students = Students::all(); 
    
        $studentArray = [];
        $i = 1;
    
        // Check if students exist and format them
        if ($students->isNotEmpty()) {
            foreach ($students as $student) {
                $studentArray[$i] = [
                    'id' => $student->id,
                    'name' => $student->name,
                    'organization' => $student->organization,
                    'exam' => $student->exam,
                    'free_mock_tests' => $student->free_mock_tests,
                    'is_registered' => $student->is_registered,
                    'setID' => $i,  // Custom indexing for row numbering
                ];
                $i++;
            }
        }
    
        // Return the data using Datatables
        return Datatables::of($studentArray)
            ->addColumn('action', function ($student) {
                $actions = '';
    
                if (auth()->user()->can('students_show')) {
                    $actions .= '<a href="' . route('admin.students.show', $student['id']) . '" class="btn btn-sm btn-icon float-left btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></a>';
                }
    
                if (auth()->user()->can('students_edit')) {
                    $actions .= '<a href="' . route('admin.students.edit', $student['id']) . '" class="btn btn-sm btn-icon float-left btn-primary ml-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>';
                }
    
                return $actions;
            })
           
            ->editColumn('id', function ($student) {
                return $student['setID']; // Show custom index number
            })
            ->escapeColumns([])
            ->make(true);
    }
    

    private function username($email)
    {
        $emails = explode('@', $email);
        return $emails[0] . mt_rand();
    }
}
