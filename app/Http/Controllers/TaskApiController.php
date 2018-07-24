<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskApiController extends Controller
{

    /**
     * Retorna uma intancia da classe TaskRepository através dessa interface
     * Atraves do bind no AppServiceprovider
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->taskRepository->getAll();
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->taskRepository->create($request->all())) {
            return response()->json(['statusCode'=>'201','status'=>'Tarefa salva com sucesso']);
        } else {
            return response()->json(['statusCode'=>'500','status'=>'Erro ao inserir tarefa']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->taskRepository->find($id);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'subject' => $request->subject,
            'made'    => $request->made,
            'description' => $request->description
        ];
        if ($this->taskRepository->update($id, $data)) {
            return response()->json(['statusCode'=>'200','status'=>'Atualizado com sucesso']);
        } else {
            return response()->json(['statusCode'=>'500','status'=>'Erro ao atualizar tarefa']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->taskRepository->delete($id)) {
            return response()->json(['statusCode'=>'200','status'=>'Deletado com sucesso']);
        } else {
            return response()->json(['statusCode'=>'204', 'status'=>'Erro ao deletar']);
        }
    }
}
