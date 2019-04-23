    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="{{ route('home') }}" class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  @guest
                  <li><a href="{{ route('login') }}">Sign In</a></li>
                  <li><a href="{{ route('register') }}">Sign Up</li>
                  @endguest
                  @auth
                      <li style="margin-right: 13px;">
                          {{ auth()->user()->name }}

                      </li>
                  @endauth
                  <li>
                    <a href="{{ route('cart.index') }}" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</span>
                    </a>
                  </li>
                  <li class="d-inline-block d-md-none ml-md-0">
                      <a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span>
                      </a>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="">
              <a href="{{ route('home') }}">Home</a>
            </li>
            <li><a href="{{ route('shop') }}">Shop</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            @auth
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            @endauth
          </ul>
        </div>
      </nav>
    </header>
