@extends('layouts.app')
@section('title','Create Trainer')
@section('content')
  <form action="/trainers" method="post" class="form-group" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
    <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Descripción"></textarea>
    <input type="file" name="avatar" id="avatar" class="form-control-file">
    <input type="submit" value="Enviar" class="form-control btn btn-primary">
  </form>
@endsection