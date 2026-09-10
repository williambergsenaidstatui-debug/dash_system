(function () {
  const grid = document.getElementById("foldersGrid");
  const dataElement = document.getElementById("projectsData");
  const modal = document.getElementById("projectModal");
  const closeButton = document.getElementById("closeModal");
  const modalImage = document.getElementById("modalImage");
  const modalVideo = document.getElementById("modalVideo");
  const modalGallery = document.getElementById("modalGallery");
  const modalTitle = document.getElementById("modalTitle");
  const modalCategory = document.getElementById("modalCategory");
  const modalDescription = document.getElementById("modalDescription");
  const modalClient = document.getElementById("modalClient");
  const modalDelivery = document.getElementById("modalDelivery");
  const modalTags = document.getElementById("modalTags");
  const modalLink = document.getElementById("modalLink");
  const emptyState = document.getElementById("projectsEmpty");

  if (!grid || !dataElement || !modal || !closeButton) {
    return;
  }

  let projects = [];
  try {
    projects = JSON.parse(dataElement.textContent || "[]");
  } catch (_error) {
    projects = [];
  }

  function element(tag, className, text) {
    const node = document.createElement(tag);
    if (className) node.className = className;
    if (text !== undefined && text !== null) node.textContent = text;
    return node;
  }

  function buildCards() {
    grid.replaceChildren();

    if (!projects.length) {
      emptyState.hidden = false;
      grid.appendChild(emptyState);
      return;
    }

    projects.forEach((project) => {
      const button = element("button", "folder-wrapper project-thumbnail-card");
      button.type = "button";
      button.setAttribute("aria-label", `Abrir detalhes do projeto ${project.name}`);

      const media = element("span", "project-card-media");
      const previewSrc = Array.isArray(project.images) ? project.images[0] : null;
      if (previewSrc) {
        const preview = element("img", "project-preview");
        preview.src = previewSrc;
        preview.alt = `Prévia do projeto ${project.name}`;
        preview.loading = "lazy";
        media.appendChild(preview);
      } else {
        media.appendChild(element("span", "project-card-placeholder", "Sem imagem"));
      }
      media.appendChild(element("span", "project-card-action", "↗"));

      const content = element("span", "project-card-content");
      content.appendChild(element("span", "project-card-category", project.category));
      content.appendChild(element("span", "folder-label", project.name));
      const tags = element("span", "project-card-tags");
      (project.tags || []).slice(0, 3).forEach((tag) => tags.appendChild(element("span", "", tag)));
      content.appendChild(tags);

      button.append(media, content);
      button.addEventListener("click", () => openModal(project));
      grid.appendChild(button);
    });
  }

  function selectThumbnail(selected) {
    modalGallery.querySelectorAll(".modal-thumbnail").forEach((thumbnail) => {
      thumbnail.classList.toggle("active", thumbnail === selected);
    });
  }

  function showImage(src, selected) {
    modalVideo.pause();
    modalVideo.hidden = true;
    modalImage.hidden = false;
    modalImage.src = src;
    selectThumbnail(selected);
  }

  function showVideo(src, selected) {
    modalImage.hidden = true;
    modalVideo.hidden = false;
    modalVideo.src = src;
    modalVideo.load();
    modalVideo.play().catch(() => {});
    selectThumbnail(selected);
  }

  function buildGallery(project) {
    const images = Array.isArray(project.images) ? project.images : [];
    modalGallery.replaceChildren();

    images.forEach((src, index) => {
      const thumbnail = element("button", `modal-thumbnail${index === 0 ? " active" : ""}`);
      thumbnail.type = "button";
      thumbnail.setAttribute("aria-label", `Ver imagem ${index + 1} do projeto ${project.name}`);
      const image = element("img");
      image.src = src;
      image.alt = "";
      thumbnail.appendChild(image);
      thumbnail.addEventListener("click", () => showImage(src, thumbnail));
      modalGallery.appendChild(thumbnail);
    });

    if (project.video) {
      const videoButton = element("button", "modal-thumbnail modal-video-thumbnail");
      videoButton.type = "button";
      videoButton.setAttribute("aria-label", `Assistir ao vídeo do projeto ${project.name}`);
      videoButton.append(element("span", "", "▶"), element("small", "", "Vídeo"));
      videoButton.addEventListener("click", () => showVideo(project.video, videoButton));
      modalGallery.appendChild(videoButton);
    }

    modalGallery.hidden = images.length === 0 && !project.video;
  }

  function openModal(project) {
    const images = Array.isArray(project.images) ? project.images : [];
    modalVideo.pause();
    modalVideo.hidden = true;
    modalVideo.removeAttribute("src");

    if (images[0]) {
      modalImage.src = images[0];
      modalImage.alt = `Imagem do projeto ${project.name}`;
      modalImage.hidden = false;
    } else if (project.video) {
      modalImage.removeAttribute("src");
      modalImage.hidden = true;
      modalVideo.src = project.video;
      modalVideo.hidden = false;
      modalVideo.load();
    } else {
      modalImage.removeAttribute("src");
      modalImage.hidden = true;
    }

    modalTitle.textContent = project.name || "";
    modalCategory.textContent = project.category || "";
    modalDescription.textContent = project.description || "";
    modalClient.textContent = project.client || "Não informado";
    modalDelivery.textContent = project.delivery || "Não informado";
    modalTags.replaceChildren();
    (project.tags || []).forEach((tag) => modalTags.appendChild(element("span", "tag", tag)));

    if (project.link) {
      modalLink.href = project.link;
      modalLink.textContent = "Visitar projeto";
      modalLink.hidden = false;
    } else {
      modalLink.removeAttribute("href");
      modalLink.hidden = true;
    }

    buildGallery(project);
    modal.classList.add("active");
    modal.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
    closeButton.focus();
  }

  function closeModal() {
    modalVideo.pause();
    modal.classList.remove("active");
    modal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  }

  closeButton.addEventListener("click", closeModal);
  modal.addEventListener("click", (event) => {
    if (event.target === modal) closeModal();
  });
  window.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && modal.classList.contains("active")) closeModal();
  });

  buildCards();
})();
