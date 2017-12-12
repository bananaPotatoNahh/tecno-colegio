<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\noticias;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\ NoticiaFormRequest;
use DB;
class noticiasController extends Controller
{


    public function __construct()
    {

    }
    public function index(Request $request )
    {
        if($request)
        {
            $query=trim($request->get('searchtext'));
            $noticias=DB::table('noticias')->where('titulo','LIKE','%'.$query.'%')->paginate(10);
            return view('portal.noticias.index',["noticias"=>$noticias,"searchText"=>$query]);

        }
    }
    public function create()
    {
        return view('portal.noticias.create');

    }
    public function store(NoticiaFormRequest $request)
    {
        $noticias= new Noticias;
        $noticias->titulo=$request->get('titulo');
        $noticias->descripcion=$request->get('descripcion');
        $noticias->idportal='1';

        $noticias->save();
        return Redirect::to('portal/noticias');

    }

    public function show($id)
    {
        return view("portal.noticias.show",["noticias"=>noticias::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("portal.noticias.edit",["noticias"=>noticias::findOrFail($id)]);

    }

    public function update(NoticiaFormRequest $request,$id)
    {
        $noticias = Noticias::findOrFail($id);
        $noticias->titulo = $request->get('titulo');
        $noticias->descripcion = $request->get('descripcion');
        $noticias->update();
        return Redirect::to('portal/noticias');

    }
    public function destroy($id)
    {
        $noticias=noticias::findOrFail($id);
        $noticias->delete();
        return Redirect::to('portal/noticias');

    }



}
