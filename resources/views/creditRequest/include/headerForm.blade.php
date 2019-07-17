@if(Auth::user()->isAdmin())
    <p>Estás editando el usuario
        {{optional(session('userProcess'))->full_name}} puedes
        <a class="link-show" href="">Eliminar el usuario</a> o
        <a class="link-show" href="">Continuar editando después</a>
    </p>
@endif
