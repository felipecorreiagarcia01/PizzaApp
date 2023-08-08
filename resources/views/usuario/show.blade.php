@extends('layouts.base')
@section('content')

@include('usuario.partials.menu')

<h1> Usuário: {{ $user->nome }}</h1>
<h2> Cargo: {{ $user->id_cargo}}</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Nome</th>
            <th>Cargo</th>
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
               {{ $user->nome}}
            </td>
            <td>
                {{ $user->cargo}}
            </td>
        </tr>
    </tbody>
</table>

@endsection
@section('scripts')
@endsection
