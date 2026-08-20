<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Task;
use App\Models\Solution;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class StudentController extends Controller
{
    use AuthorizesRequests;

    public function index() {
        return view('student.menu');
    }

    public function takesub(){
        $subjects = Subject::all();
        return view('student.takesub',[
            "subjects" => $subjects,
        ]);
    }

    public function enroll($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        Auth::user()->subjectsEnrolled()->attach($subject);
        return redirect()->route('student.homepage');
    }

    public function availableSubjects()
    {
        $user = Auth::user();

        // Subjects the student is *not* enrolled in
        $subjects = Subject::whereDoesntHave('students', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('student.takesub', compact('subjects'));
    }

    public function mySubjects()
    {
        $user = auth()->user();
        $subjects = $user->subjectsEnrolled()->with('teacher')->get();
        return view('student.homepage', compact('subjects'));
    }

    public function leave($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        auth()->user()->subjectsEnrolled()->detach($subject->id);
        return redirect()->back()->with('success', 'You have left the subject.');
    }
    
    public function subdetails(Subject $subject) {
        return view('student.subdetails', [
            'subject' => $subject->load('teacher', 'students'),
            'tasks' => $subject->tasks()->with('solutions')->get(),
        ]);
    }

    public function showSubmitSolution(Task $task)
    {
        $this->authorize('submit', $task);
        $existingSolution = Solution::where('task_id', $task->id)
            ->where('user_id', auth()->id())
            ->first();
    
        $subject = $task->subject; // Task belongs to Subject
        $teacher = $subject->teacher; // Subject belongs to Teacher (User)
    
        return view('student.submit', [
            'task' => $task,
            'existingSolution' => $existingSolution,
            'subject' => $subject,
            'teacher' => $teacher,
        ]);
    }

    public function submitSolution(Request $request, Task $task)
    {
        $this->authorize('submit', $task);
        $request->validate([
            'solution' => 'required|string',
        ]);

        // Check if the student has already submitted a solution for this task
        $existingSolution = Solution::where('task_id', $task->id)
                                    ->where('user_id', auth()->id())
                                    ->first();

        if ($existingSolution) {
            // Update the existing solution
            $existingSolution->solution = $request->solution;
            $existingSolution->save();

            return redirect()->route('student.subdetails', ['subject' => $task->subject_id])
                             ->with('success', 'Solution updated successfully.');
        } else {
            // Create a new solution
            $solution = new Solution();
            $solution->user_id = auth()->id();
            $solution->task_id = $task->id;
            $solution->solution = $request->solution;
            $solution->save();

            return redirect()->route('student.subdetails', ['subject' => $task->subject_id]);
        
        }
    }
}
