<?php

namespace App\Policies;

use App\Models\Subject;
use App\Models\User;

class SubjectPolicy
{
    public function view(User $user, Subject $subject)
    {
        return $user->id === $subject->teacher_id;
    }

    public function update(User $user, Subject $subject)
    {
        return $user->id === $subject->teacher_id;
    }

    public function delete(User $user, Subject $subject)
    {
        return $user->id === $subject->teacher_id;
    }
}

