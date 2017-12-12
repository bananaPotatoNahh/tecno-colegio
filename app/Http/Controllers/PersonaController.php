<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\persona;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\PersonaFormRequest;
use DB;
class PersonaController extends Controller
{



    public function __construct()
    {

    }
    public function index(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $personas=DB::table('persona')->where('codigo','LIKE','%'.$query.'%')->where('tipo','=','1')->paginate(5);
            ;

            return view('persona.persona.index')->with(["persona"=>$personas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view('persona.persona.create');

    }
    public function store(PersonaFormRequest $request)
    {
        $personas= new persona;
        $personas->nombre=$request->get('nombre');
        $personas->apellido=$request->get('apellido');
        $personas->direccion=$request->get('direccion');
        $personas->numerodocumento=$request->get('numerodocumento');
        $personas->correoelectronico=$request->get('correoelectronico');
        $personas->codigo=$request->get('codigo');
        $personas->tipo='1';
        $personas->save();
        return Redirect::to('persona/persona');

    }

    public function show($id)
    {
        return view("persona.persona.show",["persona"=>persona::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("persona.persona.edit",["persona"=>persona::findOrFail($id)]);

    }

    public function update(PersonaFormRequest $request,$id)
    {   $personas = persona::findOrFail($id);
        $personas->nombre=$request->get('nombre');
        $personas->apellido=$request->get('apellido');
        $personas->direccion=$request->get('direccion');
        $personas->numerodocumento=$request->get('numerodocumento');
        $personas->correoelectronico=$request->get('correoelectronico');
        $personas->codigo=$request->get('codigo');
        $personas->update();
        return Redirect::to('persona/persona');

    }
    public function destroy($id)
    {

        $personas=persona::findOrFail($id);
        $personas->delete();
        return Redirect::to('persona/persona');


    }


}
