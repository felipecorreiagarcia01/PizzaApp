<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\{
    Cliente,
    TipoPagamento,
    TipoPedido,
    User,
    Pedido,
    Status,
    PedidoProduto,
    ProdutoTamanho,
    Produto
};



class PedidoController extends Controller

{

    public function index()

    {

        $pedidos = Pedido::orderBy('id_pedido')->paginate(10);
        return view('pedido.index')
            ->with(compact('pedidos'));

    }




    public function create()

    {
        $pedido = null;
        $tiposPedido = TipoPedido::class;
        $users = User::class;
        $clientes = Cliente::class;
        $tipoPagamento =  TipoPagamento::class;

        return view('pedido.form')

            ->with(compact(

                'pedido',

                'tiposPedido',

                'users',

                'clientes',

                'tipoPagamento',

            ));

    }



    public function store(Request $request)

    {
        $pedido = Pedido::create($request->all());
        return redirect()
            ->route(
                'pedido.show',
                ['id' => $pedido->id_pedido]
            )
            ->with('success', 'Cadastrado com sucesso.');
    }



    public function show(int $id)

    {

        $pedido = Pedido::find($id);

        $tiposPedido = TipoPedido::class;



        return view('pedido.show')

            ->with(compact('pedido'));

    }





    public function edit(int $id)

    {
        $pedido = Pedido::find($id);
        $tiposPedido = TipoPedido::class;
        $users = User::class;
        $tipoPagamento = TipoPagamento::class;
        $clientes = Cliente::class;

        return view('pedido.form')
            ->with(compact(
                'pedido',
                'tiposPedido',
                'users',
                'tipoPagamento',
                'clientes'
            ));



    }

    public function update(Request $request, int $id)

    {
        $pedido = Pedido::find($id);
        $pedido->update($request->all());
        return redirect()
            ->route(
                'pedido.show',
                ['id' => $pedido->id_pedido]
            )
            ->with('success', 'Atualizado com sucesso!');
    }


    public function destroy(int $id)

    {
        Pedido::find($id)->delete();
        return redirect()
            ->back()
            ->with('danger','Removido com sucesso!');

    }

    /*
    *|----------------------------------|*
    *|         PEDIDOS PRODUTOS         |*
    *|----------------------------------|*
    */


    public function createProduto(int $id_pedido)
    {
        $pedidoProduto = null;
        $pedido = Pedido::find($id_pedido);
        $users = User::class;
        $tamanhos = Produto::class;

        return view('pedido.formProduto')
            ->with(compact('pedido','pedidoProduto','users','tamanhos'));
    }

    public function storeProduto(Request $request, int $id_pedido)
    {

        $pedidoProduto = PedidoProduto::create([
            'id_pedido'   => $id_pedido,
            'id_user'   => $request->id_user,
            'id_produto_tamanho' =>$request->id_produto_tamanho,
            'preco' => $request->preco,
            'qtd' =>$request->qtd,
            'subtotal' =>$request->subtotal,
            'observacoes' =>$request->observacoes
        ]);

        return redirect()
        ->route('pedido.show', ['id' => $id_pedido])
        ->with('success', 'Produto Cadastrado com Sucesso!');
    }

    public function editProduto(int $id)
    {
        $pedidoProduto = PedidoProduto::find($id);
        $pedido = $pedidoProduto->pedido();
        $tamanhos = ProdutoTamanho::class;
        $users = User::class;

        return view('pedido.formProduto')
            ->with(compact('pedido', 'produto', 'pedidoProduto','users'));
    }

    public function updateProduto(Request $request, int $id)
    {
        $pedidoProduto = ProdutoTamanho::find($id);
        $pedidoProduto->update($request->all());
        return redirect()
        ->route('pedido.show',['id' => $pedidoProduto->id_pedido]);
        -with('success', 'Atualizado com sucesso');

    }

    public function destroyProduto(int $id)
    {
        PedidoProduto::find($id)->delete();
        return redirect()
            ->back()
            ->with('danger', 'Excluído com Sucesso!');
    }


}

