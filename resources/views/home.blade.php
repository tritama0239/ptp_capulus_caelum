<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Home | Capulus Caelum</title>
        <style>
            body{
                background-image: url(image/bg2.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
            .title{
                text-align: center;
                font-size: 2.5em;
                color: #000;
            }
         
        </style>
    </head>

    <body class="antialiased">

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #a37351">
        <div class="container">   
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('')}}"><img src="{{ asset('image/logo1.png') }}" alt="" width="20%" height="20%"/></a>
                    </li>

                    <li class="nav-item">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    </li>
                </ul>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::user()->level }}">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> Log Out
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="jumbotron text-center" padding-top="10px" ><br><br>
        <div class="container" style="background-color: #E7D8CF" > 
            <div class="row justify-content-center">
                <div class="col-md-6">
                        <div class="card-header">{{ __('Welcome !!!') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    <img src="{{ asset('image/logo.png') }}" alt="Capulus Caelum" width="200" img-thumbnail/>
                    <h1 class="display-4">Cafe And Roastery</h1>
                    <hr class="my-6">
                    <p class="lead">Jl. dr. Wahidin Sudirohusodo no. 5-25 Yogyakarta, Indonesia – 55224</p>
                    <p>Telp. +62274563929 | Fax: +62274513235</p>
                </div>
            </div>
        </div>
    </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>

</html>