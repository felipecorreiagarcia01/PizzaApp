<?php
/*
* |----------------------------------------
* |  Felipe Correia  27-06-2023
* |----------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Cargo,
    User
};
use Ramsey\Uuid\Type\Integer;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::OrderBy('cargo')->paginate(10);
        return view('cargo.index')
            ->with(compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargo = null;
        return view('cargo.form')
            ->with(compact('cargo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cargo = Cargo::create($request->all());
        return redirect()
            ->route('cargo.index')
            ->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cargo = Cargo::find($id);
        return view('cargo.show')
            ->with(compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $cargo = Cargo::find($id);
        return view('cargo.form')
            ->with(compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id_cargo)
    {
        $cargo = Cargo::find($id_cargo);
        $cargo->update($request->all());
        return redirect()
            ->route('cargo.index')
            ->with('success', 'Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $cargo = Cargo::find($id)->delete();
        return redirect()
            ->back()
            ->with('damger', 'Removido com Sucesso!');
    }

}
