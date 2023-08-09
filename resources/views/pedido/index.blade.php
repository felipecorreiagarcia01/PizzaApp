@extends('layouts.base')
@section('content')
    @include('layouts.partials.menu')

    <h1><i class="fa-solid fa-file-invoice-dollar"></i>
        Pedidos-
        <a class="btn btn-primary" href="{{ route('pedido.create') }}">Cadastrar Pedido</a>
    </h1>

    <p>{{ $pedidos->onEachSide(5)->links() }}</p>

    {{-- Alerts --}}
    @include('layouts.partials.alerts')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>
                        <a class="btn btn-primary" href="{{ route('pedido.edit', ['id' => $pedido->id_pedido]) }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a class="btn btn-warning" href="{{ route('pedido.show', ['id' => $pedido->id_pedido]) }}">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <form action="{{ route('pedido.destroy',['id'=>$pedido->id_pedido])}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                    </form>


                    </td>
                    <td>{{ $pedido->id_pedido }}</td>
                    <td>{{ $pedido->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')

@endsection
