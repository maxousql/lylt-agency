@extends('base')

@section('title')
    Mon compte
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/homepage/favicon.png') }}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/profile/main.css') }}">
@endsection

@section('content')
    @include('components/header')

    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4 pt-5">
        </h4>
        <div class="card overflow-hidden p-3">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">Mes informations</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Mot de passe</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Favoris</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifs">Notifications</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-historique">Historique</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <form action="{{ route('update-user-info') }}" method="POST">
                                @csrf
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Nom</label>
                                        <input name="nom" type="text" class="form-control mb-1"
                                            value="{{ Auth::user()->nom }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Prénom</label>
                                        <input name="prenom" type="text" class="form-control"
                                            value="{{ Auth::user()->prenom }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Téléphone</label>
                                        <input name="telephone" type="text" class="form-control mb-1"
                                            value="{{ Auth::user()->telephone }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Adresse email</label>
                                        <input name="email" type="text" class="form-control"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Sauvegarder</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <form action="{{ route('update-user-password') }}" method="POST">
                                @csrf
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label">Ancien mot de passe</label>
                                        <input name="old-password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nouveau mot de passe</label>
                                        <input name="new-password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirmer nouveau mot de passe</label>
                                        <input name="new-password_confirmation" type="password" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Sauvegarder</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                @if ($favorites->isEmpty())
                                    <label class="form-label">Vous n'avez aucun bien en favoris pour l'instant, n'hésitez
                                        pas à en ajouter un lorsque l'un de nos biens vous plaît !</label>
                                @else
                                    @foreach ($favorites as $favorite)
                                        <div class="card">
                                            <div class="card-header">
                                                {{ \Carbon\Carbon::parse($favorite->date_ajout)->format('d/m/Y') }}
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $favorite->getBienImmo->titre_annonce }}</h5>
                                                <p class="card-text">{{ $favorite->getBienImmo->adresse }}
                                                    {{ $favorite->getBienImmo->ville }}
                                                    {{ $favorite->getBienImmo->code_postal }}
                                                    <br>
                                                    {{ number_format($favorite->getBienImmo->prix, 0, ',', '.') }}€
                                                    <br>
                                                </p>
                                                <a href="{{ route('detail-property', $favorite->id_bienImmo) }}"
                                                    class="btn btn-primary">Consulter</a>
                                                <form action="{{ route('remove-favorite') }}" method="POST"
                                                    style="display: flex">
                                                    @csrf
                                                    <input type="text" name="id_bienImmo"
                                                        value="{{ $favorite->getBienImmo->id_bienImmo }}"
                                                        style="visibility: hidden">
                                                    <button class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifs">
                            <div class="card-body pb-2">
                                @if ($notifications->isEmpty())
                                    <label class="form-label">Vous n'avez aucune notification pour l'instant !</label>
                                @else
                                    @foreach ($notifications as $notification)
                                        <div class="card">
                                            <div class="card-header">
                                                {{ \Carbon\Carbon::parse($notification->created_at)->format('d/m/Y') }}
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $notification->titre_alerte }}</h5>
                                                <p class="card-text">{{ $notification->contenu_alerte }}</p>
                                                <button class="btn btn-primary">Consulter</button>
                                                <a href="{{ route('detail-property', $favorite->id_bienImmo) }}"
                                                    class="btn btn-primary">Consulter</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-historique">
                            <div class="card-body pb-2">
                                @if ($researches->isEmpty())
                                    <label class="form-label">Vous n'avez aucune recherche enregistrée, n'hésitez pas à le
                                        faire pour retrouver ici plus facilement vos recherches préférées !</label>
                                @else
                                    @foreach ($researches as $research)
                                        <div class="card">
                                            <div class="card-header">
                                                {{ $research->achat ? 'A acheter' : 'A louer' }}
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $favorite->getBienImmo->titre_annonce }}</h5>
                                                @if ($research->getTypeBien->intitule_type == 'maison')
                                                    <p class="card-text"><i class="fa-solid fa-home"></i> Maison</p>
                                                @elseif($research->getTypeBien->intitule_type == 'appartement')
                                                    <p class="card-text"><i class="fa-solid fa-building"></i> Appartement
                                                    </p>
                                                @elseif($research->getTypeBien->intitule_type == 'terrain')
                                                    <p class="card-text"><i class="fa-solid fa-leaf"></i> Terrain</p>
                                                @endif

                                                @if ($research->mots_cles)
                                                    <p><i class="fa-solid fa-magnifying-glass"></i>
                                                        {{ $research->mots_cles }}</p>
                                                @endif

                                                @if ($research->ville)
                                                    <p><i class="fa-solid fa-location-dot"></i> {{ $research->ville }}</p>
                                                @endif

                                                @if ($research->budget_max)
                                                    <p><i class="fa-solid fa-sack-dollar"></i>
                                                        {{ number_format($research->budget_max, 0, ',', ' ') . '€ max.' }}
                                                    </p>
                                                @endif
                                                <a href="{{ route('retake-search', ['id' => $research->id_recherche]) }}"
                                                    class="btn btn-primary">Consulter</a>
                                                <i class="btn btn-danger"
                                                    data-search-id="{{ $research->id_recherche }}">Supprimer</i>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="button" class="btn btn-primary">Sauvegarder</button>&nbsp;
            <button type="button" class="btn btn-default">Annuler</button>
        </div>
    </div>

@section('js')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
@endsection

@include('components/footer')

@endsection
