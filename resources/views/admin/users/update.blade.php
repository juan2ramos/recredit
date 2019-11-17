@extends('layouts.admin')
@section('title','Crear usuario ' )
@section('content')

    <div class="container container-admin mt">
        <update-admin
                :cities="{{$cities}}"
                :points="{{$points}}"
                token="{{ csrf_token() }}"
                route="{{ route('updateAdmin', $user->document)}}"
                :admin="{{$user}}"

        >
        </update-admin>

    </div>
@endsection
