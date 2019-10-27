<nav class="container Nav hide-phone">
    <ul class="is-list-less row justify-center m-a" style="margin: auto">
        <li><a href="/">INICIO</a></li>
        <li><a href="{{route('users.index')}}">SOLICITUD DE CRÉDITO</a></li>
        <li><a href="{{route('faq')}}">PREGUNTAS FRECUENTES</a></li>
        <li><a href="" data-modal="contact" class="openModal">CONTACTO</a></li>
        @auth
            <li><a href="{{url('admin')}}">ADMIN</a></li>
        @endauth
    </ul>
</nav>
<div class="Nav-mobile row middle-items justify-center">
    <ul class="is-list-less is-text-center">
        <li>
            <a href="{{route('home')}}">
                <svg width="200px" viewBox="0 0 442 80">
                    <use href="#icon-logo"></use>
                </svg>
            </a>
        </li>
        <li><a href="/">INICIO</a></li>
        <li><a href="{{route('users.index')}}">SOLICITUD DE CRÉDITO</a></li>
        <li><a href="{{route('faq')}}">PREGUNTAS FRECUENTES</a></li>
        <li><a href="" data-modal="contact" class="openModal">CONTACTO</a></li>
        @auth
            <li><a href="{{url('admin')}}">ADMIN</a></li>
        @endauth
        @auth
            <li><a href="{{route('logout')}}">CERRAR SESIÓN</a></li>
        @endauth
    </ul>
</div>
