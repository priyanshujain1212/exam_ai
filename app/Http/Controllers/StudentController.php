<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Exam;

class StudentController extends Controller
{
    // Store student data on the first login (including exam preferences)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'organization' => 'required|string',
            'exam' => 'required|string',
        ]);

        // Store the student details
        $student = Student::create($data);
        
        return response()->json(['success' => true, 'student' => $student]);
    }

    // Fetch student's mock tests
    public function getMockTests($exam)
    {
        $mockTests = MockTest::where('exam', $exam)->get();
        return response()->json($mockTests);
    }
}
