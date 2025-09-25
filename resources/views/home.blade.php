@extends('layouts.app')

@section('content')
<section id="section-hero" class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Bienvenue sur Auto-Stop BJ</h1>
        <p class="lead">Trouvez ou proposez un trajet en quelques clics. Le covoiturage, c’est simple et solidaire.</p>
        <a href="{{ route('trajets.index') }}" class="btn-main mt-3">Voir tous les trajets</a>
    </div>
</section>

<div class="spacer-double"></div>

{{-- Bloc des trajets récents --}}
@include('partials.trajets', [
    'trajets' => $trajets,
    'mode' => 'liste',
    'limite' => 3,
    'titre' => 'Quelques trajets à découvrir',
    'sousTitre' => 'Voici des trajets récents proposés par nos conducteurs.'
])

<div class="spacer-double"></div>

<section id="section-avantages" class="bg-light py-5">
    <div class="container text-center">
        <h2>Pourquoi choisir Auto-Stop BJ ?</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <i class="fa fa-car fa-3x text-primary mb-3"></i>
                <h5>Économique</h5>
                <p>Partagez les frais de transport et voyagez à moindre coût.</p>
            </div>
            <div class="col-md-4">
                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                <h5>Convivial</h5>
                <p>Rencontrez des gens et voyagez dans une ambiance détendue.</p>
            </div>
            <div class="col-md-4">
                <i class="fa fa-leaf fa-3x text-primary mb-3"></i>
                <h5>Écologique</h5>
                <p>Réduisez votre empreinte carbone en partageant les trajets.</p>
            </div>
        </div>
    </div>
</section>
@endsection
