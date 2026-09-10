@props(['projects'])

<section class="project-folders">
    <header class="project-folders__header">
      <div>
        <p class="project-folders__eyebrow" style="margin-top: 15px;">Projetos em destaque</p>
        <h1>Projetos: <span class="orange-dot"></span></h1>
        <p></p>
      </div>
    </header>

    <section class="folders-container" id="foldersGrid" aria-label="Galeria de projetos">
      <p class="projects-empty" id="projectsEmpty" hidden>Nenhum projeto publicado no momento.</p>
    </section>
</section>

<script id="projectsData" type="application/json">{!! json_encode($projects->map(fn ($project) => [
  'name' => $project->name,
  'category' => $project->category,
  'client' => $project->client,
  'delivery' => $project->delivery,
  'description' => $project->description,
  'images' => $project->images ?? [],
  'video' => $project->video_path,
  'tags' => $project->technologies ?? [],
  'link' => $project->link,
]), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>

  <div class="modal-overlay" id="projectModal" aria-hidden="true">
    <article class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
      <div class="modal-media">
        <img id="modalImage" alt="">
        <video id="modalVideo" controls playsinline preload="metadata" hidden aria-label="Vídeo de demonstração do projeto"></video>
        <button class="close-modal" type="button" id="closeModal" aria-label="Fechar modal">&times;</button>
      </div>

      <div class="modal-gallery" id="modalGallery" aria-label="Galeria de imagens do projeto"></div>

      <div class="modal-body">
        <div>
          <p class="project-folders__eyebrow" id="modalCategory"></p>
          <h2 class="modal-title" id="modalTitle"></h2>
          <p class="modal-description" id="modalDescription"></p>
          <a class="modal-link" id="modalLink" target="_blank" rel="noopener noreferrer"></a>
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
