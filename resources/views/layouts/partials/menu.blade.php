<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pedido.index')}}">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        Pedidos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cliente.index')}}">
                        <i class="fa-solid fa-user-tie"></i>
                        Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produto.index') }}">
                        <i class="fa-solid fa-pizza-slice"></i>
                        Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produto.index') }}">
                        <i class="fa-solid fa-pizza-slice"></i>
                        Tamanhos
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
