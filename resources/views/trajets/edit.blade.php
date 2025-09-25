@extends('layouts.app')

@section('content')
<section id="section-edit-trajet" class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center">Modifier le trajet</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('trajets.update', $trajet->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="depart" class="form-label">Lieu de départ</label>
                        <input type="text" name="depart" id="depart" class="form-control" value="{{ old('depart', $trajet->depart) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" name="destination" id="destination" class="form-control" value="{{ old('destination', $trajet->destination) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_depart" class="form-label">Date et heure de départ</label>
                        <input type="datetime-local" name="date_depart" id="date_depart" class="form-control" value="{{ old('date_depart', $trajet->date_depart->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="places_disponibles" class="form-label">Places disponibles</label>
                        <input type="number" name="places_disponibles" id="places_disponibles" class="form-control" value="{{ old('places_disponibles', $trajet->places_disponibles) }}" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix par place (FCFA)</label>
                        <input type="number" name="prix" id="prix" class="form-control" value="{{ old('prix', $trajet->prix) }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description du trajet</label>
                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $trajet->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Changer l’image du trajet (optionnel)</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($trajet->image)
                            <small>Image actuelle : {{ $trajet->image }}</small>
                        @endif
                    </div>

                    <button type="submit" class="btn-main">Mettre à jour le trajet</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
