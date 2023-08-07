
@extends('layouts.base')
@section('content')

    <h1>
        <i class="fa-solid fa-pizza-slice"></i>
            Novo pedido
    </h1>

    <form method="post"

        action="{{ $pedido ? route('pedido.update', ['id' => $pedido->id_pedido]) : route('pedido.store')}}"

        id="pedido-form" enctype="multipart/form-data" class="mt-6">

        @csrf

        {{-- Dados do Pedido --}}

        <div class="card-deck">
            <div class="card border-dark mt-1">
                <div class="card-header">
                    <h5>
                        Dados do Pedido
                    </h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="id_tipo_pedido" class="form-label">Tipo  de Pedido</label>
                            <select class="form-select" name="id_tipo_pedido" id="id_tipo_pedido" required>
                                <option value="">Selecione</option>
                                @foreach ($tiposPedido::orderBy('tipo_pedido')->get() as $item)
                                    <option value="{{ $item->id_tipo_pedido }}">
                                        {{ $item->tipo_pedido }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="id_user" class="form-label">Usuario</label>
                            <select class="form-select" name="id_user" id="id_user" required>
                                <option value="">Selecione</option>
                                @foreach ($users::orderBy('id')->get() as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            {{-- ID ENDEREÇO PADRÃO --}}
                            <input type="hidden" name="id_cliente_endereco" value="1">
                            <label for="id_cliente" class="form-label">Cliente</label>
                            <select class="form-select" name="id_cliente" id="id_cliente" required>
                                <option value="">Selecione</option>
                                @foreach ($clientes::orderBy('nome')->get() as $item)
                                    <option value="{{ $item->id_cliente }}">
                                        {{ $item->nome }} / {{ $item->celular }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="id_tipo_pagamento" class="form-label">Tipo de Pagamento</label>
                            <select class="form-select" name="id_tipo_pagamento" id="id_tipo_pagamento" required>
                                <option value="">Selecione</option>
                                @foreach ($tipoPagamento::orderBy('tipo_pagamento')->get() as $item)
                                    <option value="{{ $item->id_tipo_pagamento }}">
                                        {{ $item->tipo_pagamento }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="observacoes" class="form-label">Total</label>
                            <input type="number" name="total" id="total" class="form-control" required="required" value="{!! $pedido != null ? $pedido->total : old('total') !!}">

                        </div>

                        <div class="col-12 mt-2">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea name="observacoes" id="observacoes" class="form-control">{!! $pedido != null ? $pedido->observacoes : old('observacoes') !!}</textarea>
                        </div>

                        <div class="col-md-1 m-3">
                            <input class="btn btn-primary" type="submit" value="Envia pedido" >
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection

@section('scripts')

@endsection

