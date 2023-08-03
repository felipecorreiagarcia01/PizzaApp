
@extends('layouts.base')
@section('content')

{{-- Menu --}}
@include('layouts.partials.menu')

    <h1>
        <i class="fa-solid fa-pizza-slice"></i>
       Usuarios -
        <a href="{{route('usuario.create')}}" class="btn btn-primary">
            Novo Usuario
        </a>
    </h1>
    <p>{{ $users->onEachSide(5)->links() }}</p>
    {{-- Alerts --}}
    @include('layouts.partials.alerts')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col-2">Ações</th>
                <th class="col-1">ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>ID Cargo</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <a class="btn btn-primary" href="{{ route('usuario.edit', ['id' => $user->id]) }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a class="btn btn-success" href="{{ route('usuario.show', ['id' => $user->id]) }}">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        <button type="button" class="btn btn-danger ml-1" data-bs-toggle="modal"
                            data-bs-target="#modalExcluir"
                            data-identificacao="Nº {{ $user->id }} : {{ $user->nome }}"
                            data-url="{!! route('produto.destroy', ['id' => $user->id]) !!}">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Excluir">
                                <i class="bi bi-trash3-fill"></i>
                            </span>
                        </button>
                        {{-- <a class="btn btn-danger" href="{{ route('produto.destroy', ['id' => $produto->id_produto]) }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </a> --}}
                    </td>
                    <td>
                        {{ $user->id }}

                    </td>
                    <td>{{ $user->nome}}</td>
                    <td>
                        {{ $user->email}}
                    </td>
                    <td>
                        {{ $user->id_cargo}}
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
