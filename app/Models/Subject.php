<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;
    protected $fillable = ["name", "description", "subject_code", "credit", "teacher_id"];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'subject_user', 'subject_id', 'user_id'); // The students
    }
}
