<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'user_id', 'subject_id', 'date', 'attendances', 'class_id'];

    //one to many reletionship -- user model and attendance model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    // one to many reletionship --- subject model and Attendence
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    // one to many reletionship --- class model and Attendence
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
}
