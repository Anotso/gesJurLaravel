<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ml-auto">
        <a class="nav-link" href="{{ route('index') }}">Home</a>
      </li>
      <li class="nav-item ml-auto">
        <a class="nav-link" href="{{ route('plans') }}">Planos</a>
      </li>
      <li class="nav-item ml-auto">
        <a class="nav-link" href="{{ route('services') }}">Serviços</a>
      </li>
      <li class="nav-item ml-auto">
        <a class="nav-link" href="{{ route('about') }}">Sobre</a>
      </li>
    </ul>
  </div>
</nav>