@if(optional(Auth::user())->isAdmin())
    <links-header :user="{{session('userProcess') ? session('userProcess') : 0}}"></links-header>
@endif
