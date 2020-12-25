<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'student_id',
        'grade',
        'certified'
    ];

    public function rules () {
        return [
            'course_id' => 'sometimes|required',
            'student_id' => 'sometimes|required',
            'grade' => 'sometimes',
            'certified' => 'sometimes|required'
        ];
    }

    // Ligações
    public function user () {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function courses () {
        return $this->belongsToMany(Course::class, 'students');
    }
}
