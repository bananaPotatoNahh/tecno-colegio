<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\Http\Contador;

use colegio\DatosPortal;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\DatosPortalFormRequest;
use DB;
use Fpdf;

class DatosPortalController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {

        if ($request) {
            $template = 'portal.datosportal.index';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
            $query = trim($request->get('searchText'));
            $datosportal = DB::table('datosportal')->where('nombre', 'LIKE', '%' . $query . '%')->paginate(5);;
            return view('portal.datosportal.index')->with(["datosportal" => $datosportal, "searchText" => $query, "cantidad" => $cantidad]);
        }
    }

    public function publica(Request $request)
    {

        if ($request) {
            $template = 'portal.datosportal.publica';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
            $datosportal = DB::table('datosportal')->paginate(5);
            return view('portal.datosportal.publica')->with(["datosportal" => $datosportal, "cantidad" => $cantidad]);
        }
    }

    public function create()
    {
        $template = 'portal.datosportal.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view('portal.datosportal.create')->with(["cantidad" => $cantidad]);

    }

    public function store(DatosPortalFormRequest $request)
    {
        $datosportal = new DatosPortal;
        $datosportal->nombre = $request->get('nombre');
        $datosportal->mision = $request->get('mision');
        $datosportal->vision = $request->get('vision');
        $datosportal->objetivogeneral = $request->get('objetivoGeneral');
        $datosportal->descripcion = $request->get('descripcion');
        $datosportal->logo = $request->get('logo');
        $datosportal->save();
        return Redirect::to('portal/datosportal');

    }

    public function show($id)
    {
        $template = 'portal.datosportal.show';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);
        return view("portal.datosportal.show", ["datosportal" => DatosPortal::findOrFail($id), "cantidad" => $cantidad]);
    }

    public function edit($id)
    {
        $template = 'portal.datosportal.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view("portal.datosportal.edit", ["datosportal" => DatosPortal::findOrFail($id), "cantidad" => $cantidad]);

    }

    public function update(DatosPortalFormRequest $request, $id)
    {
        $datosportal = DatosPortal::findOrFail($id);
        $datosportal->nombre = $request->get('nombre');
        $datosportal->mision = $request->get('mision');
        $datosportal->vision = $request->get('vision');
        $datosportal->objetivogeneral = $request->get('objetivoGeneral');
        $datosportal->descripcion = $request->get('descripcion');
        $datosportal->logo = $request->get('logo');
        $datosportal->update();
        return Redirect::to('portal/datosportal');

    }

    public function destroy($id)
    {


        $datosportal = DatosPortal::findOrFail($id);
        $datosportal->delete();
        return Redirect::to('portal/datosportal');


    }

    public function reporte()
    {
        $personas = DB::table('datosportal')->get();
        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35, 56, 113);
        $pdf::SetFont('Arial', 'B', 16);
        $pdf::Cell(0, 10, utf8_decode('Listado Administrativos'), 0, "", "C");
        foreach ($personas as $per) {
            $pdf::Ln();
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);//color del texto
            $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

            $pdf::SetFont('Arial', 'B', 12);

            //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
            $pdf::Ln();
            $pdf::cell(190, 8, utf8_decode('Nombre'), 1, "", "L", true);
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(190, 8, utf8_decode($per->nombre), 1, "", "L", true);

            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);//color del texto
            $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda
            $pdf::SetFont('Arial', 'B', 12);
            $pdf::cell(190, 8, utf8_decode('mision'), 1, "", "L", true);
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(190, 8, utf8_decode($per->mision), 1, "", "L", true);


            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);//color del texto
            $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda
            $pdf::SetFont('Arial', 'B', 12);
            $pdf::cell(190, 8, utf8_decode('vision'), 1, "", "L", true);
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(190, 8, utf8_decode($per->vision), 1, "", "L", true);

            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);//color del texto
            $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda
            $pdf::SetFont('Arial', 'B', 12);
            $pdf::cell(190, 8, utf8_decode('Objetivo'), 1, "", "L", true);
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(190, 8, utf8_decode($per->objetivogeneral), 1, "", "L", true);


            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);//color del texto
            $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda
            $pdf::SetFont('Arial', 'B', 12);
            $pdf::cell(190, 8, utf8_decode('Correo Electrónico'), 1, "", "L", true);


            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(190, 8, utf8_decode($per->descripcion), 1, "", "L", true);
        }
        $pdf::Output();
        exit;


    }

}
