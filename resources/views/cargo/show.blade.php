@extends('layouts.base')
@section('content')
<h1> Cargo: {{ $cargo->cargo }}</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
            <a class="btn btn-primary" href="#">
            <i class="bi bi-pencil-square"></i>
            </a>
            </td>
            <td>
                {{ $cargo->cargo}}
            </td>
        </tr>
    </tbody>
</table>

<h1>Usuarios</h1>
<h2>Usuarios Cadastrados</h2>

    <h6>
        <a class="btn btn-primary" href="{{ route('cargo.createUsuario',['id' => $cargo->id_cargo]) }}">Cadastrar Novo Usuário</a>
    </h6>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Ações</th>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>ID Cargo</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cargo->usuarios()->get() as $item )
            <tr>
                <td>
                    <a class="btn btn-success" href=""></a>
                </td>

                <td>
                {{ $item->id}}
                </td>

                <td>
                    {!! $item->nome !!}
                </td>

                <td>
                    {!! $item->email !!}
                </td>

                <td>
                    {!! $item->id_cargo !!}
                </td>

            </tr>
        @empty
            <tr>
                <td>Não existe cargo definido para este usuário</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
@section('scripts')

@endsection
