<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\LearningSession;
use Illuminate\Http\Request;

class LearningSessionController extends Controller
{
    public function index()
    {
        $sessions = auth()->user()
            ->learningSessions()
            ->latest()
            ->paginate(10);

        return view('student.learning-sessions.index', compact('sessions'));
    }

    public function show(LearningSession $learningSession)
    {
        // Security check: student hanya boleh lihat miliknya
        $this->authorize('view', $learningSession);


        return view('student.learning-sessions.show', compact('learningSession'));
    }

    public function complete(LearningSession $learningSession)
    {
        $this->authorize('complete', $learningSession);

        auth()->user()->completedSessions()
            ->updateExistingPivot($learningSession->id, [
                'is_completed' => true,
                'completed_at' => now(),
            ]);

        return back()->with('success', 'Session marked as completed.');
    }
}
