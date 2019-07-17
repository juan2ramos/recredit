@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    <h1 class="h-1">SOLICITUD DE CRÉDITO</h1>
    @include('creditRequest.include.nav')
    <div class="Request">
        <files :files="{{$files}}" route="{{route('credit.created')}}"></files>
    </div>

    @include('front.general.load')

@endsection
