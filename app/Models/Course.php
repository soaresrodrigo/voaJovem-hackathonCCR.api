<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'description',
        'difficult',
    ];

    public function rules () {
        return [
            'company_id' => 'sometimes|required',
            'name' => 'sometimes|required',
            'description' => 'sometimes',
            'difficult' => 'sometimes|required'
        ];
    }

    // Ligações
    public function companies () {
        return $this->belongsTo(User::class, 'company_id', 'id');
    }

    public function students () {
        return $this->hasMany(Student::class, 'course_id');
    }
}
