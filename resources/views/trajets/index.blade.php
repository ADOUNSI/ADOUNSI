<h2>Liste des trajets disponibles</h2>

@foreach ($trajets as $trajet)
  <x-trajet-card
    depart="{{ $trajet->ville_depart }}"
    arrivee="{{ $trajet->ville_arrivee }}"
    date="{{ $trajet->date_depart }}"
    conducteur="{{ $trajet->conducteur->nom }}"
    prix="{{ $trajet->prix }}"
  />
@endforeach
