<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'comment_id',
        'information'
    ];

    public function rules () {
        return [
            'post_id' => 'sometimes|required',
            'comment_id' => 'sometimes|required',
            'information' => 'sometimes|required',
        ];
    }
}
