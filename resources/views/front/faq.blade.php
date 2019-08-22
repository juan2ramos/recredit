@extends('layouts.front')
@section('title','Bienvenido a Créditos ')
@section('content')
    <h1 class="h-1">PREGUNTAS FRECUENTES</h1>
    <div class="Faq back-secondary">
        <section class="Faq-content container row">
            <article class="col-16 col-m-8">
                <ul class="is-list-less">
                    <li>
                        <h4>CÓMO PUEDO OBTENER MI CRÉDITO LILI PINK</h4>
                        <p>Solo debes presentar la cédula original, dos referencias personales y tener buenos hábitos
                            de
                            pago; los cuales serán consultados y verificados en centrales de riesgo.
                            <b>NO NECESITAS CODEUDORES</b>.</p>
                    </li>
                    <li>
                        <h4>CUÁNDO RECIBO MI CRÉDITO LILI PINK</h4>
                        <p>Presentando la cédula original en la tienda en donde solicitaste el crédito o si lo hiciste
                            por la página www.creditoslilipink.com, debes pedirla en la tienda que escogiste en el
                            momento de la inscripción"
                        </p>
                    </li>
                    <li>
                        <h4>CÓMO PUEDO INICIAR SESIÓN EN WWW.CREDITOSLILIPINK.COM</h4>
                        <p>
                            Debes tener en cuenta lo siguiente: <br>
                            1. Tu usuario es el e-mail registrado en el momento de la solicitud del crédito <br>
                            2. Seguido este paso, das CLICK en “Olvidaste contraseña” para reestablecer una contraseña que sea única para ti.
                        </p>
                    </li>
                    <li>
                        <h4>CÓMO PUEDO CONSULTAR EL ESTADO DE MI CRÉDITO O EL PAGO MÍNIMO</h4>
                        <p>Puedes hacerlo a través de los siguientes medios: <br>
                            1. Iniciando sesión en www.creditoslilipink.com <br>
                            2. Llamando a la línea de servicio al cliente en bogotá 670 2400 ext: 208 - 133 <br>
                            3. Solicitando la información en cualquier tienda Lili Pink.</p>
                    </li>
                    <li>
                        <h4>TIENE CUOTA DE UTILIZACIÓN O DE MANEJO</h4>
                        <p>1. No hay cuota de manejo.<br>
                            2. Diferir las compras entre 1 y 12 cuotas quincenales generan un cobro de tasas.<br>
                            de interés de cuantías mínimas que van a ser aplicadas de la siguiente forma:</p>

                        <a href="" class="button openModal" data-modal="faqModal">Ver tasas de interés</a>
                    </li>
                </ul>
            </article>
            <article class="col-16 col-m-8">
                <ul class="is-list-less">

                    <li>
                        <h4>QUE DEBO HACER SI NO PUEDO INICIAR SESIÓN EN WWW.CREDITOSLILIPINK.COM</h4>
                        <p>Comunicate a la línea de servicio al cliente en bogotá 670 2400 ext: 208 - 133.</p>
                    </li>

                    <li>
                        <h4>ES POSIBLE CAMBIAR LAS FECHAS LIMITES DE PAGO DE MI CRÉDITO</h4>
                        <p>No. Las fechas del pago del crédito Lili Pink no pueden ser modificadas a solicitud del cliente</p>
                    </li>

                    <li>
                        <h4>SI PRESENTO RETRASO EN MIS CUOTAS</h4>
                        <p>Serás reportado a centrales de riesgo y de persistir o continuar la mora o ser superior a 90 días se realizará cobro jurídico. Recuerda que tener buenos hábitos de pago es su mejor carta de presentación ante el comercio
                            y sector financiero
                        </p>
                    </li>

                    <li>
                        <h4>CUÁNDO PUEDE ESTAR BLOQUEADO EL CRÉDITO</h4>
                        <p>Puede estar cloqueado si presenta mora superior a 30 días, suplantación o perdida.</p>
                    </li>
                </ul>
                <div class="Faq-contentInfo">
                    <h4 class="color-primary ">¿QUIERES MÁS INFORMACIÓN?</h4>
                    <p>PBX: (571) 670 2400 Ext: 114 carteralilipink@lilipink.com //Cra 19A No 196-23 Bogotá</p>
                </div>
            </article>
        </section>
    </div>
    @include('front.faqModal')
@endsection
