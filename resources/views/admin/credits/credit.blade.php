@extends('layouts.admin')
@section('title','validar credito')
@section('content')
    <div class="container container-admin mt">

        <h2 class="is-text-center">Validar crédito</h2>
        @if($credit->isEntrepreneurs)
            <div class="row justify-center">
                <p class="p-12 m-t-20 m-b-36" style="background: #31bb31;color: white;">
                    Usuario emprendora
                </p>
            </div>
        @endif
        <validated-credit :user="{{auth()->user()->id}}" credit_id="{{$credit->id}}"
                          :assigned="{{$credit->assigned_user}}"></validated-credit>
        <div class="row Request-form " method="post"
             action="{{route('creditsAdmin.update', $credit->id)}}">
            @csrf
            @method('put')
            <h3 class="col-16 h-3">Datos personales</h3>
            <div class="col-16 col-m-8 col-l-5 m-b-8">
                <p><b>Nombre : </b>{{$user->full_name}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>Cedula : </b>{{$user->document}}</p>
            </div>

            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>Teléfono : </b>{{$user->client->phone}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>celular : </b>{{$user->client->mobile}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>Correo : </b>{{$user->email}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>Dirección : </b>{{$user->client->address}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>Ciudad : </b>{{$user->client->residency_city}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p style="text-transform: capitalize"><b>Punto : </b>{{$user->client->point->name}}</p>
            </div>
            
            <h3 class="col-16 h-3 m-t-20">Referencias</h3>
            <div class="row col-16 is-text-center">
                <div class="col-5 m-b-12">
                    <p></p>
                </div>
                <div class="col-5 m-b-12">
                    <p><b> Nombre</b></p>
                </div>

                <div class="col-5 m-b-12">
                    <p><b>Celular</b></p>
                </div>
                @foreach ($user->references as $reference)

                    <div class="col-16 row ">

                        <div class="col-5 m-b-12">
                            <p>Referencia{{$loop->iteration}}</p>
                        </div>
                        <div class="col-5 m-b-12">
                            <p>{{$reference->name}}</p>
                        </div>

                        <div class="col-5 m-b-12">
                            <p>{{$reference->phone}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <h3 class="col-16 h-3">Archivos</h3>
            <div class="col-16 row justify-start">
                @foreach($user->files as $file)
                    <div class="col-4 m-b-12">
                        <figure class="is-text-center">
                            <a href="{{$file->temporaryUrl}}" target="_blank">
                                <img width="80px" src="{{$file->temporaryUrl}}" alt="">
                                <p class="m-t-8">{{$file->name}} {{$file->metaData['extension']}}</p>
                            </a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <h3 class="col-16 h-3">  Selecciona una tipificación (Opcional)</h3>

            <credit-button
                    :reasons="{{$reasons}}"
                    route="{{route('creditsAdmin.update', $credit->id   )}}"
                    token="{{csrf_token()}}"
                    credit="{{$credit->id}}"
                    :typings="{{$typings}}"
            ></credit-button>
        </div>
    </div>

@endsection
