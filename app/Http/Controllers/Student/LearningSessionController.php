<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\LearningSession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LearningSessionController extends Controller
{
    public function getFormattedSummaryAttribute()
    {
        return Str::markdown($this->summary);
    }
    public function index()
    {
        $user = auth()->user()->load('completedSessions');

        $sessions = LearningSession::where('user_id', $user->id)
            ->orderBy('session_number')
            ->get();

        return view('student.learning-sessions.index', compact('sessions'));
    }


    public function show(LearningSession $learningSession)
    {
        $user = auth()->user();

        if (!$learningSession->isUnlockedFor($user)) {
            abort(403, 'This session is locked. Complete the previous session first.');
        }

        return view('student.learning-sessions.show', compact('learningSession'));
    }


    public function complete(LearningSession $learningSession)
    {
        $this->authorize('complete', $learningSession);

        $user = auth()->user();

        if ($learningSession->isCompletedBy($user)) {
            return back()->with('info', 'Session already completed.');
        }

        $user->completedSessions()
            ->updateExistingPivot($learningSession->id, [
                'is_completed' => true,
                'completed_at' => now(),
            ]);

        return back()->with('success', 'Session marked as completed.');
    }
}
