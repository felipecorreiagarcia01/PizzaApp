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

};



class PedidoController extends Controller

{

    public function index()

    {

        $pedidos = Pedido::orderBy('id_pedido')
            ->get();
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

        return view('pedido.form')
            ->with(compact(
                'pedido'));



    }



    // public function update(Request $request, int $id)

    // {
    //     $pedido = null;
    //     $pedido->update($request->all());



    //     return redirect()

    //         ->route(

    //             'pedido.show',

    //             ['id' => $pedido->id_pedido]

    //         )

    //         ->with('success', 'Atualizado com sucesso!');

    // }


    public function destroy(int $id)

    {

        Pedido::find($id)->delete();

        return redirect()

            ->back()

            ->with('destroy','Excluído com sucesso!');

    }

}

