<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LearningSession;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $totalStudents = User::where('is_admin', false)->count();
            $totalSessions = LearningSession::count();
            $totalCompleted = DB::table('learning_session_user')
                ->where('is_completed', true)
                ->count();
            $completionRate = $totalSessions > 0
                ? round(($totalCompleted / max($totalSessions * $totalStudents, 1)) * 100, 1)
                : 0;

            $recentStudents = User::where('is_admin', false)
                ->latest()
                ->take(5)
                ->get();

            $recentSessions = LearningSession::with('user')
                ->latest('meeting_date')
                ->take(5)
                ->get();

            return view('admin.dashboard', compact(
                'totalStudents',
                'totalSessions',
                'totalCompleted',
                'completionRate',
                'recentStudents',
                'recentSessions'
            ));
        }

        $user = auth()->user();
        $totalSessions = $user->learningSessions()->count();
        $completedSessions = $user->completedSessions()->count();
        $progressPercentage = $totalSessions > 0
            ? round(($completedSessions / $totalSessions) * 100, 1)
            : 0;
        $recentSessions = $user->learningSessions()
            ->orderBy('session_number', 'asc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalSessions',
            'completedSessions',
            'progressPercentage',
            'recentSessions'
        ));
    }
}
