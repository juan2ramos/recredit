<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Creditos Lilipink">
    <meta name="author" content="juan2ramos">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Creditos Lilipink </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body data-site="{{env('APP_URL')}}" class="Admin" id="body">
<div class="row">
    @include('admin.general.nav')
    <main class="Main col is-full-width {{Route::current()->uri }} " id="app">
        @include('admin.general.headerBar')
        @yield('content')
    </main>
</div>
<div class="Loader is-full-screen row justify-center middle-items">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
@yield('script')
</body>
</html>
