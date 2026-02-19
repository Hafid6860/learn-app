<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('is_admin', false);

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $students = $query->latest()->paginate(10);

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:6',
            'whatsapp_number' => 'nullable|string|max:20',
            'learning_goal'  => 'nullable|string',
            'package_name'   => 'nullable|string|max:255',
            'total_sessions' => 'required|integer|min:0',
        ]);

        User::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'whatsapp_number' => $request->whatsapp_number,
            'learning_goal'   => $request->learning_goal,
            'package_name'    => $request->package_name,
            'total_sessions'  => $request->total_sessions,
            'is_admin'        => false,
        ]);

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

    public function update(Request $request, User $student)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . $student->id,
            'whatsapp_number' => 'nullable|string|max:20',
            'learning_goal'  => 'nullable|string',
            'package_name'   => 'nullable|string|max:255',
            'total_sessions' => 'required|integer|min:0',
        ]);

        $student->update([
            'name'            => $request->name,
            'email'           => $request->email,
            'whatsapp_number' => $request->whatsapp_number,
            'learning_goal'   => $request->learning_goal,
            'package_name'    => $request->package_name,
            'total_sessions'  => $request->total_sessions,
        ]);

        if ($request->filled('password')) {
            $student->update([
                'password' => Hash::make($request->password),
            ]);
        }

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

    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (isset($request->student) && $request->student->is_admin) {
    //             abort(404);
    //         }
    //         return $next($request);
    //     });
    // }
}
