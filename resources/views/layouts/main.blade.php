<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title> @yield('title') </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,300&family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/6a5dd2730c.js"></script>

    <link rel="stylesheet" href="/css/style.css">

    <script src="/js/script.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/"> <img src="/img/logo.png" alt="HDC Event Logo" width="50px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/">Eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/evento/adicionar">Criar Eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Entrar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cadastrar</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
    <div class="container col-10 col-md-6">
        @if (session('msg-success'))
            <div class="alert alert-success text-center">
              {{ session('msg-success') }}
            </div>
        @elseif (session('msg-error'))
        <div class="alert alert-danger text-center">
          {{ session('msg-error') }}
        </div>
        @endif
    </div>
    
    @yield('content')

    <footer class="mx-4 text-center">
        <p> HDC Events &copy; 2020</p>
    </footer>
</body>
</html>