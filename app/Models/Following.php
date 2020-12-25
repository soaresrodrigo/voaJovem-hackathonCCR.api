<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'following_id'
    ];

    public function rules () {
        return [
            'user_id' => 'sometimes|required',
            'following_id' => 'sometimes|required'
        ];
    }
}
