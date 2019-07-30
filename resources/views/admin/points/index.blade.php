@extends('layouts.admin')
@section('title','Tiendas')
@section('content')
    <div class="container container-admin mt p-4">
        <div class="row justify-between middle-items">

            @if (session('success'))
                <div class="alert-success">
                    <span>¡Ciudad creada creado!</span>
                </div>
            @endif
            <div class="row justify-between middle-items col-16">
                <h2>Tiendas</h2>
                <div class="row">
                    <a class="Link-secondary" href="{{route('cities.index')}}">Ver ciudades</a>
                    <a class="Link-secondary" href="{{route('points.create')}}">Crear una tienda</a>
                </div>
            </div>

            <points :points="{{$points}}"></points>
        </div>
    </div>
@endsection
