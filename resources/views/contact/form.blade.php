@extends('base')

@section('title')
    Contact
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/homepage/favicon.png') }}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/main.css') }}">
@endsection

@include('components/header')

@section('content')
    @include('components/header')

    <main class="container pt-5">
        <div class="card-body pt-5">
            <div class="inner-page contact-page">
                <h1>Vous envisagez de vendre ou de louer <br> votre bien ?</h1>
                <p> En quelques étapes, vous pouvez nous fournir les informations essentielles sur votre propriété,
                    et notre équipe d'experts se chargera du reste. Nous mettons tout en œuvre pour garantir une évaluation
                    précise, une mise en marché efficace, et un accompagnement personnalisé tout au long du processus.
                </p>
            </div>
            <div class="contact-form">
                <form action="{{ route('send-contact-request') }}" id="contact-form" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="contact-firstname" type="text" class="form-control" id="floatingName"
                            placeholder="Prénom" @if (isset(Auth::user()->id_client)) value="{{ Auth::user()->prenom }}" @endif
                            required>
                        <label for="floatingName">Prénom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="contact-lastname" type="text" class="form-control" id="floatingLastname"
                            placeholder="Prénom" @if (isset(Auth::user()->id_client)) value="{{ Auth::user()->nom }}" @endif
                            required>
                        <label for="floatingLastname">Nom de famille</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="contact-mail" type="email" class="form-control" id="floatingEmail"
                            placeholder="Prénom" @if (isset(Auth::user()->id_client)) value="{{ Auth::user()->email }}" @endif
                            required>
                        <label for="floatingEmail">Adresse email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="contact-phonenum" type="tel" class="form-control" id="floatingPhoneNum"
                            placeholder="Prénom"
                            @if (isset(Auth::user()->id_client)) value="{{ Auth::user()->telephone }}" @endif required>
                        <label for="floatingPhoneNum">Téléphone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="contact-message" type="text" class="form-control" placeholder="Message" id="floatingMessage"
                            style="height: 150px"></textarea>
                        <label for="floatingMessage">Message</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </main>

    @include('components/footer')
@endsection
