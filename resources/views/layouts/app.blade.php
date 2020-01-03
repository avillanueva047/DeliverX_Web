<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.17.1"></script>
    <script>
        var placesAutocomplete = places({
          appId: 'plWYP04XL8C0',
          apiKey: '2142aa32b51495a6302c42f4dc069a40',
          container: document.querySelector('#client_direction')
        });
    </script>
    -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Icon Tab -->
    <link rel="icon" href="https://lh3.google.com/u/0/d/1epuj5OQGIs04xvj6k7vPcS4ZeodufmK6=w1920-h937-iv1">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.login') }}">
                    <img src= "https://lh3.google.com/u/0/d/1epuj5OQGIs04xvj6k7vPcS4ZeodufmK6=w1920-h937-iv1" width="30" height="30">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.login') }}"><img src=https://image.flaticon.com/icons/svg/891/891389.svg width="20" height="20"> {{ __('Login') }}</a>
                            </li>
                            <!--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h6 class="dropdown-header"><img src=https://image.flaticon.com/icons/svg/995/995320.svg width="15" height="15"> Actions</h6>
                                    <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="{{ route('admin.login') }}"><img src=https://image.flaticon.com/icons/svg/1585/1585218.svg width="15" height="15">
                                          {{ __('See Delivers') }}
                                      </a>
                                      <a class="dropdown-item" href="{{ route('admin.deliveries')}}"><img src=https://image.flaticon.com/icons/svg/924/924983.svg width="15" height="15">
                                          {{ __('See Current Deliveries') }}
                                      </a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header"><img src=https://image.flaticon.com/icons/svg/214/214342.svg width="15" height="15"> Settings</h6>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="{{ route('change.current.password') }}"><img src=https://image.flaticon.com/icons/svg/179/179543.svg width="15" height="15">
                                          {{ __('Change Password') }}
                                      </a>
                                      <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                       <img src=https://image.flaticon.com/icons/svg/1300/1300674.svg width="15" height="15">
                                          {{ __('Logout') }}
                                      </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
