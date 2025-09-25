<nav>
  <div class="de-flex sm-pt10">
    <div class="de-flex-col">
      <div id="logo">
        <a href="{{ route('home') }}">
          <img class="logo-1" src="{{ asset('images/logo-light.png') }}" alt="Logo clair">
          <img class="logo-2" src="{{ asset('images/logo.png') }}" alt="Logo foncé">
        </a>
      </div>
    </div>

    <div class="de-flex-col header-col-mid">
      @include('partials.mainmenu')
    </div>

    <div class="de-flex-col">
      <div class="menu_side_area">
        <a href="{{ route('login') }}" class="btn-main">Sign In</a>
        <span id="menu-btn"></span>
      </div>
    </div>
  </div>
</nav>
