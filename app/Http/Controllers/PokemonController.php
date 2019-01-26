<?php

namespace LaravelPrueba\Http\Controllers;

use Illuminate\Http\Request;
use LaravelPrueba\Pokemon;

class PokemonController extends Controller
{
    //

    public function index(Request $request)
    {
        $pokemons = Pokemon::all();
        if ($request->ajax()) {
            return response()->json($pokemons, 200);
        }
        return view('pokemons.index');
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->image = $request->input('image');
            $pokemon->save();
            return response()->json([
                "message" => "Pokemon creado correctamente",
                "pokemon" => $pokemon
            ], 200);
        }

    }

}
