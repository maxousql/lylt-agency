@extends('base')

@section('title')
    Accueil
@endsection
@section('css')
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/homepage/favicon.png') }}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/searchBar/main.css') }}">
@endsection

@section('content')

    @include('components/header')

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home section" id="home">
            <div class="home_container container grid">
                <div class="home__data">
                    <h1 class="home__title">
                        Trouvez <br> Explorez <br> Découvrez
                    </h1>

                    <p class="home__description">
                        Découvrez, explorez, et trouvez la maison de vos rêves avec nos offres exclusives.
                    </p>

                    <form class="home__search" action="{{ route('search-properties-city') }}" method="GET">
                        @csrf
                        <i class='bx bx-map-pin'></i>
                        <input class="home__search-input" type="search" placeholder="Localisation..." id="text-city"
                            name="property-city"
                            @if (isset($request)) value="{{ $request->input('property-city') }}" @endif />
                        <button class="button">Rechercher</button>
                    </form>

                    <div class="home__value">
                        <div>
                            <h1 class="home__value-number">
                                9K <span>+</span>
                            </h1>
                            <span class="home__value-description">
                                Bien <br> vendu
                            </span>
                        </div>
                        <div>
                            <h1 class="home__value-number">
                                2K <span>+</span>
                            </h1>
                            <span class="home__value-description">
                                Client <br> Satisfait
                            </span>
                        </div>
                        <div>
                            <h1 class="home__value-number">
                                28K <span>+</span>
                            </h1>
                            <span class="home__value-description">
                                Prix <br> délivré
                            </span>
                        </div>
                    </div>
                </div>

                <div class="home__images">
                    <div class="home__orbe"></div>
                    <div class="home__img">
                        <img src="{{ URL::asset('assets/img/homepage/home.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!--==================== LOGOS ====================-->
        <section class="logos section">
            <div class="logos__container container grid">
                <div class="logos__img">
                    <img src="{{ URL::asset('assets/img/homepage/logo1.png') }}" alt="">
                </div>
                <div class="logos__img">
                    <img src="{{ URL::asset('assets/img/homepage/logo2.png') }}" alt="">
                </div>
                <div class="logos__img">
                    <img src="{{ URL::asset('assets/img/homepage/logo3.png') }}" alt="">
                </div>
                <div class="logos__img">
                    <img src="{{ URL::asset('assets/img/homepage/logo4.png') }}" alt="">
                </div>
            </div>
        </section>

        @include('components/searchbar')

        <!--==================== POPULAR ====================-->
        <section class="popular section" id="popular">
            <div class="container">
                <span class="section__subtitle">Meilleur choix</span>
                <h2 class="section_title">
                    Nos dernières résidences<span>.</span>
                </h2>

                <div class="popular__container swiper">
                    <div class="swiper-wrapper">
                        @foreach ($recentProperties as $property)
                            <article class="popular__card swiper-slide">
                                <img src="{{ asset('storage/' . $property->getImages->first()->image_path) }}"
                                    alt="Image de {{ $property->titre_annonce }}" class="popular__img">

                                <div class="popular__data">
                                    <h2 class="popular__price">
                                        {{ number_format($property->prix, 2, ',', ' ') }} <span>€</span>
                                    </h2>
                                    <h3 class="popular__title">
                                        <a href="{{ route('detail-property', ['id' => $property->id_bienImmo]) }}"
                                            class="no-decoration">
                                            {{ $property->titre_annonce }} </a>
                                    </h3>
                                    <p class="popular__description">
                                    <p><i class="fas fa-tags"></i> {{ substr($property->contenu_annonce, 0, 50) }}...</p>
                                    <br>
                                    <p><i class="fas fa-bed"></i> {{ $property->nb_pieces }} pièces</p>
                                    <p><i class="fas fa-ruler"></i> {{ $property->surface }} m2</p>
                                    <br>
                                    <i class="fas fa-city"></i> {{ $property->adresse }}, {{ $property->ville }}
                                    {{ $property->code_postal }}
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="swiper-button-next">
                        <i class="bx bx-chevron-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="bx bx-chevron-left"></i>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== SUBSCRIBE ====================-->
        <section class="subscribe section">
            <div class="subscribe__container container">
                <h1 class="subscribe__title">
                    Intéressé par nos biens ?
                </h1>
                <p class="subscribe__description">
                    N'attendez plus et venez découvrir l'ensemble des biens disponibles !!
                </p>
                <a href="{{ route('listing-property') }}" class="button subscribe__button">
                    Découvrir nos biens
                </a>
            </div>
        </section>

        <!--==================== VALUE ====================-->
        <section class="value section" id="value">
            <div class="value__container container grid">
                <div class="value__images">
                    <div class="value__orbe"></div>
                    <div class="value__img">
                        <img src="{{ URL::asset('assets/img/homepage/value.jpg') }}" alt="">
                    </div>
                </div>

                <div class="value__content">
                    <div class="value__data">
                        <span class="section__subtitle">Nos valeurs</span>
                        <h2 class="section__title">
                            Votre Vision <br>
                            Notre Engagement <span>!</span>
                        </h2>
                        <p class="value__description">
                            Découvrez un monde où vos aspirations immobilières prennent vie avec transparence, excellence et
                            innovation. Nous nous engageons à vous offrir une expérience exceptionnelle, en mettant
                            l'intégrité et le service client au cœur de chaque interaction. Explorez nos propriétés avec
                            confiance et laissez-nous transformer votre rêve immobilier en réalité.
                        </p>
                    </div>

                    <div class="value__accordion">
                        <div class="value__accordion-item">
                            <header class="value__accordion-header">
                                <i class="bx bxs-shield-x value__accordion-icon"></i>
                                <h3 class="value__accordion-title">
                                    Transparence
                                </h3>
                                <div class="value__accordion-arrow">
                                    <i class="bx bxs-down-arrow"></i>
                                </div>
                            </header>

                            <div class="value__accordion-content">
                                <p class="value__accordion-description">
                                    Nous nous engageons à offrir une totale transparence dans toutes nos transactions.
                                    Chaque bien est présenté avec des informations complètes et vérifiées, vous permettant
                                    de prendre des décisions éclairées sans surprises ni cachoteries.
                                </p>
                            </div>
                        </div>
                        <div class="value__accordion-item">
                            <header class="value__accordion-header">
                                <i class="bx bxs-shield-x value__accordion-icon"></i>
                                <h3 class="value__accordion-title">
                                    Excellence du Service
                                </h3>
                                <div class="value__accordion-arrow">
                                    <i class="bx bxs-down-arrow"></i>
                                </div>
                            </header>

                            <div class="value__accordion-content">
                                <p class="value__accordion-description">
                                    Notre priorité est d’offrir un service client exceptionnel à chaque étape de votre
                                    parcours immobilier. De la recherche de votre propriété idéale à la finalisation de
                                    l’achat, nous nous efforçons de vous offrir une expérience fluide, personnalisée et de
                                    qualité.
                                </p>
                            </div>
                        </div>
                        <div class="value__accordion-item">
                            <header class="value__accordion-header">
                                <i class="bx bxs-shield-x value__accordion-icon"></i>
                                <h3 class="value__accordion-title">
                                    Innovation
                                </h3>
                                <div class="value__accordion-arrow">
                                    <i class="bx bxs-down-arrow"></i>
                                </div>
                            </header>

                            <div class="value__accordion-content">
                                <p class="value__accordion-description">
                                    Nous investissons dans les dernières technologies pour vous fournir des outils modernes
                                    et efficaces dans votre recherche immobilière. Grâce à nos solutions innovantes, vous
                                    pouvez explorer les propriétés en profondeur et en toute simplicité, du confort de votre
                                    domicile.
                                </p>
                            </div>
                        </div>
                        <div class="value__accordion-item">
                            <header class="value__accordion-header">
                                <i class="bx bxs-shield-x value__accordion-icon"></i>
                                <h3 class="value__accordion-title">
                                    Intégrité
                                </h3>
                                <div class="value__accordion-arrow">
                                    <i class="bx bxs-down-arrow"></i>
                                </div>
                            </header>

                            <div class="value__accordion-content">
                                <p class="value__accordion-description">
                                    Nous agissons avec intégrité dans toutes nos interactions. Que ce soit avec nos clients,
                                    partenaires ou collègues, nous nous engageons à maintenir des normes éthiques élevées,
                                    en veillant à ce que chaque action reflète notre engagement envers la confiance et le
                                    respect mutuels.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== CONTACT ====================-->
        <section class="contact section" id="contact">
            <div class="contact__container container grid">
                <div class="contact__images">
                    <div class="contact__orbe"></div>

                    <div class="contact__img">
                        <img src="{{ URL::asset('assets/img/homepage/contact.png') }}" alt="">
                    </div>
                </div>

                <div class="contact__content">
                    <div class="contact__data">
                        <span class="section__subtitle">Contactez-nous</span>
                        <h2 class="section__title">
                            Il n'a jamais été aussi facile de nous contacter <span>!</span>
                        </h2>
                        <p class="contact__description">
                            Vos questions méritent une réponse rapide et simple. Contactez-nous dès aujourd'hui, et notre
                            équipe dédiée s'assurera de vous répondre dans les plus brefs délais. Nous sommes là pour rendre
                            votre expérience fluide et efficace.
                        </p>
                        <a href="{{ route('contact') }}">Contactez nous !</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('components/footer')

@section('js')
    <script src="{{ URL::asset('assets/js/homepage/scrollreveal.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/homepage/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/homepage/main.js') }}"></script>
@endsection

@endsection
