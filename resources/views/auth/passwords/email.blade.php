@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    <div class="container">
        <h1 class="h-1">{{ __('Reset Password') }}</h1>
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="Mini-form">
            <form method="POST" action="{{ route('password.email') }}" class="Home-formsForm">
                @csrf
                <div class="Home-formsGroup {{ $errors->has('email') ? ' is-invalidGroup' : '' }} ">
                    <label for="email">E-mail</label>
                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="is-invalid" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <button class="m-t-12 m-b-80" type="submit">RESTABLECER</button>
            </form>

        </div>
    </div>

@endsection
