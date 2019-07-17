@extends('layouts.admin')
@section('title','Tiendas')
@section('content')
    <div class="container container-admin mt p-4">
        <div class="row justify-between middle-items">
            <div class="row justify-between middle-items col-16">
                <h2>Tiendas</h2>
                <a class="Link-secondary" href="">Crear una región</a>
            </div>
            <form class="col-16 row justify-between">
                <h4 class="col-16">Nuevo punto</h4>
                <label class="col-m-6 col-15" for="">
                    <select name="" id="">
                        <option value="">Seleccione una región</option>
                        @foreach($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="col-m-6 col-15" for="">
                    <input type="text" placeholder="Ingrese el nombre del punto">
                </label>
                <button>Agregar punto</button>
            </form>
            <points :points="{{$points}}"></points>
        </div>
    </div>
@endsection
