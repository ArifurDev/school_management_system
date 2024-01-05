<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamMarksRegistration extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'class_id',
        'exam_id',
        'class_work',
        'home_work',
        'exam'
    ];

        // Define the inverse of the relationship
        public function classes()
        {
            return $this->belongsTo(Classes::class, 'class_id');
        }
    
        // Define the inverse of the relationship
        public function exams()
        {
            return $this->belongsTo(Exam::class, 'exam_id');
        }
    
        public function subject()
        {
            return $this->belongsTo(Subject::class, 'subject_id');
        }
}
