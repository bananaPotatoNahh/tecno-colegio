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
            $user = User::where("email", $email)->first();
            $request->session()->put("user_id", $user->id);
            $request->session()->put("email", $user->email);
            $request->session()->put("rol", $user->rol);
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
        $request->session()->forget("user_id");
        $request->session()->forget("email");
        $request->session()->forget("rol");
        $request->session()->forget("login");
        return redirect("/");
    }
}
