@extends('base')

@section('title')
    Nos biens
@endsection

@section('css')
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/homepage/favicon.png') }}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/searchbar/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/listing-property/main.css') }}">
@endsection


@section('content')
    @include('components/header')

    <main class="container">
        @include('components/searchbar')

        <div class="container-card">
            @foreach ($properties as $property)
                <div class="card">
                    <a href="{{ route('detail-property', $property->id_bienImmo) }}" style="color: black">
                        <div class="card-header">
                            <img src="{{ asset('storage/' . $property->getImages->first()->image_path) }}"
                                alt="{{ $property->titre_annonce }}" />
                        </div>
                    </a>
                    <div class="card-body">
                        @php
                            $styles = ['tag-teal', 'tag-purple', 'tag-pink'];
                            $randomStyle = $styles[array_rand($styles)];
                        @endphp
                        <span class="tag {{ $randomStyle }}">{{ number_format($property->prix, 0, ',', '.') }} €</span>
                        <br>
                        <h4>
                            {{ $property->titre_annonce }}
                        </h4>
                        <p>
                            <br>
                            <i class="fa-solid fa-pen-to-square"></i> {{ Str::limit($property->contenu_annonce, 250) }}
                            <br>
                            <br>
                            <strong>{{ $property->nb_pieces }}</strong> pièce(s)
                            <br>
                            <strong>{{ $property->nb_chambres }}</strong> chambre(s)
                            <br>
                            <strong>{{ $property->nb_sdb }}</strong> salle(s) de bain(s)
                            <br>
                            <strong>{{ $property->surface }}</strong> m2
                            <br>
                            <br>
                            <i class="fas fa-map-marker-alt"></i> <strong>{{ $property->adresse }}
                                {{ $property->ville }} {{ $property->code_postal }}</strong>
                            <br>
                            <br>
                        <form action="{{ route('add-favorite') }}" method="POST">
                            @csrf
                            <input type="text" name="id_bienImmo" value="{{ $property->id_bienImmo }}">
                            <button type="submit"><span class="tag tag-pink">Favoris</span></button>
                        </form>

                        </p>
                    </div>
                </div>
            @endforeach
            {{ $properties->links() }}
        </div>
    </main>

    @include('components/footer')

@section('js')
    @if (Session::has('success'))
        <script>
            document.getElementById('loader').style.display = 'none';
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: "{{ Session::get('success') }}",
                showConfirmButton: true
            });
        </script>
    @endif
@endsection
@endsection
