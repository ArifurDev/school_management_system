<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCollection extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'expense', 'amount', 'due', 'description'];

    //one to many relationship -- user model and FeeCollection model
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
