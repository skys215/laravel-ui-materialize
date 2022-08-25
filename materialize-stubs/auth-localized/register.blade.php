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
</head>
<body>
  <nav class="navbar nav-extended no-padding blue white-text">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">{{ config('app.name') }}</a>
    </div>
  </nav>
  <main>
    <div class="container">
      <div class="row">
        <div class="col s8 offset-s2">

          <div class="card card-login">
            <div class="card-content">
              <span class="card-title">{{ __('auth.registration.title') }}</span>
              <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="input-field">
                  <input id="name" name="name" type="text" value="{{ old('name') }}">
                  <label for="name">{{ __('auth.full_name') }}</label>
                  @error('name')
                    <span class="helper-text red-text">{{ $message }}</span>
                  @enderror
                </div>

                <div class="input-field">
                  <input id="email" name="email" type="email" value="{{ old('email') }}">
                  <label for="email">{{ __('auth.email') }}</label>
                  @error('email')
                    <span class="helper-text red-text">{{ $message }}</span>
                  @enderror
                </div>

                <div class="input-field">
                  <input id="password" name="password" type="password">
                  <label for="password">{{ __('Password') }}</label>
                  @error('password')
                    <span class="helper-text red-text">{{ $message }}</span>
                  @enderror
                </div>

                <div class="input-field">
                  <input id="password_confirmation" name="password_confirmation" type="password">
                  <label for="password_confirmation">{{ __('auth.confirm_password') }}</label>
                </div>

                <div class="input-field">
                  <label>
                  <input type="checkbox" />
                    <span>{{ __('auth.registration.i_agree') }} <a href="#">{{ __('auth.registration.terms') }}</a>.</span>
                  </label>
                </div>

                <br><br>
                <div>
                  <input class="btn right" type="submit" value="{{ __('auth.register') }}">
                  <a href="{{ route('register') }}" class="btn-flat">{{ __('auth.sign_in') }}</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="page-footer blue grey-text">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">{{ config('app.name') }}</h5>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2022 Copyright
      </div>
    </div>
  </footer>

<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
@if(!empty($errors))
    @if($errors->any())
        <script type="text/javascript">
            @foreach($errors->all() as $error)
                M.toast({html: '{{ $error }}', classes: 'red'})
            @endforeach
        </script>
    @endif
@endif
</body>
</html>
