<section class="py-5" style="background-color: #054652;">
  <div class="container">
    <h2 class="mb-3 text-white">Où allez-vous ?</h2>
    <p class="mb-4 text-light">Choisissez un trajet quotidien et économisez en covoiturant avec Auto-Stop.bj.</p>

    <div class="row g-4" id="trajet-container">
      <!-- Carte 1 -->
      <div class="col-md-6 col-lg-4">
        <a href="/trajet/cotonou-abomey-calavi" class="text-decoration-none">
          <div class="card shadow-sm h-100" style="background-color: #ffffff; color: #054652;">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #054652;"></i>
              <div>
                <h5 class="mb-1">Cotonou → Abomey-Calavi</h5>
                <small style="color: #054652;">Trajet populaire</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Carte 2 -->
      <div class="col-md-6 col-lg-4">
        <a href="/trajet/porto-novo-cotonou" class="text-decoration-none">
          <div class="card shadow-sm h-100" style="background-color: #ffffff; color: #054652;">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #054652;"></i>
              <div>
                <h5 class="mb-1">Porto-Novo → Cotonou</h5>
                <small style="color: #054652;">Trajet fréquent</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Carte 3 -->
      <div class="col-md-6 col-lg-4">
        <a href="/trajet/godomey-cadjehoun" class="text-decoration-none">
          <div class="card shadow-sm h-100" style="background-color: #ffffff; color: #054652;">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #054652;"></i>
              <div>
                <h5 class="mb-1">Godomey → Cadjehoun</h5>
                <small style="color: #054652;">Trajet express</small>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- Bouton dynamique -->
    <div class="text-end mt-4">
      <button id="toggle-btn" class="btn btn-outline-light rounded-pill" onclick="toggleTrajets()">
        Voir tous les trajets
      </button>
    </div>
  </div>
</section>

<script>
  const trajets = [
    { titre: "Akpakpa → Agla", sous: "Trajet rapide", lien: "/trajet/akpakpa-agla" },
    { titre: "Stèle → Cadjehoun", sous: "Trajet direct", lien: "/trajet/stele-cadjehoun" },
    { titre: "Abomey-Calavi → Akassato", sous: "Trajet local", lien: "/trajet/abomey-calavi-akassato" },
    { titre: "Ganhi → Akpakpa", sous: "Trajet urbain", lien: "/trajet/ganhi-akpakpa" },
    { titre: "Védoko → Agla", sous: "Trajet quotidien", lien: "/trajet/vedoko-agla" },
    { titre: "Akassato → Calavi Centre", sous: "Trajet court", lien: "/trajet/akassato-calavi-centre" },
    { titre: "Ganhi → Védoko", sous: "Trajet express", lien: "/trajet/ganhi-vedoko" },
    { titre: "Fidjrossè → Agla", sous: "Trajet résidentiel", lien: "/trajet/fidjrosse-agla" },
    { titre: "Akpakpa → Ganhi", sous: "Trajet bureau", lien: "/trajet/akpakpa-ganhi" }
  ];

  let expanded = false;
  let addedElements = [];

  function toggleTrajets() {
    const container = document.getElementById('trajet-container');
    const btn = document.getElementById('toggle-btn');
    const section = btn.closest('section');

    if (!expanded) {
      trajets.forEach(trajet => {
        const div = document.createElement('div');
        div.className = 'col-md-6 col-lg-4';
        div.innerHTML = `
          <a href="${trajet.lien}" class="text-decoration-none">
            <div class="card shadow-sm h-100" style="background-color: #ffffff; color: #054652;">
              <div class="card-body d-flex align-items-center">
                <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #054652;"></i>
                <div>
                  <h5 class="mb-1">${trajet.titre}</h5>
                  <small style="color: #054652;">${trajet.sous}</small>
                </div>
              </div>
            </div>
          </a>
        `;
        container.appendChild(div);
        addedElements.push(div);
      });
      btn.textContent = 'Afficher moins de trajets';
      expanded = true;
    } else {
      addedElements.forEach(el => el.remove());
      addedElements = [];
      btn.textContent = 'Voir tous les trajets';
      expanded = false;

      const rect = section.getBoundingClientRect();
      if (rect.top < 0 || rect.bottom > window.innerHeight) {
        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  }
</script>
