@extends('layouts.frontTemp')
@section('title','Bienvenido a Créditos ')
@section('content')
    <div class="HomeTemp">
        <figure></figure>
    </div>
@endsection
<style >

.HomeTemp figure {

    margin: 30px auto;
    width: 100vw;
    height: 400px;
    background-image: url('https://cdn.shopify.com/s/files/1/0089/6188/4260/files/VENTA-PLAZOS_4204b6fd-482e-4e8c-b059-2c086d8c9f06.jpg?v=1600826700');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    max-width: 1200px;
}
@media only screen and (max-width: 800px) {
    .HomeTemp figure {
        background-image: url('https://cdn.shopify.com/s/files/1/0089/6188/4260/files/venta-plazos-pque.jpg?v=1600826664');
        max-width: 375px;
    }

</style>
