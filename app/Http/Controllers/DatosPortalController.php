<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\Http\Contador;

use colegio\DatosPortal;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\DatosPortalFormRequest;
use DB;

class DatosPortalController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request )
    {

        $template = 'portal.datosportal.index';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        if($request)
        {
            $query=trim($request->get('searchText'));
            $datosportal=DB::table('datosportal')->where('nombre','LIKE','%'.$query.'%')->paginate(5);
            ;

             return view('portal.datosportal.index')->with(["datosportal"=>$datosportal,"searchText"=>$query, "cantidad" => $cantidad]);
        }
    }
    public function create()
    {
        return view('portal.datosportal.create');

    }
    public function store(DatosPortalFormRequest $request)
    {
        $datosportal= new DatosPortal;
        $datosportal->nombre=$request->get('nombre');
        $datosportal->mision=$request->get('mision');
        $datosportal->vision=$request->get('vision');
        $datosportal->objetivoGeneral=$request->get('objetivoGeneral');
        $datosportal->descripcion=$request->get('descripcion');
        $datosportal->logo=$request->get('logo');
        $datosportal->save();
        return Redirect::to('portal/datosportal');

    }

    public function show($id)
    {
        return view("portal.datosportal.show",["datosportal"=>DatosPortal::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("portal.datosportal.edit",["datosportal"=>DatosPortal::findOrFail($id)]);

    }

    public function update(DatosPortalFormRequest $request,$id)
    {
        $datosportal = DatosPortal::findOrFail($id);
        $datosportal->nombre = $request->get('nombre');
        $datosportal->mision = $request->get('mision');
        $datosportal->vision = $request->get('vision');
        $datosportal->objetivoGeneral = $request->get('objetivoGeneral');
        $datosportal->descripcion = $request->get('descripcion');
        $datosportal->logo = $request->get('logo');
        $datosportal->update();
        return Redirect::to('portal/datosportal');

    }
    public function destroy($id)
    {

        $datosportal=DatosPortal::findOrFail($id);
        $datosportal->delete();
        return Redirect::to('portal/datosportal');


    }

}
