
@extends('layouts.base')
@section('content')

@include('layouts.partials.menu')

    <h1>Pedido</h1>
    <a class="btn btn-primary" href="{{ route('pedido.create') }}">Cadastrar Novo Pedido</a>
    <table class="table table-striped">
     <thead>
        <tr>
            <th>Ações</th>
            <th>ID</th>
            <th>Pedido</th>
            <th>Observações</th>

        </tr>
     </thead>
     <tbody>
        @foreach ($pedidos as $pedido)


        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('pedido.edit', ['id'=>$pedido->id_pedido]) }}">
                <i class="bi bi-pencil-square"></i>
                </a>
                <a class="btn btn-warning" href="{{ route('pedido.show', ['id'=>$pedido->id_pedido]) }}">
                    <i class="bi bi-eye-fill"></i>
                </a>
                <a class="btn btn-danger" href="{{ route('pedido.destroy', ['id'=>$pedido->id_pedido]) }}">
                    <i class="bi bi-trash3-fill"></i>
                </a>
            </td>
            <td>{{ $pedido->id_pedido }}</td>
            <td>{{ $pedido->nome}}</td>
            <td>{{ nl2br($pedido->observacoes)}}</td>
        </tr>
        @endforeach
     </tbody>
</table>
@endsection
@section('scripts')

@endsection
