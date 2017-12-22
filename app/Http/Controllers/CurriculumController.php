<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;


use colegio\Http\Contador;
use Illuminate\Support\Facades\Storage;
use colegio\curriculum;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use colegio\Http\Requests\CurriculumFormRequest;
use DB;
use Fpdf;

class CurriculumController extends Controller
{


    public function __construct()
    {

    }

    public function index(Request $request)
    {

        if ($request) {
            $template = 'persona.curriculum.index';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);

            $query = trim($request->get('searchText'));
            $curriculum = DB::table('curriculum')->where('codigo', 'LIKE', '%' . $query . '%')->paginate(5);;

            return view('persona.curriculum.index')->with(["curriculum" => $curriculum, "searchText" => $query, "cantidad" => $cantidad]);
        }
    }

    public function publica(Request $request)
    {

        if ($request) {
            $template = 'persona.curriculum.publica';
            Contador::insertarRegistro($template);
            $cantidad = Contador::getCantidadTemplate($template);

            $curriculum = DB::table('curriculum')->paginate(5);
            return view('persona.curriculum.publica')->with(["curriculum" => $curriculum, "cantidad" => $cantidad]);
        }
    }

    public function create()
    {
        $template = 'persona.curriculum.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view('persona.curriculum.create')->with(["cantidad" => $cantidad]);

    }

    public function store(curriculumFormRequest $request)
    {
        $curriculum = new curriculum;
        $curriculum->codigo = $request->get('codigo');
        if (Input::hasFile('curriculum')) {
            $file = Input::file('curriculum');
            $file->move(public_path() . '/pdf/curriculum/', $file->getClientOriginalName());
            $curriculum->curriculum = $file->getClientOriginalName();
        }

        $curriculum->save();
        return Redirect::to('persona/curriculum');

    }

    public function show($id)
    {
        $template = 'persona.curriculum.show';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view("persona.curriculum.show", ["curriculum" => curriculum::findOrFail($id), "cantidad" => $cantidad]);
    }

    public function edit($id)
    {
        $template = 'persona.curriculum.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        $curriculum = curriculum::findOrFail($id);

        return view("persona.curriculum.edit", ["curriculum" => $curriculum::findOrFail($id), "cantidad" => $cantidad]);

    }

    public function update(CurriculumFormRequest $request, $id)
    {
        $curriculum = curriculum::findOrFail($id);
        $curriculum->codigo = $request->get('codigo');
        if (Input::hasFile('curriculum')) {
            $file = Input::file('curriculum');
            $file->move(public_path() . '/pdf/curriculum/', $file->getClientOriginalName);
            $curriculum->curriculum = $file->getClientOriginalName();
        }
        $curriculum->update();
        return Redirect::to('persona/curriculum');

    }

    public function destroy($id)
    {
        $curriculum = curriculum::findOrFail($id);
        $curriculum->delete();
        return Redirect::to('persona/curriculum');
    }

    public function descargar($src)
    {
        $file_name = basename($src) . PHP_EOL;
        $size = filesize($src);

    }


    public function reporte()
    {
        $personas = DB::table('curriculum')->get();
        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35, 56, 113);
        $pdf::SetFont('Arial', 'B', 16);
        $pdf::Cell(0, 10, utf8_decode('Listado Curriculums'), 0, "", "C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetTextColor(0, 0, 0);//color del texto
        $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

        $pdf::SetFont('Arial', 'B', 12);

        //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
        $pdf::cell(30, 8, utf8_decode('código'), 1, "", "L", true);
        $pdf::cell(160, 8, utf8_decode('nombre curriulum'), 1, "", "L", true);
        foreach ($personas as $per) {
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(30, 8, utf8_decode($per->codigo), 1, "", "L", true);
            $pdf::cell(160, 8, utf8_decode($per->curriculum), 1, "", "L", true);

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
