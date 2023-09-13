<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index(){
        $tarefas = Tarefa::with('subtarefas')->get();
        return response()->json($tarefas);
    }

    public function show($id){
        $tarefa = Tarefa::find($id);
        return response()->json($tarefa);
    }

    public function store(Request $request){
        $tarefa = new Tarefa;
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data_vencimento = $request->data_vencimento;
        $tarefa->status = $request->status;
        $tarefa->save();

        return response()->json('Tarefa criada com sucesso');
    }

    public function update(Request $request, $id){
        $tarefa = Tarefa::find($id);
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data_vencimento = $request->data_vencimento;
        $tarefa->status = $request->status;
        $tarefa->save();

        return response()->json('Tarefa atualizada com sucesso');
    }

    public function destroy($id){
        $tarefa = Tarefa::find($id);
        $tarefa->delete();

        return response()->json('Tarefa excluída com sucesso');
    }
}
