@extends('layouts.admin')
@section('title','Tiendas')
@section('content')
    @php($update = app('request')->route()->getName() == 'points.edit' ?? true)
    <div class="container container-admin mt p-4">
        <div class="row justify-between middle-items ">
            @if ($errors->any())
                <div class="alert-error m-b-32">
                    <span>¡Tienes error en el formulario! revisa los campos</span>
                </div>
            @endif
            <div class="row justify-between middle-items col-16">
                <h2>Crear tienda</h2>

                <div class="row">
                    <a class="Link-secondary" href="{{route('points.create')}}">Crear una ciudad</a>
                    @if ($update )
                        <a class="Link-secondary" href="{{route('points.create')}}">Crear una tienda</a>
                    @endif
                </div>
            </div>
            <form
                    action="{{$update ? route('points.update', $point): route('points.store')}}"
                    class="col-16 row justify-between"  method="post">
                @csrf
                @if ($update) @method('put') @endif
                <h4 class="col-16">Nuevo punto</h4>
                <div class="col-16 col-m-8 pr-md-8 ">
                    <label class="col-m-8 col-15" for="">
                        <select name="city" id="">
                            <option value="">Seleccione una ciudad</option>
                            @foreach($cities as $city)
                                <option
                                        {{old('city', $point->city_id) == $city->id? 'selected':''}}
                                        value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <span class="is-invalid">{{$errors->has('city')?'Debes escoger una ciudad':''}}</span>
                    </label>

                    <label class="col-m-16 col-15 m-t-20 row " for="">
                        <input class=" col-16" value="{{old('trade_name', $point->trade_name)}}"
                               type="text" name="trade_name" placeholder="Ingrese el nombre comercial">
                        <span class="is-invalid">{{$errors->has('trade_name')?'El nombre comercial es requerido':''}}</span>
                    </label>

                    <p class="m-t-20">
                        <input type="checkbox" id="credit" value="1" name="is_credit"
                                {{old('is_credit', $point->is_credit)?'checked':''}}>
                        <label style="font-size: 16px" for="credit">Creditos</label>
                    </p>
                    <p class="m-t-20">
                        <input type="checkbox" name="state" id="state" value="1" checked
                                {{old('state', $point->state)?'checked':''}}>
                        <label style="font-size: 16px" for="state">Activo</label>
                    </p>
                </div>
                <div class="col-16 col-m-8 pr-md-8 ">
                    <label class="col-m-16 col-15" for="">
                        <input type="text" name="name" placeholder="Ingrese el nombre del punto" value="{{old('name', $point->name)}}">
                        <span class="is-invalid">{{$errors->has('name')?'El nombre es requerido':''}}</span>
                    </label>

                    <label class="col-m-16 col-15 m-t-20 row " for="">
                        <input type="text" name="cost_center" placeholder="Ingrese el centro de costos" value="{{old('cost_center', $point->cost_center)}}">
                        <span class="is-invalid">{{$errors->has('cost_center')?'El centro de costos es requerido':''}}</span>
                    </label>

                    <p class="m-t-20">
                        <input type="checkbox" id="entrepreneur" value="1" name="is_entrepreneur"
                                {{old('is_entrepreneur', $point->is_entrepreneur)?'checked':''}}>
                        <label style="font-size: 16px" for="entrepreneur">Emprendedoras</label>
                    </p>

                </div>
                <div class="row justify-center col-16 m-t-40">
                    <button type="submit">{{$update ?'Actualizar':'Agregar punto'}}</button>
                </div>

            </form>
        </div>
    </div>
@endsection
