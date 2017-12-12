<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\reglamentos;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\ReglamentoFormRequest;
use DB;
class ReglamentosController extends Controller
{

   public function __construct()
    {

    }
    public function index(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $reglamentos=DB::table('reglamentos')->where('codigo','LIKE','%'.$query.'%')->paginate(5);
            ;

            return view('portal.reglamento.index')->with(["reglamentos"=>$reglamentos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view('portal.reglamento.create');

    }
    public function store(ReglamentoFormRequest $request)
    {
        $reglamentos= new reglamentos;
        $reglamentos->codigo=$request->get('codigo');
        $reglamentos->descripcion=$request->get('descripcion');
        $reglamentos->save();
        return Redirect::to('portal/reglamento');

    }

    public function show($id)
    {
        return view("portal.reglamento.show",["reglamentos"=>reglamentos::findOrFail($id)]);
    }
    public function edit($id)
    {

        return view("portal.reglamento.edit",["reglamentos"=>reglamentos::findOrFail($id)]);

    }

    public function update(ReglamentoFormRequest $request,$id)
    {
        $reglamentos = reglamentos::findOrFail($id);
        $reglamentos->codigo = $request->get('codigo');
        $reglamentos->descripcion= $request->get('descripcion');
        $reglamentos->update();
        return Redirect::to('portal/reglamento');

    }
    public function destroy($id)
    {
        $reglamentos=reglamentos::findOrFail($id);

        $reglamentos->delete();
        return Redirect::to('portal/reglamento');


    }







}

