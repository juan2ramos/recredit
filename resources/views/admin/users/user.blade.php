@extends('layouts.admin')
@section('title','Editar usuario ' . $user->full_name)
@section('content')

    <div class="container container-admin mt">
        <div class="row justify-between middle-items">
            <form-user :user="{{$user}}" :regions="{{$regions}}" :points="{{$points}}"> </form-user>
        </div>
    </div>
@endsection
