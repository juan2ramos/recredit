@extends('layouts.admin')
@section('title','validar credito')
@section('content')
    <div class="container container-admin mt">

        <h2 class="is-text-center">Validar crédito</h2>
        <validated-credit :user="{{auth()->user()->id}}" credit_id="{{$credit->id}}"
                          :assigned="{{$credit->assigned_user}}"></validated-credit>
        <div class="row justify-between Request-form " method="post"
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
                <p><b>Correo : </b>{{$user->email}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>celular : </b>{{$user->client->mobile}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>Dirección : </b>{{$user->client->address}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>Ciudad : </b>{{$user->client->residency_city}}</p>
            </div>
            <div class="col-16 col-m-8 col-l-5 m-b-12">
                <p><b>Punto : </b>{{$user->client->point->name}}</p>
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
                            <p>Referecia {{$loop->iteration}}</p>
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
                                <img width="80px" src="{{asset('images/file.svg')}}" alt="">
                                <p class="m-t-8">{{$file->name}} {{$file->metaData['extension']}}</p>
                            </a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <credit-button
                    :reasons="{{$reasons}}"
                    route="{{route('creditsAdmin.update', $credit->id   )}}"
                    token="{{csrf_token()}}"
                    credit="{{$credit->id}}"
            ></credit-button>
        </div>
    </div>

@endsection
<style scope lang="scss">
    p {
        text-transform: uppercase;
    }
    p b {
        text-transform: capitalize;
    }
</style>
