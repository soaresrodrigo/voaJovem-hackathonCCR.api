<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'information'
    ];

    public function rules () {
        return [
            'user_id' => 'sometimes|required',
            'information' => 'sometimes|required',
        ];
    }
}
