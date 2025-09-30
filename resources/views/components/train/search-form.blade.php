<form method="GET" action="{{ route('trajets.recherche') }}">
  <div class="row g-3 align-items-end">

    {{-- 🏙️ Ville de départ --}}
    <div class="col-md-3">
      <label for="depart" class="form-label text-black-custom">Départ</label>
      <input type="text" name="depart" id="depart" class="form-control text-black-custom" placeholder="Ex : Cotonou" required>
    </div>

    {{-- 🏁 Ville d’arrivée --}}
    <div class="col-md-3">
      <label for="arrivee" class="form-label text-black-custom">Arrivée</label>
      <input type="text" name="arrivee" id="arrivee" class="form-control text-black-custom" placeholder="Ex : Parakou" required>
    </div>

    {{-- 📅 Date --}}
    <div class="col-md-3">
      <label for="date" class="form-label text-black-custom">Date</label>
      <input type="date" name="date" id="date" class="form-control text-black-custom" required>
    </div>

    {{-- 👥 Passagers --}}
    <div class="col-md-2">
      <label for="places" class="form-label text-black-custom">Places</label>
      <input type="number" name="places" id="places" class="form-control text-black-custom" min="1" value="1">
    </div>

    {{-- 🔍 Bouton --}}
    <div class="col-md-1">
      <button type="submit" class="btn btn-success w-100">
        <i class="fa fa-search"></i>
      </button>
    </div>

  </div>
</form>
