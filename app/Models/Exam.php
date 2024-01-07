<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam',
        'status',
    ];

    // Define a one-to-many relationship with ExamSchedule
    public function examSchedules()
    {
        return $this->hasMany(ExamSchedule::class, 'exam_id');
    }

    // Define a one-to-many relationship with ExamMarksRegistration
    public function ExamMarksRegistration()
    {
        return $this->hasMany(ExamMarksRegistration::class, 'subject_id');
    }
}
