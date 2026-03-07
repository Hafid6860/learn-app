<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('is_admin', false);

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $students = $query->latest()->paginate(10)->appends($request->query());
        
        $totalStudents = User::where('is_admin', false)->count();
        $totalLearningSessions = \App\Models\LearningSession::count();

        return view('admin.students.index', compact('students', 'totalStudents', 'totalLearningSessions'));
    }


    public function create()
    {
        return view('admin.students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['is_admin'] = false;

        User::create($data);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(User $student)
    {
        $completedSessions = $student->completedSessions()
            ->wherePivot('is_completed', true)
            ->count();
        $totalSessions     = $student->total_sessions;

        $progressPercentage = $totalSessions > 0
            ? ($completedSessions / $totalSessions) * 100
            : 0;

        return view('admin.students.show', compact(
            'student',
            'completedSessions',
            'totalSessions',
            'progressPercentage'
        ));
    }

    public function edit(User $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, User $student)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $student->update($data);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(User $student)
    {
        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }
    
}
