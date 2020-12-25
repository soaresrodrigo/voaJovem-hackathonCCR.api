<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends MasterApiController
{
    function __construct(User $user)
    {
        $this->model = $user;
    }

    public function courses ($id) { 
        if (!$data = $this->model->with('courses')->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        return response()->json($data);
    }

    public function students ($id) { 
        if (!$data = $this->model->with('students')->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        return response()->json($data);
    }
    
}
