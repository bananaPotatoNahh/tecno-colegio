<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;
use colegio\Http\Requests;
use colegio\Materias;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\MateriaFormRequest;
use DB;

class materiasController extends Controller
{


    public function __construct()
    {

    }
    public function index(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $materias=DB::table('materias')->where('sigla','LIKE','%'.$query.'%')->paginate(5);
            ;

            return view('planestudio.materias.index')->with(["materias"=>$materias,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view('planestudio.materias.create');

    }
    public function store(MateriaFormRequest $request)
    {
        $materias= new materias;
        $materias->nombre=$request->get('nombre');
        $materias->sigla=$request->get('sigla');
        $materias->contenido=$request->get('contenido');
        $materias->save();
        return Redirect::to('planestudio/materias');

    }

    public function show($id)
    {
        return view("planestudio.materias.show",["materias"=>materias::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("planestudio.materias.edit",["materias"=>materias::findOrFail($id)]);

    }

    public function update(MateriaFormRequest $request,$id)
    {
        $materias = materias::findOrFail($id);
        $materias->nombre = $request->get('nombre');
        $materias->sigla = $request->get('sigla');
        $materias->contenido = $request->get('contenido');
        $materias->update();
        return Redirect::to('planestudio/materias');

    }
    public function destroy($id)
    {
        $materias=materias::findOrFail($id);

        $materias->delete();
        return Redirect::to('planestudio/materias');


    }







}
