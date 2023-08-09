<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    User,
    Cargo
};

class UsuarioController extends Controller
{
    public function index()
    {
        $users = User::orderBy('nome')->paginate(10);

        return view('usuario.index')
            ->with(compact('users'));
    }

    public function create()
    {
        $user = null;
        $cargo = Cargo::class;
        return view('usuario.form')
            ->with(compact(
                'user',
                'cargo'
            ));
    }

    public function store(Request $request)
    {

        $user = User::create([
            'nome' => $request->nome,
            'email' =>$request->email,
            'id_cargo' =>$request->id_cargo,
            'password' =>Hash::make('12345678')]
           );


        return redirect()
            ->route('usuario.show',
            ['id' => $user->id])
            ->with('success', 'Cadastrado com Sucesso!');
    }

    public function show(int $id)
    {
        $user = User::find($id);


        return view('usuario.show')
            ->with(compact(
                'user'
            ));
    }


    public function edit(int $id)
    {
        $user = User::find($id);
        $cargo = Cargo::class;
        return view('usuario.form')
            ->with(compact(
                'user',
                'cargo'
            ));
    }


    public function update(Request $request, int $id)
    {
        $user = User::find($id);

        $user->update([
            'nome' => $request->nome,
            'email' =>$request->email,
            'id_cargo' =>$request->id_cargo,
            'password' =>Hash::make('12345678')]
        );
        return redirect()
        ->route(
            'usuario.show',
            ['id' => $user->id]
        )
            ->with('success', 'Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
       User::find($id)->delete();
        return redirect()
            ->back()
            ->with('danger', 'Removido com sucesso!');
    }

}
