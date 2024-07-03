@php
        $user = Auth()->user();
        if($user) {
            $cartCount = \DB::table('cart')
            ->where('id_user',  $user->id)
            ->count();
        }
@endphp

<nav class="container">
    <div class="nav-wrap">
        <h1 class="logos logo products-logo">FKH.CO<a href="{{url('/')}}" class="hidden-link"></a></h1>
        <input type="text" placeholder="Search product..." class="search-wrap" />
        <div class="icons-wrap">
            <a href="{{ url('/cart') }}" class="cart-btn obj-href">
                @auth
                    <span class="cart-count">{{$cartCount}}</span>
                @endauth
                <img src="{{ url('fkhco/assets/svg/shopping-cart.svg') }}" alt="cart-icon" class="icon-img"/>
            </a>
            <div class="dropdown-wrap">
                <button class="btn-dropdown" id="dropdownMenuButton">
                    <img src="{{ url('fkhco/assets/svg/user.svg') }}" alt="user-icon" class="icon-img" />
                </button>
                @php
                    $userCondition = Auth::user();
                @endphp
                <div class="dropdown-menu-wrapper">
                    @auth
                        <a class="dropdown-single-item" href="{{url("/profile")}}">Profile</a>
                        <a class="dropdown-single-item" href="{{url("/orders")}}">Orders</a>
                        @if(Auth::check() && $userCondition->role == "admin")
                            <a class="dropdown-single-item" href="{{url("/dashboard")}}">Admin</a>
                        @endif
                        <form class="dropdown-single-item" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" role="button">Log out</a>
                        </form>
                    @endauth
                    @guest
                        <a class="dropdown-single-item" href="{{url('/login')}}">Login</a>   
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
