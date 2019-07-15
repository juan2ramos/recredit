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
            <svg class="Header-logoIntima" width="120px" viewBox="0 0 159 23">
                <use href="#icon-logoIntima"></use>
            </svg>
        </div>
        <div class="Nav-mobileButton" id="navMobileButton">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="row middle-items">
            <div class="Header-credits hide-phone">
                <div class=" row align-end Header-creditsContent">
                <span class="Header-creditsContentSpan">
                    {{ auth()->check() ? auth()->user()->name : 'CRÉDITOS' }}
                </span>
                    <div class="Header-creditsContentSvg">
                        <svg width="30px" viewBox="0 0 50 54">
                            <use href="#icon-logoCredit"></use>
                        </svg>
                    </div>
                </div>
            </div>
            @auth
                <div class="m-l-8 ">
                    <a href="{{route('logout')}}">
                        <svg class="Header-close" viewBox="0 0 512.001 512.001" width="24px">
                            <use href="#icon-close"></use>
                        </svg>
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>
<div class="row justify-center Header-logoBig">
    <a href="{{route('home')}}">
        <svg width="320px" height="52px" viewBox="0 0 442 80">
            <use href="#icon-logo"></use>
        </svg>
    </a>
</div>