@extends('layouts.app')
@section('content')

<h2>Criar novo Projeto</h2>
  <form action="{{route('projects.store')}}" class="form" method="POST">
    {{csrf_field()}}
    @include('crud.form')
  </form>
  <a href="{{route('projects.index')}}">Voltar para a lista</a>
@endsection