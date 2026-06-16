<section class="project-folders">
    <header class="project-folders__header">
      <div>
        <p class="project-folders__eyebrow">Projetos realizados</p>
        <h1>Solu&ccedil;&otilde;es digitais prontas para serem abertas.</h1>
      </div>
      
    </header>

    <section class="folders-container" id="foldersGrid" aria-label="Lista de projetos"></section>
</section>

  <div class="modal-overlay" id="projectModal" aria-hidden="true">
    <article class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
      <div class="modal-media">
        <img id="modalImage" alt="">
        <button class="close-modal" type="button" id="closeModal" aria-label="Fechar modal">&times;</button>
      </div>

      <div class="modal-body">
        <div>
          <p class="project-folders__eyebrow" id="modalCategory"></p>
          <h2 class="modal-title" id="modalTitle"></h2>
          <p class="modal-description" id="modalDescription"></p>
          <a class="modal-link" id="modalLink" href="#" target="_blank" rel="noreferrer">Ver projeto</a>
        </div>

        <aside class="modal-info">
          <div class="info-group">
            <p class="info-title">Cliente</p>
            <p class="info-text" id="modalClient"></p>
          </div>

          <div class="info-group">
            <p class="info-title">Entrega</p>
            <p class="info-text" id="modalDelivery"></p>
          </div>

          <div class="info-group">
            <p class="info-title">Tecnologias</p>
            <div class="tags" id="modalTags"></div>
          </div>
        </aside>
      </div>
    </article>
  </div>
