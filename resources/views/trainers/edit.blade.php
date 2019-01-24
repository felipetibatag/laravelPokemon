@extends('layouts.app')
@section('title','Edit Trainer')
@section('content')
  <form action="/trainers/{{$trainer->slug}}" method="post" class="form-group" enctype="multipart/form-data">
    @method("put")
    @csrf
    @include('trainers.form')
  </form>
@endsection