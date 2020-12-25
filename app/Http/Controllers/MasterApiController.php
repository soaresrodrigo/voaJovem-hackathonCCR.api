<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MasterApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $model;

    public function index()
    {
        return response()->json($this->model::all());
    }
    
    public function store(Request $request)
    {
        $this->validate($request, $this->model->rules());

        $dataForm = $request->all();

        $data = $this->model->create($dataForm);
        return response()->json($data, 201);
    }
    
    public function show($id)
    {
        if (!$data = $this->model->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        return response()->json($data);
    }
    
    public function update(Request $request, $id)
    {
        if (!$data = $this->model->find($id)) return response()->json(['error' => 'Nada foi encontrado'], 404);
        
        $this->validate($request, $this->model->rules());
        $dataForm = $request->all();

        $data->update($dataForm);
        return response()->json($data);
    }
    
    public function destroy($id)
    {
        if ($data = $this->model->find($id)) {
            $data->delete();
            return response()->json(['success' => 'Excluído com sucesso']);
        } else {
            return response()->json(['error' => 'Nada foi encontrado'], 404);
        }
    }
}
