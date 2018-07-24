<div class="row">
  <div class="col-md-12 text-center">

    <h3>Relacionar projetos</h3>

      <form class="form-inline" method="POST" action="{{route('tasks.project_attach', $task)}}">
        {{csrf_field()}}
          <div class="form-group">
            <label for="project_id">Projeto</label>
            <select name="project_id" class="form-control">
                @foreach ($projects as $project)

                    <option value="{{$project->id}}">{{$project->name}}</option>

                @endforeach
            </select>
          </div>
          
          <button type="submit" class="btn btn-default">Relacionar</button>
        </form>
  </div>
</div>