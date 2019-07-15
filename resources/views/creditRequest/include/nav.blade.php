<div class="container Request-nav">
    <ul class="is-list-less row justify-between Request-navContainer">
        <li>
            <div class="Request-navSvg">
                <a href="{{route('users.index')}}" class="row middle-items ">
                    <svg width="44px" viewBox="0 0 68 60">
                        <use href="#icon-heartActive"></use>
                    </svg>
                    <span class="Request-navSpan">DATOS PERSONALES</span>
                </a>
            </div>
        </li>
        <li>
            <div class="Request-navSvg">
                @can('view', \App\Models\Client::class)
                    <a href="{{route('clients.index')}}" class="row middle-items ">
                        <svg width="44px" viewBox="0 0 68 60">
                            <use href="#icon-heartActive"></use>
                        </svg>
                        <span class="Request-navSpan">DATOS DE CONTACTO</span>
                    </a>
                @else
                    <div class="row middle-items ">
                        <svg width="44px" viewBox="0 0 68 60">
                            <use href="#icon-heart"></use>
                        </svg>
                        <span class="Request-navSpan">DATOS DE CONTACTO</span>
                    </div>
                @endcan
            </div>
        </li>
        <li>
            <div class="Request-navSvg">
                @can('createUserReference')
                    <a href="" class="row middle-items ">
                        <svg width="44px" viewBox="0 0 68 60">
                            <use href="#icon-heartActive"></use>
                        </svg>
                        <span class="Request-navSpan">REFERENCIAS PERSONALES</span>
                    </a>
                @else
                    <div class="row middle-items ">
                        <svg width="44px" viewBox="0 0 68 60">
                            <use href="#icon-heart"></use>
                        </svg>
                        <span class="Request-navSpan">REFERENCIAS PERSONALES</span>
                    </div>
                @endcan
            </div>
        </li>
        <li>
            <div class="Request-navSvg">
                @can('createUserFiles')
                    <a href="" class="row middle-items ">
                        <svg width="44px" viewBox="0 0 68 60">
                            <use href="#icon-heartActive"></use>
                        </svg>
                        <span class="Request-navSpan">CÉDULA</span>
                    </a>
                @else
                    <div class="row middle-items ">
                        <svg width="44px" viewBox="0 0 68 60">
                            <use href="#icon-heart"></use>
                        </svg>
                        <span class="Request-navSpan">CÉDULA</span>
                    </div>
                @endcan
            </div>
        </li>
    </ul>
</div>

