@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    <div class="Home">
        <section class="Home-forms">
            <div class="container row justify-between  p-0">
                <article class="col-m-8 col-5  Home-formsMessage">
                    <p>SÓLO CON<br>TU CÉDULA.</p>
                </article>
                <article class="col-16 col-m-6">
                    <form method="POST" action="{{ route('login') }}" class="Home-formsForm">
                        @guest
                            @csrf
                            <img class="logo-home" src="{{asset('/images/logo-lilipink.png')}}" alt="">
                            <h2>INICIAR SESIÓN</h2>
                            <div class="Home-formsGroup {{ $errors->has('email') ? ' is-error' : '' }} ">
                                <label for="email">E-mail</label>
                                <input type="text" id="email" name="email" value="{{ old('email') }}" required
                                       autofocus>

                                @if ($errors->has('email'))
                                    <span class="is-invalid">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="Home-formsGroup {{ $errors->has('password') ? ' is-error' : '' }}">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="is-invalid">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="row justify-center Home-formsLinks">
                                <a href="{{ route('password.request') }}">¿Olvidaste la contraseña?</a>
                            </div>
                            <button type="submit">ENTRAR</button>
                        @endguest
                        @auth
                            <h2>BIENVENIDO</h2>
                            <p class="capitalize"><span class="color-primary">Usuario: </span>
                                {{auth()->user()->name}} {{auth()->user()->last_name}}
                            </p>
                        @endauth
                    </form>
                    <form action="{{route('users.index')}}" method="get" class="Home-formsForm">
                        <h2 class="second">SOLICITAR CRÉDITO PERSONAL</h2>
                        <div class="Home-formsGroup">
                            <label for="identification">Número de cédula</label>
                            <input type="text" id="identification" name="identification">
                        </div>

                        <button class="second" type="submit">SOLICITAR</button>
                    </form>

                </article>
            </div>
        </section>

        @if (session()->has('createdUser'))
            <div id="alertMessage"
                 data-message="{{session()->get('createdUser')['message']}}"
                 data-secondmessage="{{session()->get('createdUser')['secondMessage']}}"
                 data-typemessage="{{session()->get('createdUser')['typeMessage']}}">
            </div>
        @endif

    </div>
@endsection
<style >
    .logo-home{
        width: 300px;
        margin: auto;
        display: block;
    }
</style>
