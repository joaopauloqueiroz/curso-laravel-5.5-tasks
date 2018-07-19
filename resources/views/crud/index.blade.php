@extends('layouts.app')


@section('content')
<h1>Projects</h1>
  <table class="table table-striped">
    <tr>
      <th>Nome</th>
      <th>Cliente</th>
      <th>Const</th>
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
    
      @forelse ($project as $proje)
      <tr>
        <td><a href="{{route('projects.show', $proje->id)}}">{{$proje->name}}</a></td>
        <td>{{$proje->client->name}}</td>
        <td>{{$proje->cost}}</td>
        <td>{{$proje->description}}</td>
        <td>

          <a href="{{route('projects.edit', $proje->id)}}" class="btn btn-success">Editar</a>
          <form style="display:inline" action="{{route('projects.destroy', $proje->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esse projeto? ')">Deletar</button>
          </form>
        </td>
      </tr>
        @empty
          <h2>Nenhum dado a ser mostrado</h2>
      @endforelse
    
  </table>
  <hr>
<a href="{{route('projects.create')}}">Criar novo projeto</a>
@endsection