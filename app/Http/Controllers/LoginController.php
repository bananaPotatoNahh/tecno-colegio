<?php

namespace colegio\Http\Controllers;

use Illuminate\Http\Request;

use colegio\User;
use colegio\Http\Requests;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Logueado Con exito
            $user = User::with("rol")->where("email", $email)->first();
            $rol_id = -1;
            switch ($user->rol->nombre) {
                case "ADMINISTRATIVO":
                    $rol_id = $user->administrativo->idadministrativo;
                    break;
                case "ADMIN":
                    $rol_id = $user->administrador->id;
                    break;
            }
            $request->session()->put("username", $user->name);
            $request->session()->put("user_id", $user->id);
            $request->session()->put("rol_id", $rol_id);
            $request->session()->put("rol", $user->rol->nombre);
            $request->session()->put("login", "OK");
        }
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Eliminar variables de sesion
        $request->session()->forget("username");
        $request->session()->forget("user_id");
        $request->session()->forget("rol_id");
        $request->session()->forget("rol");
        $request->session()->forget("login");
        return redirect("/");
    }
}
