<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ config('app.name') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Material Icons-->
    <link href="https://fonts.loli.net/icon?family=Material+Icons" rel="stylesheet">

    @stack('third_party_stylesheets')

    @stack('page_css')
</head>
<body class="has-fixed-sidenav">
  <header>
    <div class="navbar-fixed">
      <nav class="navbar white grey-text">
        <div class="nav-wrapper"><span class="brand-logo grey-text text-darken-2">@yield('title')</span>
          <ul id="nav-mobile" class="right">
            <li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a></li>
            <li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">settings</i></a></li>
            <li>
              <a href="#"
                 class="dropdown-trigger waves-effect" data-target="sidenav-left"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="material-icons">exit_to_app</i>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
          </ul>
          <a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
        </div>
      </nav>
    </div>
    @include('layouts.sidebar')
  </header>
    <!-- Page Layout here -->
  <main>
    <div class="row">
      <div class="col s12">
        @yield('content')
      </div>
    </div>
  </main>

  <footer>
    <div class="footer-copyright">
      © 2022 Copyright
    </div>
  </footer>

<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
@stack('third_party_scripts')

@stack('page_scripts')
</body>
</html>
