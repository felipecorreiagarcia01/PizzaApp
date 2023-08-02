@extends('layouts.base')
@section('content')
<h1> Editar Cargo </h1>
<form action="{{ route('cargo.update', ['id_cargo'=>$cargo->id_cargo]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <label class="form-label" for="cargo">Cargo</label>
    <input class="form-control" type="text" name="cargo" id="cargo" value="{{ $cargo && $cargo->cargo != '' ? $cargo->cargo : old(cargo)}}">
    <input class="btn btn-success mt-2" type="submit" value="Atualizar Cargo">

</form>
@endsection
@section('scripts')

@endsection
