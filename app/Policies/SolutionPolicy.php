<?php

namespace App\Policies;

use App\Models\Solution;
use App\Models\User;

class SolutionPolicy
{
    public function view(User $user, Solution $solution)
    {
        return $user->id === $solution->task->subject->teacher_id;
    }
    public function update(User $user, Solution $solution)
    {
        return $user->id === $solution->task->subject->teacher_id;
    }
}
