<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['Tasks']=Tasks::paginate(5);
        return view('Tasks.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Tasks.createT');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosTasks = request()->except('_token');
        Tasks::insert($datosTasks);
        //return response()->json($datosTasks);
        return redirect('Tasks')-> with('mensaje','Tarea agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Tasks = Tasks::findOrFail($id);
        return view('Tasks.editT', compact('Tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //validacion de datos
        $campos=[
            'Nombre'=>'required|String|max:100',
            'FechaInicio'=>'required|String|max:100',
            'FechaFin'=>'required|String|max:11',
            'Estado'=>'required|String|max:100'
        ];

        $mensaje=[
            //todos los que requieran, attribute es comodin
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        //Se busca el registro, se actualiza y vuelve a buscar el formulario con los datos actualizados
        $datosTasks = request()->except('_token','_method');
        Tasks::where('id', '=', $id)-> update($datosTasks);

        $Tasks = Tasks::findOrFail($id);
        //se puede dejar en el mismo formulario si se deja el view
        //return view('Usuario.edit', compact('Usuario'));
        return redirect('Tasks')-> with ('mensaje', 'Tarea Modificada');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tasks::destroy($id);
        return redirect('Tasks')-> with ('mensaje', 'Tarea Borrada');
    }
}
