@extends('layouts.app')

@section('titulo-pagina')
    <h1>Tarefas para fazer</h1>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Assunto</th>
              <th>Executada</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody id="task_list">
            @forelse ($tasks as $task)
              <tr>
                <td>{{ $task->id }}</td>
                <td>
                  <a href="{{ route('tasks.show', $task->id) }}">
                    {{ $task->subject }}
                  </a>
                </td>
                <td>{{ $task->made ? 'Sim' : 'Não' }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <a class="btn btn-success" title="marcar como executada"  href="{{ route('tasks.todo_made', $task->id) }}">Executada</a> 

                    <a class="btn btn-danger" title="remover da lista de tarefas para fazes"  href="{{ route('tasks.todo_destroy', $task->id) }}">Remover</a> 
                </td>
              </tr>
            @empty
              <tr><td>Nenhuma tarefa cadastrada</td></tr>
            @endforelse
          </tbody>
        </table>
       
        <a href="{{ route('tasks.index') }}">Voltar para lista de tarefas</a>
      </div>
    </div>
@endsection


