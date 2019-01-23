@extends('layouts.app')
@section('title','Edit Trainer')
@section('content')
  <form action="/trainers/{{$trainer->slug}}" method="post" class="form-group" enctype="multipart/form-data">
    @method("put")
    @csrf
    <input type="text" name="name" value="{{$trainer->name}}" id="nombre" class="form-control" placeholder="Nombre">
    <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Descripción">
    {{$trainer->description}}
    </textarea>
    <input type="file" name="avatar" id="avatar" class="form-control-file">
    <input type="submit" value="Enviar" class="form-control btn btn-primary">
  </form>
@endsection