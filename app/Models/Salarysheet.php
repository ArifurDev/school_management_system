<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salarysheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
    ];

    //one to one relationship --- user model to salarysheet model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
