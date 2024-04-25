<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {
        $motivosContato = MotivoContato::all();
        return view("site.contato", compact("motivosContato"));
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required|max:11',
            'email'=> 'required|max:80|email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem'=> 'required'
        ];

        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome tem que ter pelo menos 3 caracteres.',
            'nome.max' => 'O campo nome pode ter no máximo 50 caracteres.',
            'telefone.max' => 'O campo telefone pode ter no máximo 11 caracteres.',
            'email.email' => 'Insira um email valido.',
            'email.unique'=> 'Esse email já foi utilizado.',
            'email.max' => 'O campo email pode ter no máximo 80 caracteres.'
        ];

        $request->validate($regras, $mensagens);
        SiteContato::create($request->all());
        return redirect()->back()->with('success','Mensagem enviada com sucesso!');
    }

}
