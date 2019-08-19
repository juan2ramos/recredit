<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="description"
          content="Lili Pink es una marca especializada en ropa interior y exterior femenina. Encuentra todo lo que necesitas ingresando ahora a nuestra página web.">
    <meta name="author" content="juan2ramos">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Lilipink </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body data-site="{{env('APP_URL')}}" id="body">
<header class="Header">
    @include('front.general.header')
    @include('front.general.nav')
</header>

<main class="Main {{Route::current()->uri }} " id="app">
    @yield('content')
</main>
<footer class="Footer row justify-center middle-items align-center">
    @include('front.general.footer')
</footer>

@include('front.general.svg')
@include('front.contact')
<script src="{{asset('js/app.js')}}"></script>
{!! Captcha::displayJs() !!}
</body>
</html>
