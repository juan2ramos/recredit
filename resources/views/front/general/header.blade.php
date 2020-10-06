<div class="back-primary">
    <div class="Header-logoContainer row container justify-between align-end">
        <div class="Header-logo p-t-4">
            <div class="Header-logoLili m-r-24">
                <div class="Header-logoLiliLink">
                    <a href="">
                        <svg width="64px" viewBox="0 0 442 80">
                            <use href="#icon-logo"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="Nav-mobileButton" id="navMobileButton">
            <span></span>
            <span></span>
            <span></span>
        </div>
        @auth
            <div class="row middle-items">
                <div class="Header-credits hide-phone">
                    <div class=" row align-end Header-creditsContent">
                <span class="Header-creditsContentSpan">
                    {{ auth()->check() ? auth()->user()->name : 'CRÉDITOS' }}
                </span>

                    </div>
                </div>

                <div class="m-l-8 ">
                    <a href="{{route('logout')}}">
                        <svg class="Header-close" viewBox="0 0 512.001 512.001" width="24px">
                            <use href="#icon-close"></use>
                        </svg>
                    </a>
                </div>

            </div>
        @endauth
    </div>
</div>
<div class="row justify-center Header-logoBig">
    <a href="{{route('home')}}">
        <img width="300px" src="{{asset('images/logo-credi-pink.png')}}" alt="">
    </a>
</div>
