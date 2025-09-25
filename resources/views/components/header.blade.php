<header class="header-main sticky-top bg-white shadow-sm">
  <div class="container d-flex justify-content-between align-items-center py-3">

    {{-- 🎯 Barre de navigation : contenant principal --}}

    {{-- 🔵 Logo (gauche) --}}
    <div id="logo">
      <a href="{{ route('home') }}">
        <img class="logo-1" src="{{ asset('images/logo-light.png') }}" alt="Logo clair">
        <img class="logo-2" src="{{ asset('images/logo.png') }}" alt="Logo foncé">
      </a>
    </div>

    {{-- 🧭 Menus de navigation (centre-gauche) --}}
    <nav class="nav-main d-none d-md-flex gap-4">
      <a href="{{ route('trajets.index') }}" class="nav-link">Covoiturage</a>
      <a href="{{ route('bus.index') }}" class="nav-link">Bus</a>
      <a href="{{ route('train.index') }}" class="nav-link">Train</a>
      <a href="{{ route('aide') }}" class="nav-link">Daily</a>
    </nav>

    {{-- 🛠️ Menus d’action utilisateur (droite) --}}
    <div class="d-flex align-items-center gap-4">

      {{-- 🔍 Menu : Rechercher --}}
      <a href="{{ route('trajets.recherche') }}" class="nav-link d-flex align-items-center gap-2 text-success">
        <i class="fa fa-search text-success"></i>
        <span>Rechercher</span>
      </a>

      {{-- ➕ Menu : Publier (toujours visible) --}}
      <a href="{{ route('trajets.create') }}" class="nav-link d-flex align-items-center gap-2 text-success fw-bold">
       <span class="rounded-circle bg-success text-white d-inline-flex justify-content-center align-items-center" style="width: 24px; height: 24px;">
        <i class="fa fa-plus" style="font-size: 12px;"></i>
       </span>
       <span>Publier</span>
      </a>

      {{-- 👤 Menu : Connexion / Inscription (si invité) --}}
      @guest
        <div class="dropdown">
          <button class="btn btn-outline-success dropdown-toggle d-flex align-items-center gap-2"
                  type="button" id="authDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user-circle text-success fs-4"></i>
          </button>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="authDropdown">
            <li><a class="dropdown-item text-success" href="{{ route('login') }}">Connexion</a></li>
            <li><a class="dropdown-item text-success" href="{{ route('register') }}">Inscription</a></li>
          </ul>
        </div>
      @endguest

    </div>

  </div>
</header>
