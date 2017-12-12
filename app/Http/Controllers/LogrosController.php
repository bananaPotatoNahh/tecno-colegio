<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\Logros;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\LogrosFormRequest;
use DB;

class LogrosController extends Controller
{



    public function __construct()
    {

    }
    public function index(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $logros=DB::table('logros')->where('titulo','LIKE','%'.$query.'%')->paginate(5);


            return view('portal.logros.index')->with(["logros"=>$logros,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view('portal.logros.create');

    }
    public function store(LogrosFormRequest $request)
    {
        $logros= new Logros;
        $logros->titulo=$request->get('titulo');
        $logros->descripcion=$request->get('descripcion');

        $logros->save();
        return Redirect::to('portal/logros');

    }

    public function show($id)
    {
        return view("portal.logros.show",["logros"=>logros::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("portal.logros.edit",["logros"=>logros::findOrFail($id)]);

    }

    public function update(LogrosFormRequest $request,$id)
    {
        $logros = logros::findOrFail($id);
        $logros->titulo = $request->get('titulo');
        $logros->descripcion = $request->get('descripcion');
        $logros->update();
        return Redirect::to('portal/logros');

    }
    public function destroy($id)
    {
        $logros=logros::findOrFail($id);

        $logros->delete();
        return Redirect::to('portal/logros');

    }








}
