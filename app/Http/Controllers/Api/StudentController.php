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
        $user = User::find($dataForm['student_id']);
        if ($user->level !== 'young') return response()->json(['error' => 'Usuário não tem perfil de jovem']);

        $students = Student::all()->where('student_id', $dataForm['student_id']);

        foreach ($students as $student) {
            if ($student['course_id'] == $dataForm['course_id']) {
                return response()->json(['error' => 'Jovem já está cadastrado no curso']);
                dd($student);
            }
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
        $student = User::find($dataForm['student_id']);
        if ($student->level !== 'young') return response()->json(['error' => 'Usuário não tem perfil de jovem']);

        $students = Student::all()->where('student_id', $dataForm['student_id']);

        if (isset($dataForm['course_id'])) {
            foreach ($students as $student) {
                if ($student['course_id'] == $dataForm['course_id']) {
                    return response()->json(['error' => 'Jovem já está cadastrado no curso']);
                    dd($student);
                }
            }
        }

        $data->update($dataForm);
        return response()->json($data);
    }

    public function details ($id) { 
        if (!$data = $this->model->with(['user', 'course'])->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        // $data = $data->with('courses');
        return response()->json($data);
    }
}
