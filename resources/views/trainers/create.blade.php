@extends('layouts.app')
@section('title','Create Trainer')
@section('content')
@if($errors->any())
<div class="d-flex flex-column">
  @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{$error}}</div>
  @endforeach
</div>
@endif
  <form action="/trainers" method="post" class="form-group" enctype="multipart/form-data">
    @csrf
   @include('trainers.form')
  </form>
@endsection