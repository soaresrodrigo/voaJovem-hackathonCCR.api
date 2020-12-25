<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'comment_id',
        'user_id',
    ];

    public function rules () {
        return [
            'post_id' => 'sometimes|required',
            'comment_id' => 'sometimes|required',
            'user_id' => 'sometimes|required',
        ];
    }
}
