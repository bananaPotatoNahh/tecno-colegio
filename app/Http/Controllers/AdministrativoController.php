<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;



use colegio\Administrativo;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\AdministrativoFormRequest;
use DB;
class AdministrativoController extends Controller
{

    public function __construct()
    {

    }
    public function index(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $administrativo=DB::table('administrativo as admi')
                ->join('cargo as car','admi.idcargo','=','car.idcargo')
                ->select('admi.idadministrativo','admi.nombre','admi.apellido','admi.direccion','admi.numerodocumento','admi.correoelectronico','admi.codigo','car.nombre as cargo')
                ->where('admi.codigo','LIKE','%'.$query.'%')
                ->orwhere('admi.nombre','LIKE','%'.$query.'%')
                ->paginate(5);
            ;

            return view('persona.administrativo.index')->with(["administrativo"=>$administrativo,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $cargo=DB::table('cargo')-where('estado','=','0')->get();
        return view('persona.administrativo.create',["cargo"=>$cargo]);

    }
    public function store(AdministrativoFormRequest $request)
    {
        $administrativo= new administrativo;
        $administrativo->nombre=$request->get('nombre');
        $administrativo->apellido=$request->get('apellido');
        $administrativo->direccion=$request->get('direccion');
        $administrativo->numerodocumento=$request->get('numerodocumento');
        $administrativo->correoelectronico=$request->get('correoelectronico');
        $administrativo->codigo=$request->get('codigo');
        $administrativo->idcargo=$request->get('idcargo');
        $administrativo->save();
        return Redirect::to('persona/administrativo');

    }

    public function show($id)
    {
        return view("persona.administrativo.show",["administrativo"=>administrativo::findOrFail($id)]);
    }
    public function edit($id)
    {
        $administrativo= administrativo::findOrFail($id);
        $cargo=DB::table('cargo')->where('estado','=','0')->get();

        return view("persona.administrativo.edit",["administrativo"=>$administrativo,"cargo"=>$cargo]);

    }

    public function update(AdministrativoFormRequest $request,$id)
    {   $administrativo = administrativo::findOrFail($id);
        $administrativo->nombre=$request->get('nombre');
        $administrativo->apellido=$request->get('apellido');
        $administrativo->direccion=$request->get('direccion');
        $administrativo->numerodocumento=$request->get('numerodocumento');
        $administrativo->correoelectronico=$request->get('correoelectronico');
        $administrativo->codigo=$request->get('codigo');
        $administrativo->idcargo=$request->get('idcargo');
        $administrativo->update();
        return Redirect::to('persona/administrativo');

    }
    public function destroy($id)
    {

        $administrativo=administrativo::findOrFail($id);
        $administrativo->delete();
        return Redirect::to('persona/administrativo');


    }


}
