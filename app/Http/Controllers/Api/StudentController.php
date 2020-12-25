<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends MasterApiController
{
    function __construct(Student $student)
    {
        $this->model = $student;
    }

    public function store(Request $request)
    {

        $this->validate($request, $this->model->rules());
        $dataForm = $request->all();

        // Verifica se o usuário é jovem
        $student = User::find($dataForm['student_id']);
        if ($student->level !== 'young') return response()->json(['error' => 'Usuário não tem perfil de jovem']);

        if (Course::where('student_id', $student->id)) {
            dd('encontrado');
        } else {
            dd('não encontrado');
        }

        $data = $this->model->create($dataForm);
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        if (!$data = $this->model->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        
        $this->validate($request, $this->model->rules());
        $dataForm = $request->all();

        // Verifica se o usuário é jovem
        $student = User::find($id);
        if ($student->level !== 'young') return response()->json(['error' => 'Usuário não tem perfil de jovem']);

        $data->update($dataForm);
        return response()->json($data);
    }

    public function courses ($id) { 
        if (!$data = $this->model->with(['user', 'courses'])->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        return response()->json($data);
    }
}
