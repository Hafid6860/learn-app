<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningSession;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLearningSessionRequest;
use App\Http\Requests\UpdateLearningSessionRequest;

class LearningSessionController extends Controller
{
    public function index()
    {
        $sessions = LearningSession::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.learning-sessions.index', compact('sessions'));
    }

    public function create()
    {
        $students = User::where('is_admin', false)->get();

        return view('admin.learning-sessions.create', compact('students'));
    }

    public function store(StoreLearningSessionRequest $request)
    {

        $student = User::where('is_admin', false)
            ->findOrFail($request->user_id);

        $currentSessionCount = $student->learningSessions()->count();

        if ($currentSessionCount >= $student->total_sessions) {
            return back()
                ->withErrors([
                    'user_id' => 'This student has reached the maximum allowed sessions.'
                ])
                ->withInput();
        }

        $nextSessionNumber = $currentSessionCount + 1;

        $session = LearningSession::create([
            'user_id'        => $student->id,
            'session_number' => $nextSessionNumber,
            'title'          => $request->title,
            'summary'        => $request->summary,
            'video_url'      => $request->video_url,
            'source_code_url' => $request->source_code_url,
            'meeting_date'   => $request->meeting_date,
        ]);

        $session->students()->attach($student->id);

        return redirect()
            ->route('admin.learning-sessions.index')
            ->with('success', 'Learning session created successfully.');
    }

    public function show(LearningSession $learningSession)
    {
        return view('admin.learning-sessions.show', compact('learningSession'));
    }

    public function edit(LearningSession $learningSession)
    {
        $students = User::where('is_admin', false)->get();

        return view('admin.learning-sessions.edit', compact('learningSession', 'students'));
    }

    public function update(UpdateLearningSessionRequest $request, LearningSession $learningSession)
    {

        $student = User::findOrFail($request->user_id);

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

        $learningSession->update([
            'user_id'        => $student->id,
            'title'          => $request->title,
            'summary'        => $request->summary,
            'video_url'      => $request->video_url,
            'source_code_url' => $request->source_code_url,
            'meeting_date'   => $request->meeting_date,
        ]);

        $learningSession->students()->syncWithoutDetaching([$request->user_id]);

        return redirect()
            ->route('admin.learning-sessions.index')
            ->with('success', 'Learning session updated successfully.');

    }

    public function destroy(LearningSession $learningSession)
    {
        $learningSession->delete();

        return redirect()
            ->route('admin.learning-sessions.index')
            ->with('success', 'Learning session deleted successfully.');
    }
}
