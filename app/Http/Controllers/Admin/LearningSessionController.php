<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningSession;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'title'          => 'required|string|max:255',
            'summary'        => 'required|string',
            'video_url'      => 'nullable|url',
            'source_code_url' => 'nullable|url',
            'meeting_date'   => 'required|date',
        ]);

        $session = LearningSession::create($request->all());
        $session->students()->attach($request->user_id);


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

    public function update(Request $request, LearningSession $learningSession)
    {
        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'title'          => 'required|string|max:255',
            'summary'        => 'required|string',
            'video_url'      => 'nullable|url',
            'source_code_url' => 'nullable|url',
            'meeting_date'   => 'required|date',
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
