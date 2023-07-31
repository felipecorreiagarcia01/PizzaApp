@extends('layouts.base')
@section('content')

<h1>Clientes</h1>
<h6>
    <a class="btn btn-primary" href="{{ route('cliente.create')}}">Cadastrar novo Cliente</a>
</h6>
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
        @foreach ($clientes->get() as $cliente )

        <tr>
            <td>
                <a class="btn btn-success" href="{{route('cliente.edit', ['id_cliente'=>$cliente->id_cliente])}}"><i class="bi bi-pencil"></i></a>
                <a class="btn btn-primary" href="{{ route('cliente.show', ['id'=>$cliente->id_cliente])}}"><i class="bi bi-eye"></i></a>
                <a class="btn btn-warning" href="{{ route('cliente.destroy', ['id_cliente'=>$cliente->id_cliente])}}"><i class="bi bi-trash3"></i></a>
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
