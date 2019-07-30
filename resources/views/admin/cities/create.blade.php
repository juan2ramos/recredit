@extends('layouts.admin')
@section('title','validar credito')
@section('content')

    @php($update = app('request')->route()->getName() == 'cities.edit' ?? true)
    <div class="container container-admin mt p-4">
        <div class="row justify-between middle-items ">
            @if ($errors->any())
                <div class="alert-error m-b-32">
                    <span>¡Tienes error en el formulario! revisa los campos</span>
                </div>
            @endif
                <div class="row justify-between middle-items col-16">
                    <h2>Ciudades</h2>
                    <div class="row">
                        <a class="Link-secondary" href="{{route('cities.index')}}">ver ciudades</a>
                    </div>
                </div>
            <form
                    action="{{$update ? route('cities.update', $city): route('cities.store')}}"
                    class="col-16 m-t-40 row justify-between" method="post">
                @csrf
                @if ($update) @method('put') @endif

                <div class="col-16 col-m-8 pr-md-8 ">
                    <label class="col-m-8 col-15" for="">
                        <select name="region_id" id="">
                            <option value="">Seleccione una región</option>
                            @foreach ($regions as $region)
                                <option
                                        {{old('region_id', optional($city->region)->id) == $region->id ?'selected':'' }}
                                        value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                        <span class="is-invalid">{{$errors->has('region_id')?'Debes escoger una región':''}}</span>
                    </label>


                </div>
                <div class="col-16 col-m-8 pr-md-8 ">
                    <label class="col-m-16 col-15" for="">
                        <input type="text" name="name" placeholder="Ingrese el nombre del punto"
                               value="{{old('name', $city->name)}}">
                        <span class="is-invalid">{{$errors->has('name')?'El nombre es requerido':''}}</span>
                    </label>

                </div>
                <div class="row justify-center col-16 m-t-40">
                    <button type="submit">{{$update ?'Actualizar':'Agregar ciudad'}}</button>
                </div>

            </form>
        </div>


    </div>



@endsection
