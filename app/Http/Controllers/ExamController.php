<?php


namespace App\Http\Controllers;
use App\Models\Organisations;
use App\Models\Students;
use App\Models\Exams;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    // Fetch dropdown data (organizations and exams)
    public function fetchOrganizations()
    {
        
        $organizations = Organisations::select('name')->get();
        return response()->json([
            'organizations' => $organizations,
        ]);
    }

public function getExamsByOrganization($organization)
{

    $exams = Exams::select('Exam')->where('organization' , $organization)->get();
    return response()->json([
        'exams' => $exams,
    ]);
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'organization' => 'required|string',
        'exam' => 'required|string',
    ]);

    // Store the student details
    $student = Students::create($data);
    
    return response()->json(['success' => true, 'student' => $student]);
}

// Fetch student's mock tests
public function getMockTests($exam)
{
    $mockTests = MockTest::where('exam', $exam)->get();
    return response()->json($mockTests);
}


}