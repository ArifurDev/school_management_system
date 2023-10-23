<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = ['class_name'];

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
}
