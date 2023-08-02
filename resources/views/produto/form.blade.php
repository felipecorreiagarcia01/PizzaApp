@extends('layouts.base')
@section('content')
<h2>
    {{
        ($produto) ? 'Editar Produto' : 'Cadastrar Produto'
    }}
</h2>
<form action="{{ ($produto) ? route('produto.update', ['id_produto' => $produto->id_produto]) : route('produto.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label class="form-label" for="nome">Nome*</label>
            <input class="form-control" type="text" name="nome" id="nome" value="{{ ($produto) ? $produto->nome : old('nome')}}" required>
        </div>
        <div class="col-md-3">
             <label class="form-label" for="id_tipo_produto">
                Tipo*
             </label>
             <select class="form-select" name="id_tipo_produto" id="id_tipo_produto" required>
                <option value="">Selecione</option>
                @foreach ( $tiposProduto::orderBy('tipo')->get() as $item )
                    <option class="form-option" value="{{ $item->id_tipo_produto }}"
                    @selected(
                        ($produto && $produto->id_tipo_produto == $item->id_tipo_produto) ? true
                        : false
                    )
                    >
                            {{ $item->tipo }}
                    </option>
                @endforeach
             </select>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="descricao">
                Descrição
            </label>
            <input class="form-control" type="text" name="descricao" id="descricao"value="{{
                ($produto) ? $produto->descricao : old('descricao') }}">
        </div>

        <div class="col-md-3">
            <label class="form-label" for="foto">
                Foto
            </label>
            <input class="form-control" type="file" name="foto" id="foto"value="{{
                ($produto) ? $produto->foto : old('foto') }}">
        </div>

        <div class="col-12">
            <label class="form-label" for="observacoes">
                Observações
            </label>
            <textarea class="form-control" name="observacoes" id="observacoes">{{ ($produto) ? $produto->observacoes : old('observacoes')}}</textarea>
        </div>
    </div>

    <div class="mt-3"></div>

    @if ($produto)
        <input class="btn btn-primary" type="submit" value="Atualizar Produto">
    @else
        <input class="btn btn-success" type="submit" value="Cadastrar Produto">
    @endif

</form>
@endsection
@section('scripts')

@endsection
