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
@endsection
@section('scripts')

@endsection
