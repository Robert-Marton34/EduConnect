<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolutionRequest;
use App\Http\Requests\UpdateSolutionRequest;
use App\Models\Solution;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SolutionController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSolutionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Solution $solution)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solution $solution)
    {
        $this->authorize('update', $solution);
        return view('teacher.solution.evaluate', [
            "solution" => $solution,
            'task' => $solution->task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSolutionRequest $request, Solution $solution)
    {
        $this->authorize('update', $solution);
        $solution->update($request->validated());
        return redirect()->route("tasks.show", [
            "task" => $solution->task_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solution $solution)
    {
        //
    }
}
