<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnalysisController extends Controller
{
    /**
     * Analyze student performance using the AI system.
     */
    public function analyzePerformance(Request $request)
    {
        try {
            // Get student responses from the request
            $responses = $request->input('responses');

            // Call the AI system API
            $response = Http::post('http://127.0.0.1:5000/analyze-performance', [
                'responses' => $responses,
            ]);

            if ($response->successful()) {
                $analysis = $response->json()['analysis'];

                return response()->json([
                    'success' => true,
                    'message' => 'Performance analysis completed successfully.',
                    'data' => $analysis,
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to analyze performance.',
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
