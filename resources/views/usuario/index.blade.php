
@extends('layouts.base')
@section('content')

{{-- Menu --}}
@include('layouts.partials.menu')

    <h1>
        <i class="bi bi-person-circle"></i>
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
                        <a class="btn btn-warning" href="{{ route('usuario.show', ['id' => $user->id]) }}">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <form action="{{ route('usuario.destroy',['id'=>$user->id])}}" method="post">
                            @csrf
                            {{-- @method('delete') --}}
                            <button class=" btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
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
