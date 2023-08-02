@extends('layouts.base')

@section('content')
{{-- Menu --}}
    @include('layouts.partials.menu')

    <h1>
        <i class="fa-solid fa-pizza-slice"></i>

        @if ($produto)
            Atualizar produto
        @else
            Novo produto
        @endif
    </h1>
    <form method="post"
        action="{{ $produto ? route('produto.update', ['id' => $produto->id_produto]) : route('produto.store') }}"
        id="produto-form" enctype="multipart/form-data" class="mt-6">
        @csrf

        {{-- Dados do Produto --}}
        <div class="card-deck">
            <div class="card border-dark mt-1">
                <div class="card-header">
                    <h5>
                        Dados do Produto
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="id_tipo_produto" class="form-label">Tipo Produto*</label>
                            <select class="form-select" name="id_tipo_produto" id="id_tipo_produto" required>
                                <option value="">Selecione</option>
                                @foreach ($tiposProduto::orderBy('tipo')->get() as $item)
                                    <option value="{{ $item->id_tipo_produto }}"
                                        @selected(old('id_tipo_produto') || ($produto && $produto->id_tipo_produto == $item->id_tipo_produto))>
                                        {{ $item->tipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome*</label>
                            <input type="text" class="form-control" name="nome" id="nome"
                                value="{!! $produto ? $produto->nome : old('nome') !!}" placeholder="Ex.: Pizza de T94" required>
                        </div>
                        <div class="col-md-4">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="foto" id="foto">
                        </div>

                        <div class="col-12 mt-2">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea name="observacoes" id="observacoes" class="form-control">{!! $produto != null ? $produto->observacoes : old('observacoes') !!}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-success mt-3 col-md-3 offset-md-9" type="submit"
                        data-loading-text="Salvando...">
                        <i class="fa fa-save"></i>
                        @if ($produto)
                            Atualizar Produto
                        @else
                            Cadastrar Produto
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
@endsection
