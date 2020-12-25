<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'description',
        'start',
        'end',
    ];

    public function rules () {
        return [
            'company_id' => 'sometimes|required',
            'description' => 'sometimes|required',
            'user_id' => 'sometimes|required',
            'start' => 'sometimes|required',
            'end' => 'sometimes|required',
        ];
    }
}
