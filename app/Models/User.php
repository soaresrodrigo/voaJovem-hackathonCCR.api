<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Course;
use App\Models\Student;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'branch',
        'cnpj',
        'description',
        'avatar',
        'cover',
    ];

    public function rules () {
        return [
            'name' => 'sometimes|required',
            'email' => 'sometimes|required',
            'password' => 'sometimes|required',
            'level' => 'sometimes',
            'branch' => 'sometimes',
            'cnpj' => 'sometimes',
            'description' => 'sometimes',
            'avatar' => 'sometimes',
            'cover' => 'sometimes'
        ];
    }
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Métodos do JWTSubject

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    // Ligações

    public function courses () {
        return $this->hasMany(Course::class, 'company_id', 'id');
    }

    public function students () {
        return $this->hasMany(Student::class, 'student_id', 'id');
    }
    

}
