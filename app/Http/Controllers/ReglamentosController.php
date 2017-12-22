<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\Http\Contador;
use colegio\reglamentos;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\ReglamentoFormRequest;
use DB;
use Fpdf;
class ReglamentosController extends Controller
{

   public function __construct()
    {

    }
    public function index(Request $request )
    {


        if($request)
        {$template = 'portal.reglamento.index';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
            $query=trim($request->get('searchText'));
            $reglamentos=DB::table('reglamentos')->where('codigo','LIKE','%'.$query.'%')->paginate(5);
            ;

            return view('portal.reglamento.index')->with(["reglamentos"=>$reglamentos,"searchText"=>$query, "cantidad" => $cantidad]);
        }
    }
    public function publica(Request $request )
    {
        if($request)
        {$template = 'portal.reglamento.publica';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
            $reglamentos=DB::table('reglamentos')->paginate(5);
         return view('portal.reglamento.publica')->with(["reglamentos"=>$reglamentos, "cantidad" => $cantidad]);
        }
    }
    public function create()
    {
        $template = 'portal.reglamento.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view('portal.reglamento.create')->with([ "cantidad" => $cantidad]);

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
    {$template = 'portal.reglamento.show';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);
        return view("portal.reglamento.show",["reglamentos"=>reglamentos::findOrFail($id),"cantidad" => $cantidad]);
    }
    public function edit($id)
    {
        $template = 'portal.reglamento.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view("portal.reglamento.edit",["reglamentos"=>reglamentos::findOrFail($id), "cantidad" => $cantidad]);

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




    public function reporte()
    {
        $personas=DB::table('reglamentos')->get();
        $pdf= new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35,56,113);
        $pdf::SetFont('Arial','B',16);
        $pdf::Cell(0,10,utf8_decode('Listado de Normas'),0,"","C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetTextColor(0,0,0);//color del texto
        $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

        $pdf::SetFont('Arial','B',12);

        //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
        $pdf::cell(30,8,utf8_decode('Código'),1,"","L",true);
        $pdf::cell(160,8,utf8_decode('Descripción'),1,"","L",true);
        foreach ($personas as $per)
        {
            $pdf::Ln();
            $pdf::SetTextColor(0,0,0);// color del texto
            $pdf::SetFillColor(255,255,255);// color de la celda

            $pdf::SetFont("Arial","",10);

            $pdf::cell(30,8,utf8_decode($per->codigo),1,"","L",true);
            $pdf::cell(160,8,utf8_decode($per->descripcion),1,"","L",true);

        }
        $pdf::Output();
        exit;


    }



}

