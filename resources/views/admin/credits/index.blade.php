@extends('layouts.admin')
@section('title','Creditos pendientes')
@section('content')
    <div class="container container-admin mt">
        <div class="row justify-between middle-items">
            @if (session()->has('success'))
                <div class="alert-success"><span>¡Usuario aprobo el crédito!</span></div>
            @endif
            <h2>Solicitud de creditos pendientes</h2>
            @if($credits->isNotEmpty())
                <section class="m-b-40 is-full-width table-container">
                    <table>
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Cédula</th>
                            <th>Prioridad</th>
                            <th>Ciudad</th>
                            <th>Punto</th>
                            <th>Fecha de solicitud</th>
                            <th>Asignada</th>
                            <th class="is-text-center">Revisar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($credits as $credit)
                            <tr>
                                <td>{{$credit->user->full_name}}</td>
                                <td>{{$credit->user->document}}</td>
                                <td>{{$credit->priorityName}}</td>
                                <td>{{$credit->user->client->point->city->name}}</td>
                                <td>{{$credit->user->client->point->name}}</td>
                                <td>{{$credit->created_at}}</td>
                                <td >{{$credit->assigned ? $credit->assigned->name : 'Ninguno'}}</td>
                                <td>
                                    <div class="row justify-center">
                                        <a href="{{route('creditsAdmin.show',$credit->id)}}">
                                            <img width="32px" src="{{asset('images/folder-check.svg')}}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            @else
                <p class="col-16 m-t-20"> No hay solicitudes pendientes</p>
            @endif
        </div>
    </div>
@endsection
