<?php

namespace colegio\Http\Controllers;

use colegio\cargo;
use Illuminate\Http\Request;

use colegio\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\CargoFormRequest;
use DB;

class CargoController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $cargo=DB::table('cargo')->where('nombre','LIKE','%'.$query.'%')->where('estado','=','0')->paginate(5);
            ;

            return view('persona.cargo.index')->with(["cargo"=>$cargo,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view('persona.cargo.create');

    }
    public function store(CargoFormRequest $request)
    {
        $cargo= new Cargo;
        $cargo->nombre=$request->get('nombre');

        $cargo->save();
        return Redirect::to('persona/cargo');

    }

    public function show($id)
    {
        return view("persona.cargo.show",["cargo"=>cargo::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("persona.cargo.edit",["cargo"=>cargo::findOrFail($id)]);

    }

    public function update(CargoFormRequest $request,$id)
    {
        $cargo = cargo::findOrFail($id);
        $cargo->nombre = $request->get('nombre');
        $cargo->update();
        return Redirect::to('persona/cargo');

    }
    public function destroy($id)
    {
        $cargo=cargo::findOrFail($id);
        $cargo->estado='1';
        $cargo->update();
        return Redirect::to('persona/cargo');

    }



}
