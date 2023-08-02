
@if(Session::has('destroy'))
<div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
  <strong>Sucesso!</strong> {{Session::get('destroy')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show m-2" role="alert">
  <strong>Sucesso!</strong> {{Session::get('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(Session::has('danger'))
<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
  <strong>Atenção!</strong> {{Session::get('danger')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">

  <strong>Atenção!</strong>
  <p>
  @foreach(Session::get('error')->all() as $error)
  &bull; {{$error}} <br>
  @endforeach
  </p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(Session::has('errors'))
<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
  <strong>Atenção!</strong>
  <p>
  @foreach(Session::get('errors')->all() as $error)
  &bull; {{$error}} <br>
  @endforeach
  </p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(Session::has('status'))
<div class="alert alert-success alert-dismissible fade show m-2" role="alert">

  <strong>Status:</strong> {{Session::get('status')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
