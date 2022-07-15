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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .checked{
            color:rgb(255, 208, 0);

        }
        .nochecked{
            color:black;
        }
    </style>
    {{-- font aswoame cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="app">
        <nav class="navbar  navbar-expand-md navbar-dark  navbar-light bg-primary  shadow-sm">
            <div class="container ">

                {{-- left side in navbar --}}
                <a class="navbar-brand" href="{{ route('getprofile')}}">
                  my Profile
              </a>
                <a class="navbar-brand me-4" href="{{route('home')}}"> Mktabty</a>

                <a class="navbar-brand me-4 " href="{{ route('cart.list') }}">
                    {{ config('app.name ', 'My books') }}
                </a>
                <a class="navbar-brand me-4" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'favorites') }} --}}
                    favorites
                </a>
                   {{-- left side in navbar --}}

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>





        {{-- order by section start --}}


            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 me-5"   >
                <button class="btn btn-primary me-md-2" type="button"   data-bs-toggle="modal" data-bs-target="#exampleModal">rate</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <a href="">
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>

                         </a>

                         <a href="" class="m-2">
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star nochecked "></i>



                         </a>

                         <a href="" class="m-2">
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star nochecked "></i>
                            <i class="fa-solid fa-star nochecked "></i>



                         </a>

                         <a href="" class="m-2">
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star checked "></i>
                            <i class="fa-solid fa-star nochecked "></i>
                            <i class="fa-solid fa-star nochecked "></i>
                            <i class="fa-solid fa-star nochecked "></i>

                         </a>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>



                  <button class="btn btn-primary me-md-2" type="button"   data-bs-toggle="modal" data-bs-target="#exampleModal">latest</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          xzccccxzczsf
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
              </div> --}}
          {{-- order by section end --}}



<!-- Example single danger button -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 me-5">
    <p class="pt-2">ordered by </p>

<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      rate
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{route('home')}}">All rates</a></li>

      @foreach ($data as $rate)
      <li><a class="dropdown-item" href="#">{{$rate['rate']}} stars</a></li>
      @endforeach

    </ul>
  </div>


    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      latest
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{route('home')}}">All rates</a></li>

      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Separated link</a></li>
    </ul>
  </div>
    </div>

        <main class="py-4 row  ">

        <div class="col-3 m-0 h-1000 bg-primary">
            {{-- <ul class="list-group">
                @foreach($catdata as data)
                <li class="list-group-item">{{$data['Type']}}</li>
               @endforeach
              </ul> --}}

          </div>




             <div class="col-8">
            @yield('content')
            </div>

        </main>




    </div>
</body>
</html>
