@extends('layouts.base')
@section('content')

{{-- Menu --}}
@include('layouts.partials.menu')


<h1>
    <i class="bi bi-person-circle"></i>
    Clientes-
    <a class="btn btn-primary" href="{{ route('cliente.create')}}">Novo Cliente</a>
</h1>


<p>{{ $clientes->onEachSide(5)->links() }}</p>

{{-- Alerts --}}
@include('layouts.partials.alerts')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Ações</th>
            <th>ID</th>
            <th>Nome</th>
            <th>DDD Celular</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente )

        <tr>
            <td>
                <a class="btn btn-primary" href="{{route('cliente.edit', ['id_cliente'=>$cliente->id_cliente])}}">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <a class="btn btn-warning" href="{{ route('cliente.show', ['id'=>$cliente->id_cliente])}}">
                    <i class="bi bi-eye-fill"></i>
                </a>
                <form action="{{ route('cliente.destroy',['id_cliente'=>$cliente->id_cliente])}}" method="post">
                    @csrf
                    @method('delete')
                    <button class=" btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
            </td>

            <td>{{$cliente->id_cliente}}</td>

            <td>{{$cliente->nome}}</td>

            <td>{{$cliente->ddd}}{{$cliente->celular}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


{{-- Script --}}
@section('scripts')

@endsection
