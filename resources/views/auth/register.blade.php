@extends('base')

@section('css')
    {{-- <link rel="shortcut icon" href="{{ URL::asset('assets/img/homepage/favicon.png') }}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> --}}
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/auth/login.css') }}">
@endsection

@section('content')
    @include('components/header')
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                        <div class="box-root"
                            style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">

                <div class="formbg-outer padding-top--64 padding-bottom--24">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">
                            <div class="box-root padding-bottom--24 flex-flex flex-justifyContent--center">
                                <h1>Créer un compte</h1>
                            </div>
                            <form action="{{ route('auth.register') }}" method="POST">
                                @csrf
                                <div class="field padding-bottom--24">
                                    <label for="nom">Nom</label>
                                    <input id="nom" type="nom" name="nom" value="{{ old('nom') }}"
                                        required>
                                    @error('nom')
                                        <label>{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="prenom">Prénom</label>
                                    <input id="prenom" type="prenom" name="prenom" value="{{ old('prenom') }}"
                                        required>
                                    @error('prenom')
                                        <label>{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="telephone">Numéro de Téléphone</label>
                                    <input id="telephone" type="telephone" name="telephone" value="{{ old('telephone') }}"
                                        required>
                                    @error('telephone')
                                        <label>{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="email">Adresse email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <label>{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="field padding-bottom--24">
                                    <div class="grid--50-50">
                                        <label for="password">Mot de passe</label>
                                    </div>
                                    <input id="password" type="password" name="password" required>
                                    @error('password')
                                        <label>{{ $message }}</label>
                                    @enderror
                                    <input id="role_id" type="number" name="role_id" value="2"
                                        style="visibility: hidden">
                                </div>
                                <div class="field padding-bottom--24">
                                    <input type="submit" name="submit" value="Créer un compte">
                                </div>
                            </form>
                            <div class="field">
                                <a class="ssolink" href="{{ route('auth.login') }}">Se connecter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script src="{{ URL::asset('assets/js/homepage/scrollreveal.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/homepage/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/homepage/main.js') }}"></script>
    <script src="{{ URL::asset('assets/js/auth/login.js') }}"></script>
@endsection
