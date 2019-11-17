@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')


    <h1 class="h-1"><span style="vertical-align: middle">SOLICITUD EMPRENDEDORAS</span></h1>
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

        <form action="{{route('entrepreneurs.update')}}"
              method="post" class="Request-form container">
            @include('creditRequest.include.headerForm')
            @csrf
            <div class="Request-formGroup {{$errors->has('name')?'error':''}}"
                 data-errorMessage="El campo es requerido">
                <label for="name">Nombres</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="Request-formGroup {{$errors->has('last_name')?'error':''}}"
                 data-errorMessage="El campo es requerido">
                <label for="last_name">Apellidos</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}">
            </div>

            <email
                    :emails="{{$emails}}"
                    before="{{old('beforeEmail',isset($userMail) ? $userMail[0]:'')}}"
                    after="{{old('afterEmail',isset($userMail) ? $userMail[1]:'')}}"
                    other="{{old('other',isset($userMail) ? $userMail[1]:'')}}"
                    error="{{$errors->has('email') ? true : false}}"
            >
            </email>

            <div class="Request-formGroup {{$errors->has('document_type')?'error':''}}"
                 data-errorMessage="El campo es requerido">
                <select name="document_type" id="document_type">
                    <option value="">Tipo de documento</option>
                    <option {{old('document_type') == 'Cédula de ciudadanía' ? 'selected' : '' }} value="Cédula de ciudadanía">
                        Cédula de ciudadanía
                    </option>
                    <option {{old('document_type') == 'cédula de extranjería' ? 'selected' : '' }} value="cédula de extranjería">
                        Cédula de extranjería
                    </option>
                </select>
            </div>
            <div class="Request-formGroup {{$errors->has('document')?'error':''}}"
                 data-errorMessage="El campo es requerido o documento ya ha sido registrado">
                <label for="document">Nº de documento</label>
                <input
                        value="{{old('document')}}"
                        type="text"
                        id="document"
                        name="document">
            </div>
            @if(Auth::check()  && Auth::user()->isPoint())
                <div class="m-t-40">
                    <label for="">Tienda</label>
                    <input type="hidden" name="point" value="{{Auth::user()->point->id}}">
                    <input type="text" disabled value="{{Auth::user()->name}}">
                </div>
            @else
                <label for="" style="margin: 40px 0 -40px; display: block">Selecciona una tienda </label>
                <points-autocomplete
                        :cities="{{$cities}}"
                        :points="{{$points}}"
                        error="{{$errors->has('point') ? true : false}}"
                        city-old="{{old('city')}}"
                        point="{{old('point')}}"
                        city-display="{{old('city')}}"

                ></points-autocomplete>
            @endif

           <div class="row">
               <div class="Request-formGroup col-5 {{$errors->has('residency_city')?'error':''}}"
                    data-errorMessage="El campo es requerido">
                   <label for="residency_city">Ciudad</label>
                   <input value="{{old('residency_city')}}" type="text" id="residency_city"
                          name="residency_city">
               </div>

               <div class="Request-formGroup col-11 {{$errors->has('address')?'error':''}}"
                    data-errorMessage="El campo es requerido" style="padding-left: 20px;">
                   <label for="address">Dirección</label>
                   <input value="{{old('address')}}" type="text" id="address" name="address">
               </div>
           </div>
            <div class="Request-formGroup col-16 {{$errors->has('mobile')?'error':''}}"
                 data-errorMessage="El campo es requerido y debe tener 10 digitos" >
                <label for="mobile">Celular</label>
                <input value="{{old('mobile')}}" type="number"  id="mobile" name="mobile">
            </div>

            <files-entrepreneurs></files-entrepreneurs>
            <div class="Request-formGroup {{$errors->has('policyPinkLife') ? 'error':'' }}"
                 data-errorMessage="Debes aceptar las politicas de Pink Life">
                <p class="m-t-40 row middle-items">
                    <input type="checkbox" id="policyPinkLife" name="policyPinkLife"
                           value="1" {{old('policyPinkLife')}}>
                    <label for="policyPinkLife">
                        Acepto las politicas de uso del sitio de PINK LIFE SAS
                        <a target="_blank" href="{{url('files/politicas-creditos-lilipink.pdf')}}"
                           class="link-show">Descargar</a>
                    </label>
                </p>
            </div>
            <div class="Request-formGroup {{$errors->has('privacyPolicy') ? 'error':'' }}"
                 data-errorMessage="Debes aceptar las politicas de privacidad">
                <p class="m-t-20 row middle-items">
                    <input type="checkbox" id="privacyPolicy" name="privacyPolicy"
                           value="1" {{old('privacyPolicy') }}>
                    <label for="privacyPolicy">
                        Acepto las politicas de privacidad de datos
                        <a target="_blank" href="{{url('files/politicas-datos-creditos-lilipink.pdf')}}"
                           class="link-show">Descargar</a>
                    </label>
                </p>
            </div>
            {!! Captcha::display(['add-js' => false]) !!}
            @if($errors->has('g-recaptcha-response'))
                <div class="error is-text-center">
                    <p>Debes verificar que eres una persona</p>
                </div>
            @endif

            <div class="row justify-center Request-formGroup">
                <button type="submit"> CONTINUAR </button>
            </div>
        </form>
    </div>


@endsection

