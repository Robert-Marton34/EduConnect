<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function view(User $user, Task $task)
    {
        return $user->id === $task->subject->teacher_id;
    }

    public function manage(User $user, Task $task)
    {
        return $user->id === $task->subject->teacher_id;
    }

    public function submit(User $user, Task $task)
    {
        return $task->subject->students->contains($user->id);
    }
}