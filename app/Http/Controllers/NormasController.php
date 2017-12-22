<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;


use colegio\Http\Contador;
use colegio\Normas;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\NormaFormRequest;
use DB;


use Fpdf;


class NormasController extends Controller
{


    public function __construct()
    {

    }

    public function index(Request $request)
    {

        if ($request) {
            $template = 'portal.normas.index';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
            $query = trim($request->get('searchText'));
            $normas = DB::table('normas')->where('codigo', 'LIKE', '%' . $query . '%')->paginate(5);
            return view('portal.normas.index')->with(["normas" => $normas, "searchText" => $query, "cantidad" => $cantidad]);
        }
    }

    public function publica(Request $request)
    {
        if ($request) {
            $template = 'portal.normas.publica';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
;
            $normas = DB::table('normas')->paginate(5);;

            return view('portal.normas.publica')->with(["normas" => $normas, "cantidad" => $cantidad]);
        }
    }

    public function create()
    {
        $template = 'portal.normas.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view('portal.normas.create')->with(["cantidad" => $cantidad]);

    }

    public function store(NormaFormRequest $request)
    {
        $normas = new normas;
        $normas->codigo = $request->get('codigo');
        $normas->descripcion = $request->get('descripcion');
        $normas->save();
        return Redirect::to('portal/normas');

    }

    public function show($id)
    { $template = 'portal.normas.show';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);
        return view("portal.normas.show", ["normas" => normas::findOrFail($id),"cantidad" => $cantidad]);
    }

    public function edit($id)
    {
        $template = 'portal.normas.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view("portal.normas.edit", ["normas" => normas::findOrFail($id), "cantidad" => $cantidad]);

    }

    public function update(NormaFormRequest $request, $id)
    {
        $normas = normas::findOrFail($id);
        $normas->codigo = $request->get('codigo');
        $normas->descripcion = $request->get('descripcion');
        $normas->update();
        return Redirect::to('portal/normas');

    }

    public function destroy($id)
    {
        $normas = normas::findOrFail($id);
        $normas->delete();
        return Redirect::to('portal/normas');


    }

    public function reporte()
    {
        $personas = DB::table('normas')->get();
        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35, 56, 113);
        $pdf::SetFont('Arial', 'B', 16);
        $pdf::Cell(0, 10, utf8_decode('Listado de Normas'), 0, "", "C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetTextColor(0, 0, 0);//color del texto
        $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

        $pdf::SetFont('Arial', 'B', 12);

        //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
        $pdf::cell(30, 8, utf8_decode('Código'), 1, "", "L", true);
        $pdf::cell(160, 8, utf8_decode('Descripción'), 1, "", "L", true);
        foreach ($personas as $per) {
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(30, 8, utf8_decode($per->codigo), 1, "", "L", true);
            $pdf::cell(160, 8, utf8_decode($per->descripcion), 1, "", "L", true);

        }
        $pdf::Output();
        exit;


    }


}

