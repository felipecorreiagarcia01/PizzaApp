
@extends('layouts.base')
@section('content')
<h1>Cargos</h1>
<table class="table table-striped">
     <thead>
        <tr>
            <th>Ações</th>
            <th>ID</th>
            <th>Cargo</th>
        </tr>
     </thead>
     <tbody>
        @foreach ($clientes as $cliente)


        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('cargo.edit', ['id'=>$cargo->id_cargo]) }}">
                <i class="bi bi-pencil-square"></i>
                </a>
                <a class="btn btn-warning" href="{{ route('cargo.show', ['id'=>$cargo->id_cargo]) }}">
                    <i class="bi bi-eye-fill"></i>
                </a>
                <a class="btn btn-danger" href="{{ route('cargo.destroy', ['id'=>$cargo->id_cargo]) }}">
                    <i class="bi bi-trash3-fill"></i>
                </a>
            </td>
            <td>{{ $cargo->id_cargo }}</td>
            <td>{{ $cargo->cargo }}</td>
        </tr>
        @endforeach
     </tbody>
</table>
@endsection
@section('scripts')

@endsection
