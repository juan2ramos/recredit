@extends('layouts.admin')
@section('title','validar credito')
@section('content')

    @php($update = app('request')->route()->getName() == 'points.edit' ?? true)
    <div class="container container-admin mt p-4">
        <div class="row justify-between middle-items ">
            @if (session('success'))
                <div class="alert-success">
                    <span>¡Ciudad creada!</span>
                </div>
            @endif

            <div class="row justify-between middle-items col-16">
                <h2>Ciudades</h2>
                <div class="row">
                    <a class="Link-secondary" href="{{route('cities.create')}}">Crear una ciudad</a>
                </div>
            </div>

        </div>
        <section class="m-b-40 m-t-20 is-full-width table-container">
            <table>
                <thead>
                <tr>
                    <th width="20%">Nombre</th>
                    <th width="20%">Region</th>
                    <th width="5%" class="is-text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td width="20%">{{$city->name}}</td>
                        <td width="20%">{{$city->region->name}}</td>
                        <td width="5%" class="row">
                            <div class="row justify-center middle-items">
                                <a href="{{route('cities.edit', $city)}}">
                                    <img src="../../../images/edit.svg" alt="">
                                </a>
                            </div>
                            <div class="row justify-center middle-items m-l-4">
                                <a href="{{route('cities.destroy', $city)}}">
                                    <img src="../../../images/delete.svg" alt="">
                                </a>
                            </div>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </section>
    </div>



@endsection
