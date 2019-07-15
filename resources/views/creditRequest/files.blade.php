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
            @if (session('error'))
                <div class="alert-error">
                    <span>{{session('error')}}</span>
                </div>
            @endif
        <input type="hidden" id="userId"
               value="{{(session('userProcess')?
                   optional(session('userProcess'))->id:auth()->user()->id )
                   }}"
        >
        <form action="{{route('credits.store')}}" method="post" class="Request-form container">
            @csrf
            @include('front.request.headerForm')
            <div class="dropzone row justify-center "></div>
            <div class="row m-t-20 justify-around">
                @foreach($files as $file)
                    <div class="File">
                        <div class="File-delete" data-url="{{$file->url}}" data-id="{{$file->id}}">x</div>
                        <div class="m-auto is-text-center">
                            <svg width="62px" height="73px" viewBox="0 0 62 73" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                   stroke-linecap="round" stroke-linejoin="round">
                                    <g id="iconfinder_simpline_4_2305586" transform="translate(1.000000, 1.000000)"
                                       stroke="#EC008C" stroke-width="2">
                                        <path d="M49.5652174,15.6521739 L49.5652174,23.4782609 C49.5652174,24.9190037 50.7331702,26.0869565 52.173913,26.0869565 L60,26.0869565 L49.5652174,15.6521739 L41.7391304,15.6521739 L41.7391304,53.4782609 C41.7391304,54.9190037 40.5711776,56.0869565 39.1304348,56.0869565 L2.60869565,56.0869565 C1.16795283,56.0869565 0,54.9190037 0,53.4782609 L0,2.60869565 C0,1.16795283 1.16795283,0 2.60869565,0 L31.3043478,0 L41.7391304,10.4347826 L33.9130435,10.4347826 C32.4723007,10.4347826 31.3043478,9.26682978 31.3043478,7.82608696 L31.3043478,0"
                                              id="Path"></path>
                                        <path d="M60,31.3043478 L60,67.826087 C60,69.2668298 58.8320472,70.4347826 57.3913043,70.4347826 L20.8695652,70.4347826 C19.4288224,70.4347826 18.2608696,69.2668298 18.2608696,67.826087 L18.2608696,56.0869565"
                                              id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <p class="is-text-center">
                            {{$file->name}}<br>
                            <a target="_blank" href="{{Storage::url($file->url)}}">Ver archivo</a>
                        </p>

                    </div>
                @endforeach
            </div>
            <div class="row justify-center Request-formGroup">
                <button type="submit" id="finalizeButton">Finalizar</button>
            </div>
        </form>

    </div>
    @include('front.request.validateCode')
    @include('front.general.load')

@endsection
