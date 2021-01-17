<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
    @yield('css')
    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet">
    <style>
      .c-main{
        margin-top: 15%;
      }
      @media only screen and (max-height: 600px){
        .c-main{
          margin-top: 0;
          margin-bottom: 15px;
        }
      }
    </style>
</head>
<body>
  <nav>
    <ul class="nav mb-6">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('index') }}"><h3>LOGO</h3></a>
      </li>
    </ul>
  </nav>
    <main class="c-main">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card-group">
              <div class="card p-4">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-muted">Sign In to your account</p>
                  <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                          </svg>
                        </span>
                      </div>
                      <input class="form-control" type="text" placeholder="" name="email" value="{{ old('email') }}" required autofocus>
                      </div>
                      <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <svg class="c-icon">
                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                          </svg>
                        </span>
                      </div>
                      <input class="form-control" type="password" placeholder="" name="password" required>
                      </div>
                      <div class="row">
                      <div class="col-6">
                          <button class="btn btn-primary px-4" type="submit">Login</button>
                      </div>
                      </form>
                      <div class="col-6 text-right">
                          <a href="" class="btn btn-link px-0">{{ __('Forgot Your Password?') }}</a>
                      </div>
                      </div>
                </div>
              </div>
              <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                <div class="card-body text-center">
                  <div>
                    <h2>Sign up</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    @yield('javascript')
</body>
</html>