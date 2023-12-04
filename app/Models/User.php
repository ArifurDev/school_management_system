<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pass_status',
        'student_status',
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //one to one relationship --- user model to classes model
    public function classes()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    //one to many relationship -- user model and FeeCollection model
    public function FeeCollection()
    {
        return $this->hasMany(FeeCollection::class);
    }




    //one to many reletionship -- user model and attendance model 
    public function Attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
