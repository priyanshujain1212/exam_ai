<?php



// app/Http/Controllers/MockTestController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MockTest;

class MockTestController extends Controller
{
    // Generate a mock test based on the exam selected
    public function getMockTests($exam)
    {
        // Fetch mock tests from the database or AI system
        // MockTest::where('exam', $exam)->get();

        return response()->json([
            ['title' => 'Mock Test 1', 'description' => 'Sample description'],
            ['title' => 'Mock Test 2', 'description' => 'Sample description'],
        ]);
    }
}
