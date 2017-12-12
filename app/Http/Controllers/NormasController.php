<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;


use colegio\Normas;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\NormaFormRequest;
use DB;





class NormasController extends Controller
{


    public function __construct()
    {

    }
    public function index(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $normas=DB::table('normas')->where('codigo','LIKE','%'.$query.'%')->paginate(5);
            ;

            return view('portal.normas.index')->with(["normas"=>$normas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view('portal.normas.create');

    }
    public function store(NormaFormRequest $request)
    {
        $normas= new normas;
        $normas->codigo=$request->get('codigo');
        $normas->descripcion=$request->get('descripcion');
        $normas->save();
        return Redirect::to('portal/normas');

    }

    public function show($id)
    {
        return view("portal.normas.show",["normas"=>normas::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("portal.normas.edit",["normas"=>normas::findOrFail($id)]);

    }

    public function update(NormaFormRequest $request,$id)
    {
        $normas = normas::findOrFail($id);
        $normas->codigo = $request->get('codigo');
        $normas->descripcion= $request->get('descripcion');
        $normas->update();
        return Redirect::to('portal/normas');

    }
    public function destroy($id)
    {
        $normas=normas::findOrFail($id);

        $normas->delete();
        return Redirect::to('portal/normas');


    }







}

