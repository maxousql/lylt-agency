<!--==================== HEADER ====================-->
<header class="header" id="header"
    style="{{ Route::currentRouteName() !== 'homepage' ? 'background-color: white' : '' }}">
    <nav class="nav container">
        <a href="{{ route('homepage') }}" class="nav__logo"
            style="{{ Route::currentRouteName() !== 'homepage' ? 'color: hsl(228, 66%, 47%)' : '' }}">
            LYLT Agency <i class="bx bxs-home-alt-2"></i>
        </a>

        <div class="nav__menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="{{ route('homepage') }}"
                        class="nav__link {{ Route::currentRouteName() == 'homepage' ? 'active-link' : '' }}">
                        <i class="bx bx-home-alt-2"></i>
                        <span>Accueil</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="{{ route('listing-property') }}"
                        class="nav__link {{ Route::currentRouteName() == 'listing-property' ? 'active-link' : '' }}">
                        <i class="bx bx-building-house"></i>
                        <span>Nos biens</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="{{ route('sale-form') }}"
                        class="nav__link {{ Route::currentRouteName() == 'sale-form' ? 'active-link' : '' }}">
                        <i class="bx bx-award"></i>
                        <span>Vendre / Louer</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="{{ route('contact') }}"
                        class="nav__link {{ Route::currentRouteName() == 'contact' ? 'active-link' : '' }}">
                        <i class="bx bx-phone"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </div>

        @guest
            <a href="{{ route('auth.login') }}" class="button nav__button">Connexion</a>
        @endguest

        @auth
            <a href="{{ Auth::user()->role_id == 1 ? route('admin-account') : route('user-account') }}"
                class="button nav__button">Mon compte</a>
            <form action="{{ route('auth.logout') }}" method="GET">
                @method('delete')
                @csrf
                <button class="button nav__button"><i class="fa-solid fa-right-from-bracket"></i></a>

            </form>
        @endauth
    </nav>
</header>
