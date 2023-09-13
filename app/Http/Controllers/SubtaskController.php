<?php

namespace App\Http\Controllers;

use App\Models\Subtarefa;
use Illuminate\Http\Request;


class SubtaskController extends Controller
{
    public function index(){
        $subtarefas = Subtarefa::all();
        return response()->json($subtarefas);
    }

    public function show($id){
        $subtarefa = Subtarefa::find($id);
        return response()->json($subtarefa);
    }

    public function store(Request $request){
        $subtarefa = new Subtarefa;
        $subtarefa->tarefa_id = $request->input('tarefa_id');
        $subtarefa->titulo = $request->titulo;
        $subtarefa->descricao = $request->descricao;
        $subtarefa->status = $request->status;
        $subtarefa->save();

        return response()->json('Subtarefa criada com sucesso');
    }

    public function update(Request $request, $id){
        $subtarefa = Subtarefa::find($id);
        $subtarefa->titulo = $request->titulo;
        $subtarefa->descricao = $request->descricao;
        $subtarefa->data_vencimento = $request->data_vencimento;
        $subtarefa->status = $request->status;
        $subtarefa->save();

        return response()->json('Subtarefa atualizada com sucesso');
    }

    public function destroy($id){
        $tarefa = Subtarefa::find($id);
        $tarefa->delete();

        return response()->json('Subtarefa excluída com sucesso');
    }
}
