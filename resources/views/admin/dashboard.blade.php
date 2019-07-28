@extends('layouts.admin')
@section('title','Dashboard')
@section('content')

    <div class="container container-admin mt">
        <div class="row justify-between middle-items">
            <div>
                <h3 class="">Usuarios</h3>

            </div>
            <div class="row middle-items">
                <form class="row search" method="get" action="{{route('dashboard')}}">
                    <input
                            type="text"
                            value="{{request()->input('search')}}"
                            name="search"
                            placeholder="Ingrese un número de cédula o email"/>
                    <button>
                        <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1"
                             xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Productos" transform="translate(-683.000000, -33.000000)" stroke="#EC008C"
                                   stroke-width="1.10672576">
                                    <path d="M691.454209,49.355056 C695.817726,49.355056 699.355056,45.8177265 699.355056,41.4542094 C699.355056,37.0906924 695.817726,33.5533629 691.454209,33.5533629 C687.090692,33.5533629 683.553363,37.0906924 683.553363,41.4542094 C683.553363,45.8177265 687.090692,49.355056 691.454209,49.355056 Z M698.443785,48.4437849 C698.439782,48.4477882 698.439782,48.4542788 698.443785,48.4582821 L702.429137,52.4436346 C702.433141,52.4476379 702.439631,52.4476379 702.443635,52.4436346 C702.447638,52.4396314 702.447638,52.4331407 702.443635,52.4291374 L698.458282,48.4437849 C698.454279,48.4397816 698.447788,48.4397816 698.443785,48.4437849 Z"
                                          id="Combined-Shape"></path>
                                </g>
                            </g>
                        </svg>
                    </button>
                </form>
                @role('SuperAdmin')
                <div class="m-l-12">
                    <div class="fi fi-xlsx " style="margin: 0">
                        <div class="fi-content">xls</div>
                    </div>
                </div>
                @endrole
            </div>
        </div>

        <users :clients="{{$clients}}"
               :search="{{Request()->search ? 1 : 0}}"
               is-analysts="{{auth()->user()->isAnalysts()}}"
        ></users>


    </div>

@endsection

