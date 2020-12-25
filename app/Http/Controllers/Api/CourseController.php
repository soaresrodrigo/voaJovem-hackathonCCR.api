<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class CourseController extends MasterApiController
{
    function __construct(Course $course)
    {
        $this->model = $course;
    }

    public function store(Request $request)
    {

        $this->validate($request, $this->model->rules());
        $dataForm = $request->all();

        // Verifica se o usuário é empresa
        $company = User::find($dataForm['company_id']);
        if ($company->level !== 'company') return response()->json(['error' => 'Usuário não tem perfil de empresa']);

        $data = $this->model->create($dataForm);
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        if (!$data = $this->model->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        
        $this->validate($request, $this->model->rules());
        $dataForm = $request->all();

        // Verifica se o usuário é empresa
        $company = User::find($dataForm['company_id']);
        if ($company->level !== 'company') return response()->json(['error' => 'Usuário não tem perfil de empresa']);

        $data->update($dataForm);
        return response()->json($data);
    }

    public function students ($id) { 
        if (!$data = $this->model->with('students')->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        return response()->json($data);
    }
}
