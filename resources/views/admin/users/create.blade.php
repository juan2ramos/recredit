@extends('layouts.admin')
@section('title','Crear usuario ' )
@section('content')

    <div class="container container-admin mt">

        <create-admin
                :cities="{{$cities}}"
                :points="{{$points}}"
                token="{{ csrf_token() }}"
                route="{{ route('usersAdmin.store')}}"
        >
        </create-admin>

        <admins :admins="{{$admins}}"></admins>


    </div>
@endsection
