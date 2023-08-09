@extends('layouts.base')
@section('content')
{{-- menu --}}
@include('pedido.partials.menu')
{{-- /menu --}}

<h1> Pedido: {{ $pedido->id_pedido }}</h1>
<h2> Valor: {{ $pedido->total}} </h2>
<h3>Tipo de Pagamento: {{$pedido->id_tipo_pagamento}}</h3>
<p>Descrição: {!! nl2br($pedido->descricao) !!}</p>
@if ($pedido->observacoes)
    <p class="alert alert-info">
        {!! nl2br($pedido->observacoes) !!}
    </p>
@endif

<h4>Endereço:{{$pedido->id_cliente_endereco}}</h4>
<h5>Usuário:{{$pedido->id_user}}</h5>
<h6>Cliente:{{$pedido->id_cliente}}</h6>
<h6>Status:{{$pedido->id_status}}</h6>
</table>

<h6>
    <a class="btn btn-success" href="{{ route('pedido.createProduto', ['id_pedido' => $pedido->id_pedido]) }}">
        Adicionar Novo Produto
    </a>
</h6>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="col-2">Ações</th>
            <th>Preço</th>
            <th>QTD</th>
            <th>SUBTOTAL</th>
            <th>Obs.:</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pedido->produtos()->get() as $item)
            <tr>
                <td>
                    {{-- editar --}}
                    <a class="btn btn-primary" href="#">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    {{ $item->preco }}
                </td>
                <td>
                    {{ $item->qtd }}
                </td>
                <td>
                    {{ $item->subtotal }}
                </td>
                <td>
                    {!! nl2br($item->observacoes) !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    Nenhum tamanho definido para esse produto
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
@section('scripts')

@endsection
