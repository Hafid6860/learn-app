<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\StudentController;
// use App\Http\Controllers\Admin\LearningSessionController;
// use App\Http\Controllers\Student\LearningSessionController as StudentLearningSessionController;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});


//auth
Route::middleware(['auth', 'verified'])->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    //default breeze
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    });

    //admin route
    Route::middleware('admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::resource('students', StudentController::class);

            // Route::resource('learning-sessions', LearningSessionController::class);

        });


   //student route
    // Route::prefix('learning-sessions')
    //     ->name('learning-sessions.')
    //     ->group(function () {

    //         Route::get('/', [StudentLearningSessionController::class, 'index'])
    //             ->name('index');

    //         Route::get('/{learningSession}', [StudentLearningSessionController::class, 'show'])
    //             ->name('show');

    //     });


    //verif admin
    Route::bind('student', function ($value) {
        return User::where('id', $value)
            ->where('is_admin', false)
            ->firstOrFail();
    });
});

require __DIR__ . '/auth.php';
