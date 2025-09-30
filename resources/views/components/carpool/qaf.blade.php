<section id="section-faq">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h2>FAQ Covoiturage</h2>
        <div class="spacer-20"></div>
      </div>
    </div>

    <div class="row g-custom-x">
      <!-- Colonne 1 -->
      <div class="col-md-6 wow fadeInUp">
        <div class="accordion secondary">
          <div class="accordion-section">
            <div class="accordion-section-title" data-tab="#accordion-1">
                Comment réserver un covoiturage ?
            </div>
            <div class="accordion-section-content" id="accordion-1">
              <p>Vous pouvez réserver un trajet de covoiturage sur notre application, ou sur Auto-Stop.bj.fr. Il vous suffit de rechercher votre destination, de choisir la date à laquelle vous souhaitez voyager et de sélectionner le covoiturage qui vous convient le mieux ! Certains trajets peuvent être réservés instantanément, tandis que d'autres nécessitent l’acceptation manuelle du conducteur. Dans les deux cas, la réservation d'un covoiturage est rapide, simple et facile.</p>
            </div>

            <div class="accordion-section-title" data-tab="#accordion-2">
                    Comment annuler mon trajet de covoiturage ?
            </div>
            <div class="accordion-section-content" id="accordion-2">
              <p>Si vos projets changent, vous pouvez toujours annuler votre covoiturage sur l’application, dans la rubrique "Vos trajets". Le plus tôt vous annulez, le mieux c'est. Ainsi, votre conducteur a le temps de trouver de nouveaux passagers. Le montant de votre remboursement dépendra du moment de l’annulation. Si vous annulez plus de 24 heures avant le départ, par exemple, nous vous remboursons le montant intégral de votre réservation, exceptés les frais de service.</p>
            </div>

            <div class="accordion-section-title" data-tab="#accordion-3">
                Combien coûte un trajet en covoiturage ?
            </div>
            <div class="accordion-section-content" id="accordion-3">
              <p>Le coût d'un trajet en covoiturage est très variable et dépend de facteurs tels que la distance, l'heure de départ, la demande pour ce trajet, et autres. De plus, chaque conducteur décide lui-même du prix de chaque siège. Il est donc difficile de chiffrer avec précision le coût d'un trajet. Vous pouvez consulter nos principales destinations afin d’avoir une idée des prix, ou commencer à chercher votre prochain trajet de covoiturage sur Auto-Stop.bj.fr.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Colonne 2 -->
      <div class="col-md-6 wow fadeInUp">
        <div class="accordion secondary">
          <div class="accordion-section">
            <div class="accordion-section-title" data-tab="#accordion-b-4">
                Comment proposer un trajet de covoiturage ?
            </div>
            <div class="accordion-section-content" id="accordion-b-4">
              <p>Proposer un covoiturage sur Auto-Stop.bj, c'est très simple. Pour publier votre trajet, utilisez notre application mobile ou Auto-Stop.bj.fr. Indiquez vos points de départ et d'arrivée, la date et l'heure de votre départ, le nombre de places disponibles et le prix par siège. Vous devrez également indiquer si vous acceptez les réservations automatiquement ou manuellement, et aurez la possibilité d'ajouter tout détail ou commentaire important au sujet de votre trajet. Cliquez ensuite sur "Publier le trajet" – et c'est terminé !

</p>
            </div>

            <div class="accordion-section-title" data-tab="#accordion-b-5">
                Quels sont les avantages du covoiturage ?
            </div>
            <div class="accordion-section-content" id="accordion-b-5">
              <p>Le covoiturage est un moyen de transport généralement plus abordable que les autres, surtout pour les longues distances. Il est également plus écologique, car qui dit partage de véhicule, dit moins de voitures sur la route – et donc, moins d'émissions. Le covoiturage est aussi plus sûr à l’heure actuelle : comme il n'y a que quelques personnes dans la voiture, les points de contact et les risques sont moindres que dans les autres modes de transport.</p>
            </div>

            <div class="accordion-section-title" data-tab="#accordion-b-6">
                Comment commencer à covoiturer ?
            </div>
            <div class="accordion-section-content" id="accordion-b-6">
              <p>Covoiturer avec Auto-Stop.bj, c’est très facile, et c’est gratuit ! Il vous suffit de créer un compte et de renseigner quelques informations à votre sujet. Une fois votre compte Auto-Stop mis en place, vous pouvez commencer à réserver ou à publier des trajets directement sur notre application ou notre site web.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="text-center mt-5">
  <a href="https://support.blablacar.com/s/?language=en_GB" target="_blank" rel="noopener noreferrer">
    <button class="btn rounded-pill px-5 py-3 fw-semibold" style="background-color: #28a745; color: white; border: none;">
        Consultez notre centre d'aide
    </button>
  </a>
</div>
</section>

<!-- ✅ Style pour le texte vert -->
<style>
  .accordion-section-content {
    display: none;
    transition: all 0.3s ease;
  }

  .accordion-section-content.active p {
    color: #28a745; /* vert Bootstrap */
    font-weight: 500;
  }

  .accordion-section-title {
    cursor: pointer;
    padding: 10px 0;
    font-weight: 600;
  }
</style>

<!-- ✅ Script accordéon -->
<script>
  document.querySelectorAll('.accordion-section-title').forEach(title => {
    title.addEventListener('click', () => {
      const target = document.querySelector(title.getAttribute('data-tab'));

      // Fermer tous les autres
      document.querySelectorAll('.accordion-section-content').forEach(content => {
        content.classList.remove('active');
        content.style.display = 'none';
      });

      // Ouvrir celui cliqué
      target.classList.add('active');
      target.style.display = 'block';
    });
  });
</script>
