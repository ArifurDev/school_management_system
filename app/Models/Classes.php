<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = ['class_name', 'head_teacher_id'];

    // one to many reletioship ---classes model and subject model
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    //one to one reletionship --- user model to classes model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // one to many reletionship --- class model and Attendence
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'class_id', 'id');
    }

    // Define a one-to-many relationship with ExamSchedule
    public function examSchedules()
    {
        return $this->hasMany(ExamSchedule::class, 'class_id');
    }

    // Define a one-to-many relationship with ExamMarksRegistration
    public function ExamMarksRegistration()
    {
        return $this->hasMany(ExamMarksRegistration::class, 'subject_id');
    }
}
