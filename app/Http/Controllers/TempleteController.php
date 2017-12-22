<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\Http\Requests;
use colegio\Templete;

use colegio\administrativo;
use colegio\curriculum;
use colegio\datosPortal;
use colegio\logros;


use colegio\Http\Contador;
use colegio\normas;
use colegio\noticias;
use colegio\reglamentos;
use colegio\persona;
use Illuminate\Support\Facades\Redirect;
use colegio\Http\Requests\TempleteFormRequest;
use DB;
class TempleteController extends Controller
{
    public function show(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $administrativos=DB::table('persona')->where('codigo','LIKE','%'.$query.'%')->where('nombre','LIKE','%'.$query.'%')->where('tipo','=','3')->get();
            $curriculums=DB::table('curriculum')->where('codigo','LIKE','%'.$query.'%')->get();
            $datosportal=DB::table('datosportal')->where('nombre','LIKE','%'.$query.'%')->get();
            $docentes=DB::table('persona')->where('codigo','LIKE','%'.$query.'%')->where('nombre','LIKE','%'.$query.'%')->where('tipo','=','2')->get();
            $logros=DB::table('logros')->where('titulo','LIKE','%'.$query.'%')->get();
            $materias=DB::table('materias')->where('sigla','LIKE','%'.$query.'%')->get();;
            $normas=DB::table('normas')->where('codigo','LIKE','%'.$query.'%')->get();
            $noticias=DB::table('noticias')->where('titulo','LIKE','%'.$query.'%')->get();
            $alumnos=DB::table('persona')->where('codigo','LIKE','%'.$query.'%')->where('nombre','LIKE','%'.$query.'%')->where('tipo','=','1')->get();
            $planestudio=DB::table('planestudio')->where('sigla','LIKE','%'.$query.'%')->get();;
            $reglamento=DB::table('reglamentos')->where('codigo','LIKE','%'.$query.'%')->get();


            return view('layouts.index', compact('administrativos','reglamento','planestudio','logros','alumnos','noticias','materias','curriculums','docentes','normas', 'datosportal'));
        }
    }
    public function store($request)
    {

        return Redirect::to('buscador?searchText='.$request);

    }

    public function pychart(Request $request )
    {

        if($request)
        {
            $query=trim($request->get('searchText'));
            $logros=DB::table('logros')->where('titulo','LIKE','%'.$query.'%')->paginate(5);


            return view('portal.logros.index')->with(["logros"=>$logros,"searchText"=>$query]);
        }
    }


    public function normas(Request $request )
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $normas=DB::table('normas')->where('codigo','LIKE','%'.$query.'%')->paginate(5);
            ;

            return view('portal.normas.index')->with(["normas"=>$normas]);
        }
    }

    public function vistaspub()
    {
        $template = 'persona.administrativo.index';
        $administrativo = Contador::getCantidadTemplate($template);

        $template1 = 'persona.curriculum.index';
        $curriculum = Contador::getCantidadTemplate($template1);

        $template2 = 'portal.datosportal.index';
        $datosportal = Contador::getCantidadTemplate($template2);

        $template3 = 'persona.docente.index';
        $docente = Contador::getCantidadTemplate($template3);

        $template4 = 'portal.logros.index';
        $logros = Contador::getCantidadTemplate($template4);

        $template5 = 'planestudio.materias.index';
        $materia = Contador::getCantidadTemplate($template5);

        $template = 'portal.normas.index';
        $normas = Contador::getCantidadTemplate($template);

        $template = 'portal.noticias.index';
        $noticias= Contador::getCantidadTemplate($template);

        $template = 'planestudio.planestudio.index';
        $planestudio = Contador::getCantidadTemplate($template);

        $template = 'persona.persona.index';
        $persona = Contador::getCantidadTemplate($template);

        $template = 'portal.reglamento.index';
        $reglamento= Contador::getCantidadTemplate($template);


        return view('graficos.vistaspublicas', compact('administrativo', 'curriculum','datosportal','docente','logros','materia','normas','noticias','persona','planestudio','reglamento'));



    }
    public function vistasEstadisticas()
    {
        $template = 'persona.administrativo.index';
        $administrativo = Contador::getCantidadTemplate($template);

        $template1 = 'persona.curriculum.index';
        $curriculum = Contador::getCantidadTemplate($template1);

        $template2 = 'portal.datosportal.index';
        $datosportal = Contador::getCantidadTemplate($template2);

        $template3 = 'persona.docente.index';
        $docente = Contador::getCantidadTemplate($template3);

        $template4 = 'portal.logros.index';
        $logros = Contador::getCantidadTemplate($template4);

        $template5 = 'planestudio.materia.index';
        $materia = Contador::getCantidadTemplate($template5);

        $template = 'portal.normas.index';
        $normas = Contador::getCantidadTemplate($template);

        $template = 'portal.noticias.index';
        $noticias= Contador::getCantidadTemplate($template);

        $template = 'planestudio.planestudio.index';
        $planestudio = Contador::getCantidadTemplate($template);

        $template = 'persona.persona.index';
        $persona = Contador::getCantidadTemplate($template);

        $template = 'portal.reglamento.index';
        $reglamento= Contador::getCantidadTemplate($template);


        return view('graficos.vistaspublicas', compact('administrativo', 'curriculum','datosportal','docente','logros','materia','normas','noticias','persona','planestudio','reglamento'));
    }


    public function personaEstadistica()
    {

        $template = 'persona.persona.index';
        $persona = Contador::getCantidadTemplate($template);


        //$persona=DB::table('persona')->where('tipo','=','1')->count();

        //$docente=DB::table('persona')->where('tipo','=','2')->count();

        //$administrativo=DB::table('persona')->where('tipo','=','3')->count();
        $template = 'persona.administrativo.index';
        $administrativo = Contador::getCantidadTemplate($template);
        $template3 = 'persona.docente.index';
        $docente = Contador::getCantidadTemplate($template3);

        return view('graficos.pychart', compact('persona', 'docente','administrativo','cantidad'));
    }


}
