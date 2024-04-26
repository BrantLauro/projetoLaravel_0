<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("site.login");
    }

    public function login(Request $request) {
        $regras = [
            'email'=> 'required|max:80|email',
            'password' => 'required'
        ];

        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'email.email' => 'Insira um email valido.',
            'email.max' => 'O campo email pode ter no máximo 80 caracteres.'
        ];

        $request->validate($regras, $mensagens);
        $login = Login::where('email', $request->email)->where('password', $request->password)->get()->first();
        if($login != null) {
           session_start();
           $_SESSION['id'] = $login->id;
        } else {
            return redirect()->back()->with('message','Email ou Senha inválidos');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
