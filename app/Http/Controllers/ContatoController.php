<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {
        $motivosContato = [
            1 => "Dúvidas",
            2 => "Elogio",
            3 => "Reclamação"
        ];
        return view("site.contato", ["motivosContato"=> $motivosContato]);
    }

    public function salvar(Request $request) {
        $request->validate([
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required|max:11',
            'email'=> 'required|max:80',
            'motivo_contato' => 'required',
            'mensagem'=> 'required',
        ]);
        SiteContato::create($request->all());
    }

}
