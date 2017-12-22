<?php

namespace colegio\Http\Controllers;

use colegio\User;
use Illuminate\Http\Request;

use colegio\Http\Requests;

use colegio\Http\Contador;
use colegio\persona;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\PersonaFormRequest;
use colegio\Http\Requests\AdministrativoFormRequest;
use DB;
use Fpdf;

class AdministrativoController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $template = 'persona.administrativo.index';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);


        if ($request) {
            $query = trim($request->get('searchText'));
            $personas = DB::table('persona')->where('codigo', 'LIKE', '%' . $query . '%')->where('tipo', '=', '3')->paginate(5);;

            return view('persona.administrativo.index')->with(["personas" => $personas, "searchText" => $query, "cantidad" => $cantidad]);
        }
    }

    public function publica(Request $request)
    {
        $template = 'persona.administrativo.publica';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);
        if ($request) {
            $persona = DB::table('persona')->where('codigo')->where('tipo', '=', '3')->paginate(5);
            return view('persona.administrativo.publica')->with(["persona" => $persona, "cantidad" => $cantidad]);
        }
    }

    public function create()
    {
        $template = 'persona.administrativo.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view('persona.administrativo.create')->with(["cantidad" => $cantidad]);

    }

    public function store(PersonaFormRequest $request)
    {
        $personas = new persona;
        $personas->nombre = $request->get('nombre');
        $personas->apellido = $request->get('apellido');
        $personas->direccion = $request->get('direccion');
        $personas->numerodocumento = $request->get('numerodocumento');
        $personas->correoelectronico = $request->get('correoelectronico');
        $personas->codigo = $request->get('codigo');
        $personas->tipo = $request->get('tipo');;
        $personas->save();

        $user = new User();
        $user->name = $request->get('nombre');
        $user->email = $request->get('correoelectronico');
        $user->password = bcrypt($request->get('numerodocumento'));
        $user->rol = "ADMINISTRATIVO";
        $user->save();

        return Redirect::to('persona/administrativo');

    }

    public function show($id)
    {
        $template = 'persona.administrativo.create';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);

        return view("persona.administrativo.show", ["personas" => persona::findOrFail($id), "cantidad" => $cantidad]);
    }

    public function edit($id)
    {
        $template = 'persona.administrativo.edit';
        Contador::insertarRegistro($template);
        $cantidad = Contador::getCantidadTemplate($template);


        return view("persona.administrativo.edit", ["personas" => persona::findOrFail($id), "cantidad" => $cantidad]);

    }

    public function update(PersonaFormRequest $request, $id)
    {
        $personas = persona::findOrFail($id);
        $personas->nombre = $request->get('nombre');
        $personas->apellido = $request->get('apellido');
        $personas->direccion = $request->get('direccion');
        $personas->numerodocumento = $request->get('numerodocumento');
        $personas->correoelectronico = $request->get('correoelectronico');
        $personas->codigo = $request->get('codigo');
        $personas->update();
        return Redirect::to('persona/administrativo');

    }

    public function destroy($id)
    {

        $personas = persona::findOrFail($id);
        $personas->delete();
        return Redirect::to('persona/administrativo');


    }

    public function reporte()
    {
        $personas = DB::table('persona')->where('tipo', '=', '3')->get();
        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetTextColor(35, 56, 113);
        $pdf::SetFont('Arial', 'B', 16);
        $pdf::Cell(0, 10, utf8_decode('Listado Administrativos'), 0, "", "C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetTextColor(0, 0, 0);//color del texto
        $pdf::SetFillColor(255, 228, 196);//color del Fondo de la celda

        $pdf::SetFont('Arial', 'B', 12);

        //ancho de las columnas todos esos numeros sumados debe dar un  promedio de 190
        $pdf::cell(30, 8, utf8_decode('Nombre'), 1, "", "L", true);
        $pdf::cell(30, 8, utf8_decode('Apellido'), 1, "", "L", true);
        $pdf::cell(50, 8, utf8_decode('Dirección'), 1, "", "L", true);
        $pdf::cell(25, 8, utf8_decode('Documento'), 1, "", "L", true);
        $pdf::cell(35, 8, utf8_decode('Correo Electrónico'), 1, "", "L", true);
        $pdf::cell(20, 8, utf8_decode('Código'), 1, "", "L", true);
        foreach ($personas as $per) {
            $pdf::Ln();
            $pdf::SetTextColor(0, 0, 0);// color del texto
            $pdf::SetFillColor(255, 255, 255);// color de la celda

            $pdf::SetFont("Arial", "", 10);

            $pdf::cell(30, 8, utf8_decode($per->nombre), 1, "", "L", true);
            $pdf::cell(30, 8, utf8_decode($per->apellido), 1, "", "L", true);
            $pdf::cell(50, 8, utf8_decode($per->direccion), 1, "", "L", true);
            $pdf::cell(25, 8, utf8_decode($per->numerodocumento), 1, "", "L", true);
            $pdf::cell(35, 8, utf8_decode($per->correoelectronico), 1, "", "L", true);
            $pdf::cell(20, 8, utf8_decode($per->codigo), 1, "", "L", true);

        }
        $pdf::Output();
        exit;


    }

}
