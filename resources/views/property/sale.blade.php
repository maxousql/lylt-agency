@extends('base')

@section('title')
    Vendre / Louer un bien
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/homepage/favicon.png') }}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/form/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/searchBar/main.css') }}">
@endsection

@section('content')
    @include('components/header')
    <main class="container pt-5">
        <div class="card-body pt-5">
            <h1>Vous envisagez de vendre ou de louer votre bien ?</h1>
            <p> En quelques étapes, vous pouvez nous fournir les informations essentielles sur votre propriété,
                et notre équipe d'experts se chargera du reste. Nous mettons tout en œuvre pour garantir une évaluation
                précise, une mise en marché efficace, et un accompagnement personnalisé tout au long du processus.
            </p>
            <form action="{{ route('register-property') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <select class="form-select mb-3" aria-label="Default select example" name="achat">
                            <option selected id="radio-sale" value="A vendre">A vendre</option>
                            <option id="radio-rental" value="A louer">A louer</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select class="form-select mb-3" aria-label="Default select example" name="typeBien_id">
                            <option selected id="radio-sale" value="1">Maison</option>
                            <option id="radio-rental" value="2">Appartement</option>
                        </select>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="titre_annonce" type="text" class="form-control" id="floatingTitle" placeholder="Titre">
                    <label for="floatingTitle">Titre</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="prix" type="number" class="form-control" id="floatingPrice" placeholder="Titre">
                    <label for="floatingPrice">Prix</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="contenu_annonce" type="text" class="form-control" placeholder="Description" id="floatingDescription"
                        style="height: 150px"></textarea>
                    <label for="floatingDescription">Description</label>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input name="adresse" type="text" class="form-control" placeholder="Adresse"
                                id="floatingAdresse"></input>
                            <label for="floatingAdresse">Adresse</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-3">
                            <input name="ville" type="text" class="form-control" placeholder="Ville"
                                id="floatingCity"></input>
                            <label for="floatingCity">Ville</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-3">
                            <input name="code_postal" type="number" placeholder="Code Postale" class="form-control"
                                id="floatingCodePostale"></input>
                            <label for="floatingCodePostale">Code Postale</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-floating mb-3">
                            <input name="surface" type="number" class="form-control" placeholder="Surface"
                                id="floatingSurface"></input>
                            <label for="floatingSurface">Surface</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-3">
                            <input name="nb_pieces" type="number" class="form-control" placeholder="Nombre de pièces"
                                id="floatingNbPieces"></input>
                            <label for="floatingNbPieces">Nombre de pièces</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-3">
                            <input name="nb_chambres" type="number" class="form-control"
                                placeholder="Nombre de chambres" id="floatingNbBedroom"></textarea>
                            <label for="floatingNbBedroom">Nombre de chambres</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input name="nb_sdb" type="number" class="form-control"
                                placeholder="Nombre de salles de bains" id="floatingNbSdb"></textarea>
                            <label for="floatingNbSdb">Nombre de salles de bains</label>
                        </div>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input name="garage" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Garage</label>
                </div>
                <div class="form-check form-switch">
                    <input name="terrain" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Terrain</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input name="neuf" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Neuf</label>
                </div>
                <div class="mb-3">
                    <input name="photos[]" class="form-control" type="file" id="photos" accept="image/*" multiple
                        required>
                </div>

                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </main>

    @include('components/footer')
@endsection
