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
            <a class="btn btn-primary" href="{{ route('cargo.edit', ['id'=>$cargo->id_cargo]) }}">
            <i class="bi bi-pencil-square"></i>
            </a>
            </td>
            <td>
                {{ $cargo->cargo}}
            </td>
        </tr>
    </tbody>
</table>

@endsection
@section('scripts')

@endsection
