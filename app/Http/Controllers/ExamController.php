<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    // Fetch dropdown data (organizations and exams)
    public function getorganisationexam()
    {
        // Example data, could be fetched from a database if needed
        $organizations = ['Insurance', 'Banking', 'Government'];
        $exams = [' A', ' B', ' C'];

        return response()->json([
            'organizations' => $organizations,
            'exams' => $exams,
        ]);
    }
}
