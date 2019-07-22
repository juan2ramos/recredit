@extends('layouts.admin')
@section('title','Editar usuario ' . $user->full_name)
@section('content')

    <div class="container container-admin mt">
        <div class="row justify-between middle-items">

            <form-user
                    :user="{{$user}}"
                    :cities="{{$cities}}"
                    :points="{{$points}}"
                    token="{{csrf_token()}}"
                    :credit="{{$credit}}"
                    super-admin="{{auth()->user()->isSuperAdmin()}}"
            ></form-user>
        </div>
    </div>
@endsection
