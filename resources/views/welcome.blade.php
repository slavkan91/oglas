<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 10vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="content">
            <div class="container">
                @if(count($oglasi))
                    <div class="row">
                        @foreach($oglasi as $oglas)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img class="card-img-top" src="{{ $oglas->slika ? $oglas->slika : 'https://via.placeholder.com/400x900' }}" style="height: 225px; width: 100%; display: block;">
                                    <div class="card-body">
                                        <h1 class="card-text">{{ $oglas->ime }}</h1>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cijena: {{ $oglas->cijena }} KM</li>
                                            <li class="list-group-item">Godiste: {{ $oglas->godiste }}</li>
                                            <li class="list-group-item">Kilometraza: {{ $oglas->kilometraza }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row justify-content-centar">
                            <div class="pagination">
                                {{ $oglasi->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <h1>Nema oglasa</h1>
                @endif
            </div>
        </div>
    </body>
</html>
