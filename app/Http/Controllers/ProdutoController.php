<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $produtos = Produto::paginate(10);
        return view("app.produto.listar", compact("produtos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view("app.produto.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:50|unique:produtos',
            'descricao' => 'required',
            'peso' => 'required|numeric',
            'unidade'=> 'required',
        ];

        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome tem que ter pelo menos 3 caracteres.',
            'nome.max' => 'O campo nome pode ter no máximo 50 caracteres.',
            'nome.unique' => 'Produto já cadastrado',
            'peso.numeric' => 'O campo peso deve ser numérico.',
        ];

        $request->validate($regras, $mensagens);
        Produto::create($request->all());
        return redirect()->back()->with('message','Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto) {
        return view('app.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto) {
        return view("app.produto.edit", compact("produto"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto) {
        $regras = [
            'nome' => 'required|min:3|max:50',
            'descricao' => 'required',
            'peso' => 'required|numeric',
            'unidade'=> 'required',
        ];

        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo nome tem que ter pelo menos 3 caracteres.',
            'nome.max' => 'O campo nome pode ter no máximo 50 caracteres.',
            'nome.unique' => 'Produto já cadastrado',
            'peso.numeric' => 'O campo peso deve ser numérico.',
        ];

        $request->validate($regras, $mensagens);
        $produto->update($request->all());
        return redirect()->route('app.produto.index')->with('message','Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto) { 
        $produto->delete();
        return redirect()->route('app.produto.index')->with('message', 'Deletado com sucesso!');
    }
}
