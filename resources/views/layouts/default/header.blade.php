<!-- Navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-gray" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h2 mb-0 text-darker text-uppercase d-none d-lg-inline-block" href="#">LOGOㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</a>
        <a class="h4 mb-0 text-darker text-uppercase d-none d-lg-inline-block" href="{{ route('noticias.create') }}">CADASTRAR NOTÍCIAS</a>
        <a class="h4 mb-0 text-darker text-uppercase d-none d-lg-inline-block" href="{{ route('noticias.index') }}">EXIBIR NOTÍCIAS</a>
        <div id="divBusca">
            <input type="text" id="txtBusca" placeholder="Buscar..."/>
        </div>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li>
                @include('layouts.default.header-menu')
            </li>
        </ul>
    </div>
</nav>
<!-- End Navbar -->