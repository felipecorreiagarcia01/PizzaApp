<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('produto.index') }}">
            Todos os produtos
        </a>
    </li>
    <li>
        <a class="nav-link" href="{{ route('produto.edit', ['id'=>$produto->id_produto]) }}">
            Editar
        </a>
    </li>
</ul>
