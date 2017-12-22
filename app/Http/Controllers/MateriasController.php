<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;
use colegio\Http\Requests;
use colegio\Materias;
use colegio\Http\Contador;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\MateriaFormRequest;
use DB;

use Fpdf;

class materiasController extends Controller
{


    public function __construct()
    {

    }

    public function index(Request $request)
    {

        if ($request) {
            $template = 'planestudio.materias.index';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
            $query = trim($request->get('searchText'));
            $materias = DB::table('materias')->where('sigla', 'LIKE', '%' . $query . '%')->paginate(4);
            return view('planestudio.materias.index')->with(["materias" => $materias, "searchText" => $query, "cantidad" => $cantidad]);
        }
    }

    public function create()
    {
        $template = 'planestudio.materias.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view('planestudio.materias.create')->with(["cantidad" => $cantidad]);

    }

    public function store(MateriaFormRequest $request)
    {
        $materias = new materias;
        $materias->nombre = $request->get('nombre');
        $materias->sigla = $request->get('sigla');
        $materias->contenido = $request->get('contenido');
        $materias->save();
        return Redirect::to('planestudio/materias');

    }

    public function show($id)
    {
        $template = 'planestudio.materias.show';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view("planestudio.materias.show", ["materias" => materias::findOrFail($id), "cantidad" => $cantidad]);
    }

    public function edit($id)
    {
        $template = 'planestudio.materias.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view("planestudio.materias.edit", ["materias" => materias::findOrFail($id), "cantidad" => $cantidad]);

    }

    public function update(MateriaFormRequest $request, $id)
    {
        $materias = materias::findOrFail($id);
        $materias->nombre = $request->get('nombre');
        $materias->sigla = $request->get('sigla');
        $materias->contenido = $request->get('contenido');
        $materias->update();
        return Redirect::to('planestudio/materias');

    }

    public function destroy($id)
    {
        $materias = materias::findOrFail($id);

        $materias->delete();
        return Redirect::to('planestudio/materias');


    }

    public function reporte()
    {
        $personas = DB::table('materias')->get();
        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35, 56, 113);
        $pdf::SetFont('Arial', 'B', 16);
        $pdf::Cell(0, 10, utf8_decode('Listado de Logros'), 0, "", "C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetTextColor(0, 0, 0);//color del texto
        $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

        $pdf::SetFont('Arial', 'B', 12);

        //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
        $pdf::cell(40, 8, utf8_decode('Nombre'), 1, "", "L", true);
        $pdf::cell(40, 8, utf8_decode('Sigla'), 1, "", "L", true);
        $pdf::cell(110, 8, utf8_decode('Contenido'), 1, "", "L", true);
        foreach ($personas as $per) {
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(40, 8, utf8_decode($per->nombre), 1, "", "L", true);
            $pdf::cell(40, 8, utf8_decode($per->sigla), 1, "", "L", true);
            $pdf::cell(110, 8, utf8_decode($per->contenido), 1, "", "L", true);

        }
        $pdf::Output();
        exit;


    }


}
