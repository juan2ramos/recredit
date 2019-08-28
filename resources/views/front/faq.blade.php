@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    <h1 class="h-1">PREGUNTAS FRECUENTES</h1>
    <div class="Faq back-secondary">
        <modal></modal>
    </div>
    @include('front.faqModal')
@endsection
