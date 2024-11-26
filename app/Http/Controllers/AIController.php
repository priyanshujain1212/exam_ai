<?php
namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Exam;
use Illuminate\Http\Request;

class AIController extends Controller
{
    /**
     * Store organizations and their exams in the database.
     */
    public function storeData(Request $request)
    {
        $data = $request->validate([
            'data' => 'required|array',
            'data.*.organization' => 'required|string',
            'data.*.exams' => 'required|array',
            'data.*.exams.*.name' => 'required|string',
        ]);

        foreach ($data['data'] as $item) {
            $organizationName = $item['organization'];
            $organization = Organization::firstOrCreate([
                'name' => $organizationName,
            ], [
                'website_url' => $item['website_url'] ?? null,
            ]);

            foreach ($item['exams'] as $exam) {
                // Store each exam for the respective organization
                Exam::create([
                    'organization_id' => $organization->id,
                    'name' => $exam['name'],
                    'exam_url' => $exam['exam_url'] ?? null,
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Data stored successfully.']);
    }

    /**
     * Fetch organizations and their exams.
     */
    public function fetchOrganizations()
    {
        // Eager load the exams for each organization
        $organizations = Organization::with('exams')->get();
        return response()->json($organizations);
    }
}
