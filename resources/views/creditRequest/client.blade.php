@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    @php($update = app('request')->route()->getName() == 'clients.edit' ?? true)

    <h1 class="h-1">SOLICITUD DE CRÉDITO</h1>
    @include('creditRequest.include.nav')
    <div class="Request">

        @if ($errors->any())
            <div class="alert-error m-b-32">
                <span>¡Tienes error en el formulario! revisa los campos</span>
            </div>
        @endif
        @if (session('success'))
            <div class="alert-success">
                <span>¡Datos actualizados!</span>
            </div>
        @endif
        <form action="{{$update ? route('clients.update', $client): route('clients.store')}}"
              method="post" class="Request-form container" id="clientForm"
              autocomplete="off">
            @csrf
            @if ($update) @method('put') @endif
            @include('creditRequest.include.headerForm')
            @if(Auth::user()->isPoint())
                <input type="hidden" name="point" value="{{Auth::user()->point->id}}">
            @else
                <points-autocomplete
                        :cities="{{$cities}}"
                        :points="{{$points}}"
                        error="{{$errors->has('point') ? true : false}}"
                        city-old="{{old('city',$city)}}"
                        point="{{old('point',$client->point_id)}}"
                        city-display="{{old('city')}}"

                ></points-autocomplete>
            @endif

            <div class="Request-formGroup {{$errors->has('residency_city')?'error':''}}"
                 data-errorMessage="El campo es requerido">
                <label for="residency_city">Ciudad de residencia</label>
                <input value="{{old('residency_city',$client->residency_city )}}" type="text" id="residency_city"
                       name="residency_city">
            </div>

            <div class="Request-formGroup {{$errors->has('address')?'error':''}}"
                 data-errorMessage="El campo es requerido">
                <label for="address">Dirección</label>
                <input value="{{old('address', $client->address)}}" type="text" id="address" name="address">
            </div>

            <sms
                    token="{{csrf_token()}}"
                    error="{{$errors->has('mobile') ? true : false}}"
                    mobile-old="{{old('mobile',$client->mobile)}}"
            ></sms>

            <div class="Request-formGroup">
                <label for="phone">Teléfono (opcional)</label>
                <input value="{{old('phone',$client->phone)}}" type="text" id="phone" name="phone">
            </div>

            <div class="row justify-center Request-formGroup">
                <button type="submit">{{$update ?'ACTUALIZAR':'CONTINUAR'}}</button>
            </div>
        </form>
    </div>
    @include('front.general.load')
@endsection
