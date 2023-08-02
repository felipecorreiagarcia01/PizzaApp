
@extends('layouts.base')
@section('content')
    <h1>
        <i class="fa-solid fa-pizza-slice"></i>
        Produtos -
        <a href="{{route('produto.create')}}" class="btn btn-primary">
            Novo Produto
        </a>
    </h1>
    <p>{{ $produtos->onEachSide(5)->links() }}</p>
    {{-- Alerts --}}
    @include('layouts.partials.alerts')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col-2">Ações</th>
                <th class="col-1">ID</th>
                <th>Produto</th>
                <th>Observações</th>
                <th>Qtd Tamanhos</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>
                        <a class="btn btn-primary" href="{{ route('produto.edit', ['id' => $produto->id_produto]) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-success" href="{{ route('produto.show', ['id' => $produto->id_produto]) }}">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal"
                            data-bs-target="#modalExcluir"
                            data-identificacao="Nº {{ $produto->id_produto }} : {{ $produto->nome }}"
                            data-url="{!! route('produto.destroy', ['id' => $produto->id_produto]) !!}">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Excluir">
                                <i class="fas fa-trash"></i>
                            </span>
                        </button>
                        {{-- <a class="btn btn-danger" href="{{ route('produto.destroy', ['id' => $produto->id_produto]) }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </a> --}}
                    </td>
                    <td>
                        {{ $produto->id_produto }}

                    </td>
                    <td>
                        {{ $produto->nome }}
                        @if ($produto->foto)
                        <br>
                        <img src="{{ url('storage/' . $produto->foto) }}" lass="img-thumbnail" width="250">
                        @endif
                    </td>
                    <td>{{ nl2br($produto->observacoes) }}</td>
                    <td>
                        {!! $produto->tamanhos()->count() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    @parent
    {{-- MODAL EXCLUSÃO --}}
    @include('layouts.partials.modalExcluir')
@endsection
