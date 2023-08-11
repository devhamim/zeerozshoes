<header class="header" data-header>
    <div class="container">

        <div class="overlay" data-overlay></div>

        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('uplode/logo') }}/{{ $settings->first()->logo }}" width="160" height="50" alt="Footcap logo">
        </a>

        <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
            <ion-icon name="menu-outline"></ion-icon>
        </button>

        <nav class="navbar" data-navbar>

            <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
                <ion-icon name="close-outline"></ion-icon>
            </button>

            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('uplode/logo') }}/{{ $settings->first()->logo }}" width="190" height="50" alt="Footcap logo">
            </a>

            <ul class="navbar-list">

                <li class="navbar-item">
                    <a href="{{ url('/') }}" class="navbar-link">Home</a>
                </li>

                <li class="navbar-item">
                    <a href="{{ route('about') }}" class="navbar-link">About</a>
                </li>

                <li class="navbar-item">
                    <a href="{{ route('shop') }}" class="navbar-link">Shop</a>
                </li>

                <li class="navbar-item">
                    <a href="{{ route('category-list') }}" class="navbar-link">Cetagorys</a>
                </li>

                <li class="navbar-item">
                    <a href="{{ route('contact') }}" class="navbar-link">Contact</a>
                </li>

            </ul>

            <ul class="nav-menu nav-menu-social align-to-right">
                <li>
                    {{-- <a href="#" onclick="openSearch()">
              <i class="lni lni-search-alt"></i>
            </a> --}}
                    <div class="border rounded">
                        <div class="input-group">
                            <input type="text" name="search_input" id="search_input" class="form-control custom-height b-0" placeholder="Search for products..." value="{{ @$_GET['q'] }}" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <button id="search_btn" class="btn bg-white text-danger custom-height rounded px-3" type="submit"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="">
                    <a href="#" onclick="openWishlist()">
                        <i class="lni lni-heart"></i><span class="dn-counter theme-bg">{{ $wish_count }}</span>
                    </a>
                </li>
                <li class="">
                    <a href="#" onclick="openCart()">
                        <i class="lni lni-shopping-basket"></i><span class="dn-counter theme-bg">{{ $card_count }}</span>
                    </a>
                </li>
                <li>
                    @auth('customerlogin')
                    <div class="dropdown">
                        <button class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="lni lni-user"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('customer.profile') }}" style="font-size: 14px" href="#">Profile</a>
                            <a class="dropdown-item" style="font-size: 14px" href="{{ route('customer.logout') }}">Logout</a>
                        </div>
                    </div>
                    @else
                    <a href="{{ route('reg.login') }}">
                        <i class="lni lni-user"></i>
                    </a>
                    @endauth
                </li>

            </ul>

        </nav>

    </div>
</header>
