@extends('layouts.app')
@section('title','List Trainer')
@section('content')
<div class="row pt-2">
    @foreach ($trainers as $trainer)
    <div class="col-md-3" style="width:18rem">
        <div class="card">
            <img class="card-img-top rounded-circle mx-auto pt-2"  src="/images/{{$trainer->avatar}}" alt="Card image cap"  style="height:100px;width:100px">
            <div class="card-body">
                <h5 class="card-title">{{$trainer->name}}</h5>
                <p class="card-text text-center">{{$trainer->description}}</p>
                <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver más..</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
