<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Cliente,
    Endereco,
    ClienteEndereco,
};

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nome')->paginate(10);
        return view('cliente.index')->with(compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = null;
        return view('cliente.form')->with(compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()
            ->route('cliente.show',['id' => $cliente->id_cliente])
            ->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cliente = Cliente::find($id);
        $enderecos = Endereco::class;

        return view('cliente.show')
            ->with(compact(
                'cliente',
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
                'cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        return redirect()
            ->route('cliente.show',['id' => $cliente->id_cliente])
            ->with('success','Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Cliente::find($id)->delete();
        return redirect()
            ->back()
            ->with('danger', 'Excluído com Sucesso!');
    }




    /*
    *|----------------------------------|*
    *|         CLIENTES ENDERECOS       |*
    *|----------------------------------|*
    */


    public function indexEndereco(int $id_cliente)
    {
        $enderecos = Endereco::orderBy('cidade');
        return view('cliente.show', ['id' => $id_cliente])
        ->with(compact('enderecos'));
    }

    public function createEndereco(int $id_cliente)
    {
        $clienteEndereco = null;
        $cliente = Cliente::find($id_cliente);
        $enderecos = Endereco::class;

        return view('cliente.formEndereco')
            ->with(compact('cliente', 'enderecos', 'clienteEndereco'));
    }

    public function storeEndereco(Request $request, int $id_cliente)
    {
        $endereco = Endereco::create($request->all());

        $clienteEndereco = ClienteEndereco::create([
            'id_cliente'    => $id_cliente,
            'id_endereco'   => $endereco->id_endereco,
            'observacoes'   => $request->observacoes
        ]);

        return redirect()
        ->route('cliente.show', ['id' => $id_cliente])
        ->with('success', 'Endereço Cadastrado com Sucesso!');
    }

    public function editEndereco(int $id)
    {
        $clienteEndereco = ClienteEndereco::find($id);
        $cliente = $clienteEndereco->cliente();
        $endereco = ClienteEndereco::class;

        return view('cliente.formEndereco')
            ->with(compact('cliente', 'endereco', 'clienteEndereco'));
    }

    public function updateEndereco(Request $request, int $id_cliente, int $id_endereco)
    {
        $clienteEndereco = ClienteEndereco::where('id_cliente', $id_cliente)
            ->where('id_endereco', $id_endereco)
            ->first();

        $endereco = Endereco::find($id_endereco);
        $endereco->update($request->all());

        return redirect()->route('cliente.show', ['id' => $clienteEndereco->cliente->id_cliente])
        ->with('success', 'Atualizado com Sucesso!');



        // $clienteEndereco = ClienteEndereco::find($id_endereco);
        // $clienteEndereco->update($request->all());

        // return redirect()
        //     ->route('cliente.show', ['id' => $clienteEndereco->id_cliente])
        //     ->with('success', 'Atualizado com sucesso');
    }

    public function destroyendereco(int $id)
    {
        ClienteEndereco::find($id)->delete();
        return redirect()
            ->back()
            ->with('danger', 'Excluído com Sucesso!');
    }


}
