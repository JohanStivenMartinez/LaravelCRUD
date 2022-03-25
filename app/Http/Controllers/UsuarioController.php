<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consultar la info en la DB
        $datos['Usuario']=Usuario::paginate(5);

        //pasarle la info con la variable
        return view('Usuario.index', $datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validacion de datos
         $campos=[
            'User'=>'required|String|max:100',
            'Nombre'=>'required|String|max:100',
            'Telefono'=>'required|String|max:11',
            'Direccion'=>'required|String|max:100',
            'Email'=>'required|email',
            'Contraseña'=>'required|String|max:8',
        ];

        $mensaje=[
            //todos los que requieran, attribute es comodin
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        //Prueba de llegada Datos
        //$datosUsuario = request()->all();
        $datosUsuario = request()->except('_token');
        Usuario::insert($datosUsuario);
        //return response()->json($datosUsuario);
        return redirect('Usuario')-> with('mensaje','Usuario agregado con éxito');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Usuario = Usuario::findOrFail($id);
        return view('Usuario.edit', compact('Usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validacion de datos
        $campos=[
            'User'=>'required|String|max:100',
            'Nombre'=>'required|String|max:100',
            'Telefono'=>'required|String|max:11',
            'Direccion'=>'required|String|max:100',
            'Email'=>'required|email',
            'Contraseña'=>'required|String|max:8',
        ];

        $mensaje=[
            //todos los que requieran, attribute es comodin
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);


        //Se busca el registro, se actualiza y vuelve a buscar el formulario con los datos actualizados
        $datosUsuario = request()->except('_token','_method');
        Usuario::where('id', '=', $id)-> update($datosUsuario);

        $Usuario = Usuario::findOrFail($id);
        //se puede dejar en el mismo formulario si se deja el view
        //return view('Usuario.edit', compact('Usuario'));
        return redirect('Usuario')-> with ('mensaje', 'Usuario Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Borrar dato con el id 
        Usuario::destroy($id);
        return redirect('Usuario')-> with ('mensaje', 'Usuario Borrado');
    }
}
