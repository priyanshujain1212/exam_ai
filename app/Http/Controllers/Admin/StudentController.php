<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BackendController;
use App\Http\Requests\StudentRequest;
use App\User;
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
        return view('admin.student.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      

        $this->data['student'] = Student::all();
        return view('admin.student.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find(2);

        $this->data['user'] = User::role($role->name)->findOrFail($id);
        return view('admin.student.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $role = Role::find(2);
        $user = User::role($role->name)->findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->username   = $request->username ?? $this->username($request->email);

        if ($request->password) {
            $user->password = Hash::make(request('password'));
        }

        $user->phone   = $request->phone;
        $user->address = $request->address;
        $user->status  = $request->status;
        $user->save();

        if (request()->file('image')) {
            $user->media()->delete();
            $user->addMedia(request()->file('image'))->toMediaCollection('user');
        }

        $role = Role::find(2);
        $user->assignRole($role->name);

        return redirect(route('admin.students.index'))->withSuccess('The Data Updated Successfully');
    }

    public function getStudents()
{
    // Fetch students from the 'students' table
    $students = Student::all();  // Or use any condition to fetch specific students
    dd($students);
    $studentArray = [];
    $i = 1;

    // Check if there are students and format them
    if ($students->isNotEmpty()) {
        foreach ($students as $student) {
            // Assign the data in the desired format
            $studentArray[$i] = [
                'id' => $student->id,
                'name' => $student->name,
                'organization' => $student->organization,
                'exam' => $student->exam,
                'free_mock_tests' => $student->free_mock_tests,
                'is_registered' => $student->is_registered,
                'created_at' => $student->created_at,
                'updated_at' => $student->updated_at,
                'setID' => $i,  // Custom field for indexing
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
            return $student['setID'];
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
