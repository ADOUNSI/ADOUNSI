@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="mb-4">Publier un nouveau trajet</h2>

  <form method="POST" action="{{ route('trajets.store') }}">
    @csrf

    <div class="mb-3">
      <label for="ville_depart" class="form-label">Ville de départ</label>
      <input type="text" name="ville_depart" id="ville_depart" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="ville_arrivee" class="form-label">Ville d’arrivée</label>
      <input type="text" name="ville_arrivee" id="ville_arrivee" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="date_depart" class="form-label">Date de départ</label>
      <input type="date" name="date_depart" id="date_depart" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="heure_depart" class="form-label">Heure de départ</label>
      <input type="time" name="heure_depart" id="heure_depart" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="places_disponibles" class="form-label">Nombre de places disponibles</label>
      <input type="number" name="places_disponibles" id="places_disponibles" class="form-control" min="1" required>
    </div>

    <div class="mb-3">
      <label for="prix" class="form-label">Prix par passager (FCFA)</label>
      <input type="number" name="prix" id="prix" class="form-control" min="0" required>
    </div>

    <button type="submit" class="btn btn-primary">Publier le trajet</button>
  </form>
</div>
@endsection
