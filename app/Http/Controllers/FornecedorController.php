<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(Request $request) {
        $fornecedores = Fornecedor::simplePaginate(10);
        return view('app.fornecedor.listar', compact('fornecedores'));
    }

    public function pesquisa(Request $request) {
        if(empty($request->query())) {
            return view('app.fornecedor.pesquisa');
        }else{
            $fornecedores = Fornecedor::search($request)->simplePaginate(10)->withQueryString();
            return view('app.fornecedor.listar', compact('fornecedores'));
        }
    }

    public function novo() {
        return view("app.fornecedor.novo");
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

    public function update(Request $request, $id) {
        $fornecedor = Fornecedor::findOrFail($id);
        if($request->method() == 'GET') {
            return view('app.fornecedor.editar', compact('fornecedor'));
        } else {
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
            $fornecedor->update($request->all());
            return redirect()->route('app.fornecedores')->with('message', 'Fornecedor atualizado com sucesso!');
        }

    }
}
