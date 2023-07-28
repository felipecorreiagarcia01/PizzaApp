<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Cliente,
    Endereco,
    ClienteEndereco
};




class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nome');
        return view('cliente.index')
            ->with(compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = null;
        return view('cliente.form')
            ->with(compact(
                'cliente'
            ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()
            ->route('cliente.show', ['id' => $cliente->id_cliente])
            ->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cliente = Cliente::find($id);


        return view('cliente.show')
            ->with(compact(
                'cliente'
            ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.form')
            ->with(compact(
                'cliente'
            ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        return redirect()
            ->route('cliente.show', ['id' => $cliente->id_cliente])
            ->with('success', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id )
    {
        Cliente::find($id)->delete();
        return redirect()
            ->back()
            ->with('danger', 'Removido com sucesso!');
    }

    public function destroyendereco(int $id )
    {
        Cliente::find($id)->delete();
        return redirect()
            ->back()
            ->with('danger', 'Removido com sucesso!');
    }


     /**
     * |-------------------------------------------
     * |         Cliente Endereços
     * |-------------------------------------------
     */

     public function createTamanho(int $id_produto)
     {
         $produtoTamanho = null;
         $produto = Produto::find($id_produto);
         $tamanhos = Tamanho::class;

         return view('produto.formTamanho')
             ->with(compact('produto', 'tamanhos', 'produtoTamanho'));
     }

     public function storeTamanho(Request $request, int $id_produto)
     {
         $produtoTamanho = ProdutoTamanho::create([
             'id_produto' => $id_produto,
             'id_tamanho' => $request->id_tamanho,
             'preco'      => $request->preco,
             'observacoes'=> $request->observacoes
         ]);

         return redirect()
             ->route('produto.show', ['id' => $id_produto])
             ->with('success', 'Tamanho cadastrado com sucesso');
     }

     public function editTamanho(int $id)
     {
         $produtoTamanho = ProdutoTamanho::find($id);
         //$produto = Produto::find($produtoTamanho->id_produto);
         $produto = $produtoTamanho->produto();
         $tamanhos = ProdutoTamanho::class;

         return view('produto.formTamanho')
             ->with(compact(
             'produto',
             'tamanhos',
             'produtoTamanho'
         ));
     }

     public function updateTamanho(Request $request, int $id)
     {
         $produtoTamanho = ProdutoTamanho::find($id);
         $produtoTamanho->update($request->all());
         return redirect()
         ->route('produto.show',['id' => $produtoTamanho->id_produto]);
         -with('success', 'Atualizado com sucesso');
     }

     public function destroyTamanho(int $id)
     {
         ProdutoTamanho::find($id)->delete();
         return redirect()
         ->back()
         ->with('danger', 'Removido com sucesso!');
     }
}

