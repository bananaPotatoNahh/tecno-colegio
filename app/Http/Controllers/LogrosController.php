<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\Http\Contador;
use colegio\Logros;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\LogrosFormRequest;
use DB;

use Fpdf;
class LogrosController extends Controller
{



    public function __construct()
    {

    }
    public function index(Request $request )
    {

        if($request)
        {$template = 'portal.logros.index';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);

            $query=trim($request->get('searchText'));
            $logros=DB::table('logros')->where('titulo','LIKE','%'.$query.'%')->paginate(5);


            return view('portal.logros.index')->with(["logros"=>$logros,"searchText"=>$query,"cantidad" => $cantidad]);
        }
    }
    public function publica(Request $request )
    {

        if($request)
        {$template = 'portal.logros.publica';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);

            $logros=DB::table('logros')->paginate(8);


            return view('portal.logros.publica')->with(["logros"=>$logros,"cantidad" => $cantidad]);
        }
    }
    public function create()
    {$template = 'portal.logros.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view('portal.logros.create')->with([ "cantidad" => $cantidad]);

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
    {$template = 'portal.logros.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);


        return view("portal.logros.edit",["logros"=>logros::findOrFail($id),"cantidad" => $cantidad]);

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
    {$template = 'portal.logros.index';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);
        $logros=logros::findOrFail($id);

        $logros->delete();
        return Redirect::to('portal/logros');

    }


    public function reporte()
    {
        $personas=DB::table('logros')->get();
        $pdf= new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35,56,113);
        $pdf::SetFont('Arial','B',16);
        $pdf::Cell(0,10,utf8_decode('Listado de Logros'),0,"","C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetTextColor(0,0,0);//color del texto
        $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

        $pdf::SetFont('Arial','B',12);

        //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
        $pdf::cell(50,8,utf8_decode('Título'),1,"","L",true);
        $pdf::cell(140,8,utf8_decode('Descripción'),1,"","L",true);
        foreach ($personas as $per)
        {
            $pdf::Ln();
            $pdf::SetTextColor(0,0,0);// color del texto
            $pdf::SetFillColor(255,255,255);// color de la celda

            $pdf::SetFont("Arial","",10);

            $pdf::cell(50,8,utf8_decode($per->titulo),1,"","L",true);
            $pdf::cell(140,8,utf8_decode($per->descripcion),1,"","L",true);

        }
        $pdf::Output();
        exit;


    }





}
