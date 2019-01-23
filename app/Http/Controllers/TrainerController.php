<?php

namespace LaravelPrueba\Http\Controllers;

use Illuminate\Http\Request;
use LaravelPrueba\Trainer;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
        function index()
    {
        //
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
        function create()
    {
        //
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Verificar que llegue algo en la variable
        if ($request->hasFile('avatar')) {
            $archivoImagen = $request->file('avatar'); //Recibir el archivo desde el formulario e indicar que es tipo archivo.
            $nombreArchivo = time() . $archivoImagen->getClientOriginalName(); //asignar un nombre que no se repita en el servidor
            $archivoImagen->move(public_path() . '/images/', $nombreArchivo); // mover ahora el archivo a la carpeta publica del servidor
        }
        $trainer = new Trainer();
        $trainer->name = $request->input("nombre");
        $trainer->avatar = $nombreArchivo;
        $trainer->description = $request->input("description");
        $trainer->save();
        return "Guardado";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {

        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        //
        return view("trainers.edit", compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except('avatar'));
        if ($request->hasFile('avatar')) {
            $archivoImagen = $request->file('avatar');
            $nombreArchivo = time() . $archivoImagen->getClientOriginalName();
            $archivoImagen->move(public_path() . '/images/', $nombreArchivo);
            $trainer->avatar = $nombreArchivo;
        } else {
            $trainer->avatar = $trainer->avatar;
        }
        $trainer->save();

        return "actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public
        function destroy($id)
    {
        //
    }
}
