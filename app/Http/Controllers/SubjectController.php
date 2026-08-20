<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectFormRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubjectController extends Controller
{
    use AuthorizesRequests;
    public function index() {
        return view('teacher.menu');
    }

    public function newsub() {
        return view('teacher.subject.newsub');
    }

    public function storesub(SubjectFormRequest $request) {
        $validated = $request->validated();
        $validated['teacher_id'] = Auth::id(); 
        Subject::create($validated);
       // Subject::create($request->validated());
        return redirect()->route("teacher.homepage");
        
    }

    public function homepage() {
        $subjects = auth()->user()->taughtSubjects;
        ///$subjects = Subject::where('teacher_id', auth()->id())->get();
        //$subjects = Subject::all();
        return view('teacher.homepage',[
            "subjects" => $subjects,
        ]);
    }

    public function subdetails(Subject $subject) {
        $this->authorize('view', $subject);
        return view('teacher.subject.subdetails', [
            "subject" => $subject,
            "tasks" => $subject->tasks,
            "students" => $subject->students,
        ]);
    }

    public function subedit(Subject $subject) {
        $this->authorize('update', $subject);
        return view('teacher.subject.subedit', [
            "subject" => $subject,
        ]);
    }

    public function subupdate(SubjectFormRequest $request, Subject $subject) {
        $subject->update($request->validated());
        return redirect()->route("subject.subdetails", [
            "subject" => $subject->id,
        ]);
        
    }

    public function subdelete(Subject $subject) { 
        $this->authorize('delete', $subject);
        $subject->delete();
        return redirect()->route("teacher.homepage");
    }


    public function evaluate() {
        return view('teacher.task.evaluate');
    }

}
