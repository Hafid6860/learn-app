<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningSession;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLearningSessionRequest;
use App\Http\Requests\UpdateLearningSessionRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\LearningSessionCreatedMail;

class LearningSessionController extends Controller
{
    public function index(User $student)
    {
        $sessions = $student->learningSessions()
            ->orderBy('session_number')
            ->paginate(10);

        $totalSessions = $student->total_sessions;
        $createdSessions = $student->learningSessions()->count();
        $completedCount = $student->completedSessions()->count();

        return view('admin.learning-sessions.index', compact('student', 'sessions', 'totalSessions', 'createdSessions', 'completedCount'));
    }


    public function create(User $student)
    {
        $currentSessionCount = $student->learningSessions()->count();

        if ($currentSessionCount >= $student->total_sessions) {
            return back()->withErrors([
                'user_id' => 'This student has reached the maximum allowed sessions.'
            ]);
        }
        
        return view('admin.learning-sessions.create', compact('student'));
    }

    public function store(StoreLearningSessionRequest $request, User $student)
    {
        $currentSessionCount = $student->learningSessions()->count();

        if ($currentSessionCount >= $student->total_sessions) {
            return back()
                ->withErrors([
                    'user_id' => 'This student has reached the maximum allowed sessions.'
                ])
                ->withInput();
        }

        $nextSessionNumber = $currentSessionCount + 1;

        $data = $request->validated();
        $data['user_id'] = $student->id;
        $data['student_id'] = $student->id; // maintaining original data structures compatibility
        $data['session_number'] = $nextSessionNumber;

        $session = LearningSession::create($data);

        $session->students()->attach($student->id);

        Mail::to($student->email)->send(
            new LearningSessionCreatedMail(
                $student->name,
                $session->title,
                $session->meeting_date,
                route('learning-sessions.show', $session->id)
            )
        );

        return redirect()
            ->route('admin.students.learning-sessions.index', $student)
            ->with('success', 'Learning session created successfully.');
    }

    public function show(User $student, LearningSession $learningSession)
    {
        return view('admin.learning-sessions.show', compact('student', 'learningSession'));
    }

    public function edit(User $student, LearningSession $learningSession)
    {
        return view('admin.learning-sessions.edit', compact('student', 'learningSession'));
    }

    public function update(UpdateLearningSessionRequest $request, User $student, LearningSession $learningSession)
    {
        $currentSessionCount = $student->learningSessions()
            ->where('id', '!=', $learningSession->id)
            ->count();

        if ($currentSessionCount >= $student->total_sessions) {
            return back()
                ->withErrors([
                    'user_id' => 'This student has reached the maximum allowed sessions.'
                ])
                ->withInput();
        }

        $data = $request->validated();
        $data['user_id'] = $student->id;

        $learningSession->update($data);

        $learningSession->students()->syncWithoutDetaching([$student->id]);

        return redirect()
            ->route('admin.students.learning-sessions.index', $student)
            ->with('success', 'Learning session updated successfully.');

    }

    public function destroy(User $student, LearningSession $learningSession)
    {
        $learningSession->delete();

        return redirect()
            ->route('admin.students.learning-sessions.index', $student)
            ->with('success', 'Learning session deleted successfully.');
    }
}
