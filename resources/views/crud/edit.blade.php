@extends('layouts.app')
@section('content')
  <h1>Update de Projeto</h1>
  <form action="{{route('projects.update', $project->id)}}" method="post">
      {{csrf_field()}}
      {{method_field('PUT')}}
      @include('crud.form')
  </form>
@endsection