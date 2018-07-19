@extends('layouts.app')
@section('content')
  <h1>Detalhes do Projeto</h1>

<p><b>Nome do projeto:</b> {{$project->name}}</p>
<p><b>Valor do Projeto:</b> {{$project->cost}}</p>
<p><b>Descrição do projeto:</b> {{$project->description}}</p>

<p>
    Lista de tarefas para esse projeto
    @forelse($project->tasks as $task)
      <p>O id da tarefa e: {{$task->id}}</p>
    @empty
      <p>Nenhuma tarefa pra ser mostrada</p>
    @endforelse
  </p>

<a href="{{route('projects.index')}}">Voltar a lista de projetos</a>
@endsection