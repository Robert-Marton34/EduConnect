<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\Subject;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class TaskController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Subject $subject)
    {
        $this->authorize('view', $subject);
        return view("teacher.task.create", [
            "subject" => $subject
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request, Subject $subject)
    {
        $this->authorize('view', $subject);
        $subject->tasks()->create($request->validated());
        return redirect()->route("subject.subdetails", ["subject" => $subject->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('teacher.task.taskdetails', [
            "task" => $task,
            "solutions" => $task->solutions()->with('user')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('manage', $task);
        return view('teacher.task.edittask', [
            "task" => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        $this->authorize('manage', $task);
        $task->update($request->validated());
        return redirect()->route("tasks.show", [
            "subject" => $task->subject_id,
            "task" => $task->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
