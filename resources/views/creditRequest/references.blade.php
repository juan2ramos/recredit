@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    <h1 class="h-1">SOLICITUD DE CRÉDITO</h1>
    @include('creditRequest.include.nav')
    <div class="Request">
        @php($update = app('request')->route()->getName() == 'references.edit' ?? true)

        @if ($errors->any())
            <div class="alert-error m-b-32">
                <span>¡Tienes error en el formulario! revisa los campos</span>
            </div>
        @endif

        <form
                action="{{$update ? route('references.update', $user): route('references.store')}}"
                method="post" class="Request-form container">
            @csrf
            @if ($update) @method('put') @endif
            @include('creditRequest.include.headerForm')
            <input type="hidden" name="page" value="client">

            <div class="Request-formGroup
            {{$errors->has('references.0.name') || $errors->has('references.0.phone') ?'error':''}}"
                 data-errorMessage="El nombre es requerido, el celular debe de ser de 10 dígitos,
                 no debe ser igual al número de cédula ni el celular del usuario">
                <label for="name">Referencia personal 1</label>
                <input type="hidden" name="references[0][id]"
                       value="{{$references->isNotEmpty() ? $references[0]->id : ''}}">
                <input class="m-t-4"
                       value="{{old('references.0.name', $references->isNotEmpty() ? $references[0]->name:'')}}"
                       placeholder="Nombre" type="text" name="references[0][name]">
                <input class="m-t-20"
                       value="{{old('references.0.phone', $references->isNotEmpty() ? $references[0]->phone:'')}}"
                       placeholder="Celular" type="text" name="references[0][phone]">
            </div>

            <div class="Request-formGroup p-t-28
            {{$errors->has('references.1.name') || $errors->has('references.1.phone') ?'error':''}}"
                 data-errorMessage="El nombre es requerido, el celular debe de ser de 10 dígitos,
                 no debe ser igual al número de cédula ni el celular del usuario y debe ser diferente al de la referencia 1">
                <label for="name">Referencia personal 2</label>

                <input type="hidden" name="references[1][id]"
                       value="{{$references->isNotEmpty() ? $references[1]->id: ''}}">
                <input class="m-t-4"
                       value="{{old('references.1.name', $references->isNotEmpty() ?$references[1]->name:'')}}"
                       placeholder="Nombre" type="text" name="references[1][name]">
                <input class="m-t-20"
                       value="{{old('references.1.phone', $references->isNotEmpty() ?$references[1]->phone:'')}}"
                       placeholder="Celular" type="text" name="references[1][phone]">
            </div>

            <div class="row justify-center Request-formGroup">
                <button type="submit">{{$update ?'ACTUALIZAR':'CONTINUAR'}}</button>
            </div>
        </form>
    </div>
    @include('front.general.load')
@endsection
