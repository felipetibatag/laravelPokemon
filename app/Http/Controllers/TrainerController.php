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
        if ($request->hasFile('avatar')) { //Verificar que llegue algo en la variable
            $archivoImagen = $request . file('avatar'); //Recibir el archivo desde el formulario e indicar que es tipo archivo.
            $nombreArchivo = time() . $archivoImagen->getClientOriginalName(); //asignar un nombre que no se repita en el servidor
            $archivoImagen->move(public_path() .
                '/images/', $nombreArchivo); // mover ahora el archivo a la carpeta publica del servidor
        }
        $trainer = new Trainer();
        $trainer->name = $request->input("nombre");
        $trainer->avatar = $nombreArchivo;
        $trainer->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
