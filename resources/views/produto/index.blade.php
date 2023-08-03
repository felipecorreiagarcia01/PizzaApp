
@extends('layouts.base')
@section('content')

{{-- Menu --}}
@include('layouts.partials.menu')

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
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a class="btn btn-success" href="{{ route('produto.show', ['id' => $produto->id_produto]) }}">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        <form action="{{ route('produto.destroy',['id'=>$produto->id_produto])}}" method="post">
                            @csrf
                            @method('delete')
                            <button class=" btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                    </td>
                    <td>
                        {{ $produto->id_produto }}

                    </td>
                    <td>
                        {{ $produto->nome }}
                        @if ($produto->foto)
                        <br>
                        <img src="{{ url('storage/fotos/' . $produto->foto) }}" lass="img-thumbnail" width="250">
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
