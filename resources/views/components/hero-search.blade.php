<!-- Autocomplétion : liste de villes -->
<datalist id="city-list">
  <option value="Cotonou">
  <option value="Porto-Novo">
  <option value="Parakou">
  <option value="Abomey">
  <option value="Natitingou">
  <option value="Djougou">
  <option value="Bohicon">
  <option value="Ouidah">
  <option value="Godomey">
</datalist>

<section id="section-hero" class="hero-search jarallax text-light position-relative" style="margin-bottom: 0 !important; padding-bottom: 0 !important;">
  {{-- 🖼️ Image de fond --}}
  <img src="{{ asset('images/background/1.jpg') }}" class="jarallax-img" alt="Image de fond Auto-Stop">

  <div class="container">
    <div class="row align-items-center text-center">
      <div class="col-lg-12">
        <div class="spacer-double"></div>
        <h1 class="mb-3 wow fadeInDown">
            Voyagez <span class="id-color">partout au Bénin</span> à petit prix
        </h1>
        <p class="lead wow fadeInUp">Covoiturage simple, rapide et sécurisé</p>
        <div class="spacer-single"></div>
      </div>
    </div>
  </div>

  {{-- 🔍 Capsule superposée en bas du hero --}}
  <div class="container mt-n5 position-relative" style="z-index: 10;">
    <div class="d-flex justify-content-center">
      <div class="bg-success shadow-lg px-4 py-2 w-100" style="max-width: 1140px; border-radius: 999px;">
        <form class="d-flex w-100 align-items-center justify-content-between text-white">

          <!-- Départ -->
          <div class="flex-grow-1 position-relative pe-3">
            <i class="fa fa-map-marker-alt position-absolute text-white" style="top: 12px; left: 15px;"></i>
            <input type="text" id="departure" name="departure" list="city-list"
                   class="form-control bg-transparent border-0 text-white ps-4"
                   placeholder="Départ (ex : Cotonou)"
                   style="border-radius: 999px; height: 50px;"
                   oninput="handleAutoFocus(event, 'destination')">
          </div>

          <!-- Séparateur -->
          <div style="width: 1px; height: 40px; background-color: rgba(255,255,255,0.3);"></div>

          <!-- Destination -->
          <div class="flex-grow-1 position-relative px-3">
            <input type="text" id="destination" name="destination" list="city-list"
                   class="form-control bg-transparent border-0 text-white ps-4"
                   placeholder="Destination (ex : Parakou)"
                   style="border-radius: 999px; height: 50px;"
                   oninput="handleAutoFocus(event, 'date')">
          </div>

          <!-- Séparateur -->
          <div style="width: 1px; height: 40px; background-color: rgba(255,255,255,0.3);"></div>

          <!-- Date -->
          <div class="flex-grow-1 position-relative px-3">
            <i class="fa fa-calendar-alt position-absolute text-white" style="top: 12px; left: 15px;"></i>
            <input type="date" id="date" name="date"
                   class="form-control bg-transparent border-0 text-white ps-4"
                   value="{{ date('Y-m-d') }}"
                   style="border-radius: 999px; height: 50px;">
          </div>

          <!-- Séparateur -->
          <div style="width: 1px; height: 40px; background-color: rgba(255,255,255,0.3);"></div>

          <!-- Passagers -->
          <div class="flex-grow-1 position-relative px-3">
            <button type="button" class="form-control bg-transparent border-0 text-white text-start ps-5"
                    style="border-radius: 999px; height: 50px; position: relative;"
                    onclick="document.getElementById('passenger-box').classList.toggle('d-none')">
              <i class="fa fa-user position-absolute text-white" style="top: 12px; left: 15px;"></i>
              <span id="passenger-summary">0 passager</span>
            </button>

            <!-- ✅ Boîte beige attachée au champ Passager -->
            <div id="passenger-box" class="position-absolute shadow rounded p-3 d-none"
                 style="top: 60px; left: 0; min-width: 280px; z-index: 9999; background-color: #f5f5dc;">
              <h6 class="fw-bold mb-3 text-dark">Tranches d’âge</h6>

              <!-- Jeune -->
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-dark">Jeune (0–26 ans)</span>
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="updateCount('jeune', -1)">–</button>
                  <span id="count-jeune" class="px-2 text-dark">0</span>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="updateCount('jeune', 1)">+</button>
                </div>
              </div>

              <!-- Adulte -->
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-dark">Adulte (27–59 ans)</span>
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="updateCount('adulte', -1)">–</button>
                  <span id="count-adulte" class="px-2 text-dark">0</span>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="updateCount('adulte', 1)">+</button>
                </div>
              </div>

              <!-- Senior -->
              <div class="d-flex justify-content-between align-items-center">
                <span class="text-dark">Senior (60+)</span>
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="updateCount('senior', -1)">–</button>
                  <span id="count-senior" class="px-2 text-dark">0</span>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="updateCount('senior', 1)">+</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Bouton Rechercher -->
          <div class="flex-shrink-0 ps-3">
            <button type="button" class="btn btn-light text-success"
                    style="border-radius: 999px; padding: 12px 24px; font-weight: 500; height: 50px;"
                    onclick="document.getElementById('departure').focus()">
              <i class="fa fa-search me-2"></i> Rechercher
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

</section>

<!-- Script compteur + autocomplétion -->
<script>
  const counts = { jeune: 0, adulte: 0, senior: 0 };

  function updateCount(type, delta) {
    counts[type] = Math.max(0, counts[type] + delta);
    document.getElementById(`count-${type}`).textContent = counts[type];
    const total = counts.jeune + counts.adulte + counts.senior;
    document.getElementById('passenger-summary').textContent =
      total === 0 ? '0 passager' : `${total} passager${total > 1 ? 's' : ''}`;
  }

  function handleAutoFocus(event, nextFieldId) {
    const list = document.getElementById('city-list');
    const value = event.target.value;
    const match = Array.from(list.options).some(opt => opt.value.toLowerCase() === value.toLowerCase());
    if (match) document.getElementById(nextFieldId).focus();
  }

  document.addEventListener('DOMContentLoaded', () => {
    updateCount('jeune', 0);
    updateCount('adulte', 0);
    updateCount('senior', 0);
  });
</script>
