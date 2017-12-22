<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\Http\Contador;
use colegio\noticias;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\ NoticiaFormRequest;
use DB;
use Fpdf;
class noticiasController extends Controller
{


    public function __construct()
    {

    }
    public function index(Request $request )
    { $template = 'portal.noticias.index';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        if($request)
        {
            $query=trim($request->get('searchText'));
            $noticias=DB::table('noticias')->where('titulo','LIKE','%'.$query.'%')->paginate(5);
            ;

            return view('portal.noticias.index')->with(["noticias"=>$noticias,"searchText"=>$query, "cantidad" => $cantidad]);
        }
    }
    public function publica(Request $request )
    {$template = 'portal.noticias.publica';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        if($request)
        {
            $noticias=DB::table('noticias')->paginate(5);
            return view('portal.noticias.publica',["noticias"=>$noticias, "cantidad" => $cantidad]);

        }
    }

    public function create()
    {$template = 'portal.noticias.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view('portal.noticias.create')->with([ "cantidad" => $cantidad]);

    }
    public function store(NoticiaFormRequest $request)
    {
        $noticias= new Noticias;
        $noticias->titulo=$request->get('titulo');
        $noticias->descripcion=$request->get('descripcion');
        $noticias->save();
        return Redirect::to('portal/noticias');

    }

    public function show($id)
    {

        return view("portal.noticias.show",["noticias"=>noticias::findOrFail($id)]);
    }
    public function edit($id)
    {$template = 'portal.noticias.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);


        return view("portal.noticias.edit",["noticias"=>noticias::findOrFail($id), "cantidad" => $cantidad]);

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
    public function reporte()
    {
        $personas=DB::table('noticias')->get();
        $pdf= new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35,56,113);
        $pdf::SetFont('Arial','B',16);
        $pdf::Cell(0,10,utf8_decode('Listado de Noticias'),0,"","C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetTextColor(0,0,0);//color del texto
        $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

        $pdf::SetFont('Arial','B',12);

        //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
        $pdf::cell(30,8,utf8_decode('Título'),1,"","L",true);
        $pdf::cell(160,8,utf8_decode('Descripción'),1,"","L",true);
        foreach ($personas as $per)
        {
            $pdf::Ln();
            $pdf::SetTextColor(0,0,0);// color del texto
            $pdf::SetFillColor(255,255,255);// color de la celda

            $pdf::SetFont("Arial","",10);

            $pdf::cell(30,8,utf8_decode($per->titulo),1,"","L",true);
            $pdf::cell(160,8,utf8_decode($per->descripcion),1,"","L",true);

        }
        $pdf::Output();
        exit;


    }



}
