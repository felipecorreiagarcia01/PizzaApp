@extends('layouts.base')
@section('content')

<h1> Pedido: {{ $pedido->id_pedido }} </h1>
<h2>
    {{
        ($pedidoProduto) ? 'Editar Produto' : 'Cadastrar Produto'
    }}
</h2>
<form action="{{ ($pedidoProduto) ? route('pedido.updateProduto') : route('pedido.storeProduto',['id_pedido'=>$pedido->id_pedido]) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-3">
             <label class="form-label" for="id_user">
                Usuário*
             </label>
             <select class="form-select" name="id_user" id="id_user" required>
                <option value="">Selecione</option>
                @foreach ( $users::orderBy('nome')->get() as $item )
                    <option class="form-option" value="{{ $item->id_user }}"
                    @selected(
                        ($pedidoProduto && $pedidoProduto->id_user == $item->id_user) ? true
                        : false
                    )
                    >
                            {{ $item->nome }}
                    </option>
                @endforeach
             </select>
        </div>

        <div class="col-md-3">
            <label class="form-label" for="id_produto">
               Produto*
            </label>
            <select class="form-select" name="id_produto" id="id_produto" required>
               <option value="">Selecione</option>
               @foreach ( $tamanhos::orderBy('nome')->get() as $item )
                   <option class="form-option" value="{{ $item->id_produto }}"
                   @selected(
                       ($pedidoProduto && $pedidoProduto->id_produto_tamanho == $item->id_produto_tamanho) ? true
                       : false
                   )
                   >
                           {{ $item->nome }}
                   </option>
               @endforeach
            </select>
       </div>
        <div class="col-md-3">
            <label class="form-label" for="preco">
                Preço
            </label>
            <input class="form-control" type="number" name="preco" id="preco" step="0.01" min="0" value="{{
                ($pedidoProduto) ? $pedidoProduto->preco : old('preco')
            }}" required>
        </div>

        <div class="col-md-3">
            <label class="form-label" for="qtd">
                Qtd
            </label>
            <input class="form-control" type="number" name="qtd" id="qtd" step="0.01" min="0" value="{{
                ($pedidoProduto) ? $pedidoProduto->qtd : old('qtd')
            }}" required>
        </div>

        <div class="col-md-3">
            <label class="form-label" for="subtotal">
               Subtotal
            </label>
            <input class="form-control" type="number" name="subtotal" id="subtotal" step="0.01" min="0" value="{{
                ($pedidoProduto) ? $pedidoProduto->subtotal : old('subtotal')
            }}" required>
        </div>

        <div class="col-12">
            <label class="form-label" for="observacoes">
                Observações
            </label>
            <textarea class="form-control" name="observacoes" id="observacoes">{{ ($pedidoProduto) ? $pedidoProduto->observacoes : old('observacoes')}}</textarea>
        </div>
    </div>

    <div class="mt-3"></div>

    @if ($pedidoProduto)
        <input class="btn btn-primary" type="submit" value="Atualizar Produto">
    @else
        <input class="btn btn-success" type="submit" value="Cadastrar Produto">
    @endif
</form>
@endsection
@section('scripts')

@endsection
