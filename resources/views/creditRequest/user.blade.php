@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    @php($update = app('request')->route()->getName() == 'users.edit' ?? true)

    <h1 class="h-1" style="font-size: 3rem; margin-bottom: -24px;"><span style="vertical-align: middle">SOLICITUD

    </h1>
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

        <form action="{{$update ? route('users.update', $user): route('users.store')}}"
              method="post" class="Request-form container">
            @include('creditRequest.include.headerForm')
            @csrf
            @if ($update) @method('put') @endif

            <div class="Request-formGroup {{$errors->has('name')?'error':''}}"
                 data-errorMessage="El campo es requerido">
                <label for="name">Nombres</label>
                <input type="text" id="name" name="name" value="{{ old('name',$user->name) }}">
            </div>

            <div class="Request-formGroup {{$errors->has('last_name')?'error':''}}"
                 data-errorMessage="El campo es requerido">
                <label for="last_name">Apellidos</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name',$user->last_name) }}">
            </div>
            @if ($update) @php($userMail = explode("@", $user->email)) @endif

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
                    <option {{old('document_type',$user->document_type) == 'Cédula de ciudadanía' ? 'selected' : '' }} value="Cédula de ciudadanía">
                        Cédula de ciudadanía
                    </option>
                    <option {{old('document_type',$user->document_type) == 'cédula de extranjería' ? 'selected' : '' }} value="cédula de extranjería">
                        Cédula de extranjería
                    </option>
                </select>
            </div>
            <div class="Request-formGroup {{$errors->has('document')?'error':''}}"
                 data-errorMessage="El campo es requerido o documento ya ha sido registrado">
                <label for="document">Nº de documento</label>
                <Document
                    document-old="{{old('document', $user->document ? $user->document : app('request')->input('identification'))}}"
                />

            </div>
            <div class="Request-formGroup {{$errors->has('policyPinkLife') ? 'error':'' }}"
                 data-errorMessage="Debes aceptar las politicas de Pink Life">
                <p class="m-t-40 row middle-items">
                    <input type="checkbox" id="policyPinkLife" name="policyPinkLife"
                           value="1" {{old('policyPinkLife') || $user->document ?'checked':''}}>
                    <label for="policyPinkLife">
                        Acepto las politicas de uso del sitio de PINK LIFE SAS
                        <a target="_blank" href="{{url('files/POLÍTICAS_DE_PRIVACIDAD_EN_LA_INFORMACIÓN_PINK_LIFE_S.A.S._2019.pdf')}}"
                           class="link-show">Descargar</a>
                    </label>
                </p>
            </div>

            <div class="Request-formGroup {{$errors->has('privacyPolicy') ? 'error':'' }}"
                 data-errorMessage="Debes aceptar las politicas de privacidad">
                <p class="m-t-20 row middle-items">
                    <input type="checkbox" id="privacyPolicy" name="privacyPolicy"
                           value="1" {{old('privacyPolicy') || $user->document ? 'checked':'' }}>
                    <label for="privacyPolicy">
                        Acepto las politicas de privacidad de datos
                        <a target="_blank" href="{{url('files/POLÍTICAS_DE_PRIVACIDAD_EN_LA_INFORMACIÓN_PINK_LIFE_S.A.S._2019.pdf')}}"
                           class="link-show">Descargar</a>
                    </label>
                </p>
            </div>
            @if (!$update)
                {!! Captcha::display(['add-js' => false]) !!}
            @endif
            @if($errors->has('g-recaptcha-response'))
                <div class="error is-text-center">
                    <p>Debes verificar que eres una persona</p>
                </div>
            @endif

            <div class="row justify-center Request-formGroup">
                <button type="submit"> {{$update ?'ACTUALIZAR':'CONTINUAR'}}</button>
            </div>
        </form>
    </div>


@endsection

