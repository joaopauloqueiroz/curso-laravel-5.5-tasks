<div class="row">
  <div class="col-md-12">
  <table class="table table-striped">

    <h3 class="text-center">Projetos relacionados</h3>
    
    <tr>
      <th>Nome</th>
      <th>Cliente</th>
      <th>Const</th>
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
    
      @forelse ($task->projects as $project)
      <tr>
        <td><a href="{{route('projects.show', $project->id)}}">{{$project->name}}</a></td>
        <td>{{$project->client->name}}</td>
        <td>{{$project->cost}}</td>
        <td>{{$project->description}}</td>
        <td>
          @if(!$task->made)
            <a href="{{ route('tasks.project_detach', [$task, $project]) }}" class="btn btn-success">Remover da tarefa</a>
          @endif
        </td>
      </tr>

        @empty
          <h2>Nenhum projeto relacionado</h2>
      @endforelse
    
    </table>
  </div>
</div>