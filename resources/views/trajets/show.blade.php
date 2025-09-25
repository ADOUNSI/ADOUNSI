@extends('layouts.app')

@section('content')
<section id="section-trajet-detail" class="bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-8 offset-md-2">
                <div class="de-item mb30">
                    <div class="d-img">
                        <img src="{{ asset('images/trajets/' . ($trajet->image ?? 'default.jpg')) }}" class="img-fluid" alt="Trajet {{ $trajet->id }}">
                    </div>
                    <div class="d-info">
                        <div class="d-text">
                            <h3>{{ $trajet->depart }} → {{ $trajet->destination }}</h3>
                            <p><i class="fa fa-calendar"></i> Départ le {{ $trajet->date_depart->format('d M Y à H:i') }}</p>
                            <p><i class="fa fa-user"></i> Conducteur : {{ $trajet->conducteur->nom ?? 'Non renseigné' }}</p>
                            <p><i class="fa fa-users"></i> Places disponibles : {{ $trajet->places_disponibles }}</p>
                            <p><i class="fa fa-money"></i> Prix : {{ $trajet->prix }} FCFA</p>
                            <p><i class="fa fa-comment"></i> Description : {{ $trajet->description ?? 'Aucune description fournie.' }}</p>

                            <div class="spacer-20"></div>

                            @auth
                                <form method="POST" action="{{ route('reservations.store') }}">
                                    @csrf
                                    <input type="hidden" name="trajet_id" value="{{ $trajet->id }}">
                                    <button type="submit" class="btn-main">Réserver ce trajet</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn-main">Connectez-vous pour réserver</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
