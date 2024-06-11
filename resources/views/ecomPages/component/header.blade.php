<nav class="container">
    <div class="nav-wrap">
        <h1 class="logos logo products-logo">FKH.CO<a href="{{url('/')}}" class="hidden-link"></a></h1>
        <input type="text" placeholder="Search product..." class="search-wrap" />
        <div class="icons-wrap">
            <a href={{ url('/cart') }} class="cart-btn obj-href">
                <img src="{{ url('fkhco/assets/svg/shopping-cart.svg') }}" alt="cart-icon" />
            </a>
            <div class="dropdown">
                <button class="btn-dropdown" id="dropdownMenuButton">
                    <img src="{{ url('fkhco/assets/svg/user.svg') }}" alt="user-icon" />
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Orders</a>
                    <a class="dropdown-item" href="#">Log out</a>
                    <a class="dropdown-item" href="{{url("/dashboard")}}" style="{{Auth()->user() ? (Auth()->user()->role == "user" ? "display:none;" : "display:block") : "display:none;" }}">Admin</a>
                </div>
                {{-- <a href={{ Route('login') }} class="user-btn obj-href">
                    <img src="{{ url('fkhco/assets/svg/user.svg') }}" alt="user-icon" />
                </a> --}}
            </div>

            {{-- @php
                dd(Auth()->user());
            @endphp --}}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" data-widget="navbar-search" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" role="button">
                    <p>Logut</p>
                  </form>
                  </a>
                </li>
            </ul>
            <a href="{{url('/login')}}">login</a>

            <p>status login saat ini : <strong style="font-weight: 700">{{Auth()->user() ? Auth()->user()->role : "None"}}</strong></p>
        </div>
    </div>
</nav>