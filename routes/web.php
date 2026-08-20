<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\RoleMiddleware;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/main', function () {
    return view('main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//routes made manually (subject crud)

Route::get('/teacher', [SubjectController::class, "index"])->name("teacher.menu")->middleware("auth");
Route::get('/teacher/subject/newsub', [SubjectController::class, "newsub"])->name("subject.newsub")->middleware("auth");
Route::post('/teacher/subject/newsub', [SubjectController::class, "storesub"])->name("subject.storesub")->middleware("auth");
Route::get('/teacher/homepage', [SubjectController::class, "homepage"])->name("teacher.homepage")->middleware("auth");
Route::get('/teacher/subject/{subject}', [SubjectController::class, "subdetails"])->name('subject.subdetails')->middleware("auth");
Route::get('/teacher/subject/{subject}/subedit', [SubjectController::class, "subedit"])->name('subject.subedit')->middleware("auth");
Route::put('/teacher/subject/{subject}/subedit', [SubjectController::class, "subupdate"])->middleware("auth");
Route::delete('/teacher/subject/{subject}', [SubjectController::class, "subdelete"])->name('subject.subdelete')->middleware("auth");

//Route::get('/teacher/task/taskdetails', [SubjectController::class, "taskdetails"])->name("teacher.taskdetails");
//Route::get('/teacher/task/edittask', [SubjectController::class, "edittask"])->name("teacher.edittask");



Route::get('/student', [StudentController::class, "index"])->name("student.menu")->middleware("auth");

Route::get('/student/takesub', [StudentController::class, 'availableSubjects'])->name('student.takesub')->middleware("auth");
Route::post('/student/enroll/{subject}', [StudentController::class, 'enroll'])->name('student.subjects.enroll')->middleware("auth");
Route::get('/student/homepage', [StudentController::class, 'mySubjects'])->name('student.homepage')->middleware("auth");
Route::post('/student/leave-subject/{subject}', [StudentController::class, 'leave'])->name('student.subjects.leave')->middleware("auth");
Route::get('/student/subdetails/{subject}', [StudentController::class, 'subdetails'])->name('student.subdetails')->middleware("auth");
Route::get('/student/submit-solution/{task}', [StudentController::class, 'showSubmitSolution'])->name('student.submit-solution')->middleware('auth');
Route::post('/student/submit_solution/{task}', [StudentController::class, 'submitSolution'])->name('student.submit_solution')->middleware('auth');


/*
Route::get('/student', function () {
    return view('student.menu');
});
*/
//Route::view('/teacher', 'teacher.teacher-menu');

Route::resource("subject.tasks", TaskController::class)->shallow()->except(["index"])->middleware("auth");
Route::resource("task.solutions", SolutionController::class)->shallow()->except(["index"])->middleware("auth");

