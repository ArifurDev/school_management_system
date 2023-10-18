<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'address',
        'phone',
        'gender',
        'date_of_birth',
        'blood',
        'father_name',
        'mother_name',
        'religion',
        'class_id',
        'section',
        'group',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //classes and userInfo one to one
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
