<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = Fornecedor::all();
        return view('app.fornecedor.listar', compact('fornecedores'));
    }

    public function novo() {
        return view("app.fornecedor.novo");
    }

    public function pesquisa() {
        return view("app.fornecedor.pesquisa");
    }

    public function listar(Request $request) {
        $fornecedores = Fornecedor::where("nome", 'like' ,'%'.$request->nome.'%')
        ->where("site", 'like' ,'%'.$request->site.'%')
        ->where("uf", 'like' ,'%'.$request->uf.'%')
        ->where("email", 'like' ,'%'.$request->email.'%');
       // ->get();
        dd($fornecedores);
        //return redirect()->back()->with('message',''.$request->id.' '.$request->nome.' '.$request->email.' '. $request->site. " ". $request->uf);
        //return view('app.fornecedor.listar', compact('fornecedores'));
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:50|unique:fornecedores',
            'site' => 'max:30',
            'uf' => 'max: 2',
            'email'=> 'required|max:80|email',
        ];

        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome tem que ter pelo menos 3 caracteres.',
            'nome.max' => 'O campo nome pode ter no máximo 50 caracteres.',
            'nome.unique' => 'Fornecedor já cadastrado',
            'site.max' => 'O campo site pode ter no máximo 30 caracteres.',
            'uf.max' => 'O campo uf pode ter no máximo 2 caracteres.',
            'email.email' => 'Insira um email valido.',
            'email.max' => 'O campo email pode ter no máximo 80 caracteres.'
        ];

        $request->validate($regras, $mensagens);
        Fornecedor::create($request->all());
        return redirect()->back()->with('message','Fornecedor cadastrado com sucesso!');
    }

    public function delete($id) {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('app.fornecedores')->with('message', 'Deletado com sucesso!');
    }
}
