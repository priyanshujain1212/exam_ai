<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    // Create a new subscription
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam' => 'required|string',
        ]);

        // Check if a valid subscription already exists for the selected exam
        $existingSubscription = Subscription::where('student_id', $data['student_id'])
            ->where('exam', $data['exam'])
            ->where('end_date', '>', Carbon::now()) // Active subscription
            ->first();

        if ($existingSubscription) {
            return response()->json(['success' => false, 'message' => 'You already have an active subscription for this exam.']);
        }

        // Create a new subscription (1-month duration)
        $subscription = Subscription::create([
            'student_id' => $data['student_id'],
            'exam' => $data['exam'],
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonth(),
        ]);

        return response()->json(['success' => true, 'subscription' => $subscription]);
    }

    // Fetch all subscriptions for a student
    public function getSubscriptions($studentId)
    {
        $subscriptions = Subscription::where('student_id', $studentId)->get();

        return response()->json(['success' => true, 'subscriptions' => $subscriptions]);
    }

    // Check subscription validity for a specific exam
    public function checkSubscription(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam' => 'required|string',
        ]);

        $subscription = Subscription::where('student_id', $data['student_id'])
            ->where('exam', $data['exam'])
            ->where('end_date', '>', Carbon::now())
            ->first();

        if ($subscription) {
            return response()->json(['success' => true, 'message' => 'Subscription is active.', 'subscription' => $subscription]);
        }

        return response()->json(['success' => false, 'message' => 'No active subscription for this exam.']);
    }
}
