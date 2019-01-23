@extends('layouts.app')
@section('title','List Trainer')
@section('content')
<div class="d-flex flex-column justify-content-md-center pt-2">
    <img class="rounded-circle"  src="/images/{{$trainer->avatar}}" alt="Card image cap"  style="height:200px;width:200px">
    <h5 class="display-1">{{$trainer->name}}</h5>
    <p class="lead">{{$trainer->description}}</p>
    <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
</div>
@endsection
