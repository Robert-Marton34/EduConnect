<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\Task;
use App\Models\Solution;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->delete();

        // Create teachers
        $teachers = User::where('role', 'teacher')->get();

        // Create subjects and tasks
        Subject::factory()
            ->count(10)
            ->make()
            ->each(function ($subject) use ($teachers) {
                $subject->teacher_id = $teachers->random()->id;
                $subject->save();

                // Create 3 tasks per subject
                Task::factory()
                    ->count(3)
                    ->create([
                        'subject_id' => $subject->id
                    ]);
            });

        // Create students
        $students = User::factory()->count(10)->create([
            'role' => 'student',
        ]);

        // Assign students to subjects
        $subjects = Subject::all();
        foreach ($students as $student) {
            if ($subjects->count()) {
                $student->subjectsEnrolled()->attach(
                    $subjects->random(rand(2, 4))->pluck('id')->toArray()
                );
            }
        }

        // Create solutions: each student submits one solution per their enrolled subject tasks
        foreach ($students as $student) {
            foreach ($student->subjectsEnrolled as $subject) {
                foreach ($subject->tasks as $task) {
                    Solution::factory()->create([
                        'user_id' => $student->id,
                        'task_id' => $task->id,
                    ]);
                }
            }
        }
        /*
        DB::table('subjects')->delete();

        $teachers = \App\Models\User::where('role', 'teacher')->get();
        $students = User::factory()->count(10)->create([
            'role' => 'student',
        ]);

        Subject::factory()
            ->count(10)
            ->make()
            ->each(function ($subject) use ($teachers, $students) {
                $subject->teacher_id = $teachers->random()->id;
                $subject->save();

                // Add tasks and solutions
                Task::factory()
                    ->count(3)
                    ->create([
                        'subject_id' => $subject->id
                    ])
                    ->each(function ($task) use ($students) {
                        Solution::factory()->count(2)->create([
                            'task_id' => $task->id,
                            'user_id' => $students->random()->id, // ✅ here
                        ]);
                    });
            });
            */
        /*
        Subject::factory()
            ->count(10)
            ->make()
            ->each(function ($subject) use ($teachers) {
                $subject->teacher_id = $teachers->random()->id;
                $subject->save();

                // Add tasks and solutions
                Task::factory()
                    ->count(3)
                    ->create([
                        'subject_id' => $subject->id
                    ])
                    ->each(function ($task) {
                        Solution::factory()->count(2)->create([
                            'task_id' => $task->id
                        ]);
                    });
            });
        
        $students = User::factory()->count(10)->create([
            'role' => 'student',
        ]);
            */
        // Optionally assign students to subjects after SubjectSeeder runs
        /*
        $subjects = Subject::all();
    
        foreach ($students as $student) {
            if ($subjects->count()) {
                $student->subjectsEnrolled()->attach(
                    $subjects->random(rand(2, 4))->pluck('id')->toArray()
                );
            }
        }
        */
        /*
        DB::table('subjects')->delete();
        Subject::factory()
            ->has(
                Task::factory()
                    ->count(3)
                    ->has(
                        Solution::factory()->count(2)
                    )
            )
            ->count(10)
            ->create();  
            */
    }
}
