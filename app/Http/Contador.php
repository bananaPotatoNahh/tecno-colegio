<?php
/**
 * Created by PhpStorm.
 * User: mauriballes
 * Date: 12/12/17
 * Time: 1:29 AM
 */

namespace colegio\Http;

use Illuminate\Support\Facades\Storage;


class Vista
{
    public $vista;
    public $cantidad;
}

class Contador
{
    // Ubicado en la carpeta /storage/app/
    public static $path = 'Contador.json';

    public static function insertarRegistro($template)
    {
        // Buscar Vista, si no se encuentra, ingrarla
        $vistas = json_decode(Storage::get(self::$path));
        $finded = false;
        $vistasNew = [];
        foreach ($vistas as $vista) {
            $vista2 = New Vista();
            $vista2->vista = $vista->vista;
            $vista2->cantidad = $vista->cantidad;
            if ($vista->vista == $template) {
                $vista2->cantidad = $vista2->cantidad + 1;
                $finded = true;
            }
            array_push($vistasNew, $vista2);
        }

        // No se encontro el template
        if (!$finded) {
            $vista = new Vista();
            $vista->vista = $template;
            $vista->cantidad = 0;
            array_push($vistasNew, $vista);
        }

        //Actualizar file
        Storage::put(self::$path, json_encode($vistasNew));
    }

    public static function getCantidadTemplate($template)
    {
        $vistas = json_decode(Storage::get(self::$path));
        foreach ($vistas as $vista) {
            if ($vista->vista == $template) {
                return $vista->cantidad;
            }
        }
    }
}