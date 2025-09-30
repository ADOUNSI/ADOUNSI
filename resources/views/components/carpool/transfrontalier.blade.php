<section class="py-5" style="background-color: #054652;">
  <div class="container">
    <h3 class="mb-3 text-white">Nos trajets de covoiturage transfrontaliers les plus populaires</h3>

    <div class="row g-4" id="trajet-container-ce-deao">
      <!-- Carte 1 -->
      <div class="col-md-6 col-lg-4">
        <a href="/trajet/Cotonou-Lomé" class="text-decoration-none">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #054652;"></i>
              <div>
                <h5 class="mb-1">Cotonou → Lomé</h5>
                <small class="text-muted">Trajet frontalier</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Carte 2 -->
      <div class="col-md-6 col-lg-4">
        <a href="/trajet/Porto-Novo-Lagos" class="text-decoration-none">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #054652;"></i>
              <div>
                <h5 class="mb-1">Porto-Novo → Lagos</h5>
                <small class="text-muted">Trajet économique</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Carte 3 -->
      <div class="col-md-6 col-lg-4">
        <a href="/trajet/Parakou-Niamey" class="text-decoration-none">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
              <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #054652;"></i>
              <div>
                <h5 class="mb-1">Parakou → Niamey</h5>
                <small class="text-muted">Trajet longue distance</small>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- Bouton dynamique -->
    <div class="text-end mt-4"  >
      <button id="toggle-btn-ce-deao" class="btn rounded-pill px-4 py-2"
              style="border: 2px solid #31e412ff; color: #1bec09ff; font-weight: 500;"
              onclick="toggleTrajetsCEDEAO()">
        Voir tous les trajets CEDEAO
      </button>
    </div>
  </div>
</section>

<script>
  const trajetsCEDEAO = [
    { titre: "Cotonou → Accra", sous: "Trajet international", lien: "/trajet/Cotonou-Accra" },
    { titre: "Cotonou → Abidjan", sous: "Trajet inter-capitales", lien: "/trajet/Cotonou-Abidjan" },
    { titre: "Porto-Novo → Yamoussoukro", sous: "Trajet diplomatique", lien: "/trajet/Porto-Novo-Yamoussoukro" },
    { titre: "Cotonou → Dakar", sous: "Trajet longue portée", lien: "/trajet/Cotonou-Dakar" },
    { titre: "Parakou → Tambacounda", sous: "Trajet sahélien", lien: "/trajet/Parakou-Tambacounda" },
    { titre: "Bohicon → Kara", sous: "Trajet culturel", lien: "/trajet/Bohicon-Kara" },
    { titre: "Djougou → Malanville", sous: "Trajet stratégique", lien: "/trajet/Djougou-Malanville" }
  ];

  let expandedCEDEAO = false;
  let addedElementsCEDEAO = [];

  function toggleTrajetsCEDEAO() {
    const container = document.getElementById('trajet-container-ce-deao');
    const btn = document.getElementById('toggle-btn-ce-deao');
    const section = btn.closest('section');

    if (!expandedCEDEAO) {
      trajetsCEDEAO.forEach(trajet => {
        const div = document.createElement('div');
        div.className = 'col-md-6 col-lg-4';
        div.innerHTML = `
          <a href="${trajet.lien}" class="text-decoration-none">
            <div class="card shadow-sm h-100">
              <div class="card-body d-flex align-items-center">
                <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #10df33ff;"></i>
                <div>
                  <h5 class="mb-1">${trajet.titre}</h5>
                  <small class="text-muted">${trajet.sous}</small>
                </div>
              </div>
            </div>
          </a>
        `;
        container.appendChild(div);
        addedElementsCEDEAO.push(div);
      });
      btn.textContent = 'Réduire les trajets CEDEAO';
      expandedCEDEAO = true;
    } else {
      addedElementsCEDEAO.forEach(el => el.remove());
      addedElementsCEDEAO = [];
      btn.textContent = 'Voir tous les trajets CEDEAO';
      expandedCEDEAO = false;

      const rect = section.getBoundingClientRect();
      if (rect.top < 0 || rect.bottom > window.innerHeight) {
        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  }
</script>
