<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "expens_type",
        "amount",
        "due",
        "status",
        "phone",
        "email",
        "description"
    ];
}
