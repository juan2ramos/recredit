@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    <div class="container">
        <h1 class="h-1">{{ __('Reset Password') }}</h1>

        <div class="Mini-form">
            <form method="POST" action="{{ route('password.update') }}" class="Home-formsForm">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="Home-formsGroup {{ $errors->has('email') ? ' is-invalidGroup' : '' }} ">
                    <label for="email">E-mail</label>
                    <input id="email" type="email"
                           class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ $email ?? old('email') }}" required autofocus
                    >
                    @if ($errors->has('email'))
                        <span class="is-invalid" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="Home-formsGroup {{ $errors->has('email') ? ' is-invalidGroup' : '' }} ">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password"
                           class="{{$errors->has('email') ? ' is-invalid' : '' }}" name="password"
                           value="{{ $email ?? old('password') }}" required
                    >
                    @if ($errors->has('password'))
                        <span class="is-invalid" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="Home-formsGroup {{ $errors->has('email') ? ' is-invalidGroup' : '' }} ">
                    <label for="password-confirm">Confirmar contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required
                    >
                </div>
                <button class="m-t-12 m-b-80" type="submit">RESTABLECER</button>
            </form>
        </div>
    </div>

@endsection
