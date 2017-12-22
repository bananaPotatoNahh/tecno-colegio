<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;
use colegio\Http\Contador;
use Illuminate\Support\Facades\Storage;
use colegio\planestudio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use colegio\Http\Requests\PlanEstudioFormRequest;
use DB;
use Fpdf;

class PlanEstudioController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request) {
            $template = 'planestudio.planestudio.index';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
            $query = trim($request->get('searchText'));
            $planestudio = DB::table('planestudio')->where('sigla', 'LIKE', '%' . $query . '%')->paginate(5);;

            return view('planestudio.planestudio.index')->with(["planestudio" => $planestudio, "searchText" => $query, "cantidad" => $cantidad]);
        }
    }

    public function publica(Request $request)
    {
        if ($request) {
            $template = 'planestudio.planestudio.publica';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);
            $planestudio = DB::table('planestudio')->paginate(5);
            return view('planestudio.planestudio.publica')->with(["planestudio" => $planestudio, "cantidad" => $cantidad]);
        }
    }

    public function create()
    {
        $template = 'planestudio.planestudio.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);
        return view('planestudio.planestudio.create')->with(["cantidad" => $cantidad]);

    }

    public function store(planestudioFormRequest $request)
    {
        $planestudio = new planestudio;
        $planestudio->nombre = $request->get('nombre');
        $planestudio->sigla = $request->get('sigla');
        if (Input::hasFile('planestudio')) {
            $file = Input::file('planestudio');
            $file->move(public_path() . '/pdf/planestudio/', $file->getClientOriginalName());
            $planestudio->decripcion = $file->getClientOriginalName();
        }

        $planestudio->save();
        return Redirect::to('planestudio/planestudio');

    }

    public function show($id)
    {
        $template = 'planestudio.planestudio.show';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view("planestudio.planestudio.show", ["planestudio" => planestudio::findOrFail($id), "cantidad" => $cantidad]);
    }

    public function edit($id)
    {
        $template = 'planestudio.planestudio.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        $planestudio = planestudio::findOrFail($id);

        return view("planestudio.planestudio.edit", ["planestudio" => $planestudio::findOrFail($id), "cantidad" => $cantidad]);

    }

    public function update(planestudioFormRequest $request, $id)
    {
        $planestudio = planestudio::findOrFail($id);
        $planestudio->nombre = $request->get('nombre');
        $planestudio->sigla = $request->get('sigla');
        if (Input::hasFile('planestudio')) {
            $file = Input::file('planestudio');
            $file->move(public_path() . '/pdf/planestudio/', $file->getClientOriginalName);
            $planestudio->descripcion = $file->getClientOriginalName();
        }
        $planestudio->update();
        return Redirect::to('planestudio/planestudio');

    }

    public function destroy($id)
    {
        $planestudio = planestudio::findOrFail($id);
        $planestudio->delete();
        return Redirect::to('planestudio/planestudio');


    }

    public function descargar($src)
    {
        $file_name = basename($src) . PHP_EOL;
        $size = filesize($src);
    }

    public function reporte()
    {
        $planestudios = DB::table('planestudio')->get();
        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35, 56, 113);
        $pdf::SetFont('Arial', 'B', 16);
        $pdf::Cell(0, 10, utf8_decode('Listado Plan de estudios'), 0, "", "C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetTextColor(0, 0, 0);//color del texto
        $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

        $pdf::SetFont('Arial', 'B', 12);

        //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
        $pdf::cell(50, 8, utf8_decode('Nombre'), 1, "", "L", true);
        $pdf::cell(20, 8, utf8_decode('Sigla'), 1, "", "L", true);
        $pdf::cell(120, 8, utf8_decode('Descripción'), 1, "", "L", true);
        foreach ($planestudios as $per) {
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(50, 8, utf8_decode($per->nombre), 1, "", "L", true);
            $pdf::cell(20, 8, utf8_decode($per->sigla), 1, "", "L", true);
            $pdf::cell(120, 8, utf8_decode($per->decripcion), 1, "", "L", true);

        }
        $pdf::Output();
        exit;


    }

    public function updat(Request $request)
    {

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre, \File::get($file));

        return "archivo guardado";
    }


//
}
