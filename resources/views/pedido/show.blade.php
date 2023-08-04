@extends('layouts.base')
@section('content')
{{-- menu --}}
{{-- @include('pedido.partials.menu') --}}
{{-- /menu --}}

<h1> Pedido: {{ $pedido->id_pedido }}</h1>
<h2> valor: {{ $pedido->total}} </h2>
<h3>tipo de pagamento: {{$pedido->id_tipo_pagamento}}</h3>
<p>descrição: {!! nl2br($pedido->descricao) !!}</p>
@if ($pedido->observacoes)
    <p class="alert alert-info">
        {!! nl2br($pedido->observacoes) !!}
    </p>
@endif

<h4>endereço:{{$pedido->id_cliente_endereco}}</h4>
<h5> usuário:{{$pedido->id_user}}</h5>
<h6> cliente:{{$pedido->id_cliente}}</h6>
<h6> pedido status:{{$pedido->id_status}}</h6>



</table>
@endsection
@section('scripts')

@endsection
