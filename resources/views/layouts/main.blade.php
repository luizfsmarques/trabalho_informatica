<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon"  href="{{asset('img/site/logo/site-logo.png')}}" type="image/png"> 
        <title>Info Market</title>

        <style>
             @font-face {
            font-family: BeVietnamPro-light;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-Light.ttf')}}')format('opentype');
            }
            @font-face {
            font-family: BeVietnamPro-regular;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-Regular.ttf')}}')format('opentype');
            }
            @font-face {
            font-family: BeVietnamPro-medium;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-Medium.ttf')}}')format('opentype');
            }
            @font-face {
            font-family: BeVietnamPro-semiBold;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-SemiBold.ttf')}}')format('opentype');
            }
            @font-face {
            font-family: BeVietnamPro-bold;
            src: url('{{asset('fonts/Be_Vietnam_Pro/BeVietnamPro-Bold.ttf')}}')format('opentype');
            }
        </style>

        <link rel="stylesheet" href="{{asset('icons/bootstrap-icons.min.css')}}" type="text/css">
        <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css"> 

    </head>
    <body class="overflow-x-hidden">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produtos">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pedidos">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gerar/clientes">Gerar clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gerar/produtos">Gerar produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gerar/pedidos">Gerar pedidos</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
        </nav>

        @yield('content')

    </body>

    <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}" type="text/javascript"></script>

    <script src="@yield('main_script')" type="text/javascript"></script>
    <!-- <script src="@yield('other_script')" type="text/javascript"></script> -->




</html>