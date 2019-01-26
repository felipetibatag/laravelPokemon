@extends('layouts.app')
@section('content')
<add-component></add-component>
<create-pokemon-component></create-pokemon-component>
<pokemons-component @pokemon_added="agregarPokemon()"></pokemons-component>
@endsection