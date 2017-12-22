<?php

namespace colegio\Http\Middleware;

use colegio\Rol;
use Closure;

class VerifyAdministrativo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get("rol") === "ADMINISTRATIVO") {
            // Obtener la accion
            $accionRuta = $request->route()->getAction()["controller"];
            $rol = Rol::with("acciones")->where("nombre", "ADMINISTRATIVO")->first();
            $acciones = $rol->acciones;
            foreach ($acciones as $accion) {
                if ($accion->accion == $accionRuta) {
                    return $next($request);
                }
            }
            return redirect("/");
        } else {
            // Si no sos Administrativo, segui tu camino
            return $next($request);
        }
    }
}
