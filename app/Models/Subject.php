<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['classes_id', 'subject_name', 'subject_code'];

    // one to many reletioship ---classes model and subject model
    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }
}
