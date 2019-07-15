@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    <h1 class="h-1">SOLICITUD DE CRÉDITO</h1>
    @include('front.request.nav')
    <div class="Request">

        @if ($errors->any())
            <div class="alert-error m-b-32">
                <span>¡Tienes error en el formulario! revisa los campos</span>
            </div>
        @endif

        <form action="{{route('UserReference.store')}}" method="post" class="Request-form container">
            @csrf
            @include('front.request.headerForm')
            <input type="hidden" name="page" value="client">

            <div class="Request-formGroup {{$errors->has('name.0') || $errors->has('phone.0') ?'error':''}}"
                 data-errorMessage="Debes ingresar el nombre y el celular">
                <label for="name">Referencia personal 1</label>
                <input class="m-t-4" value="{{old('name.0')}}" placeholder="Nombre" type="text" name="name[]">
                <input class="m-t-20" value="{{old('phone.0')}}" placeholder="Celular" type="text" name="phone[]">
            </div>

            <div class="Request-formGroup p-t-28 {{$errors->has('name.1') || $errors->has('phone.1') ?'error':''}}"
                 data-errorMessage="Debes ingresar el nombre y el celular">
                <label for="name">Referencia personal 2</label>
                <input class="m-t-4" value="{{old('name.1')}}" placeholder="Nombre" type="text" name="name[]">
                <input class="m-t-20" value="{{old('phone.1')}}" placeholder="Celular" type="text" name="phone[]">
            </div>

            <div class="row justify-center Request-formGroup">
                <button type="submit">CONTINUAR</button>
            </div>
        </form>
    </div>
    @include('front.request.validateCode')
    @include('front.general.load')
@endsection
