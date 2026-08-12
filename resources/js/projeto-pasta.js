(function() {
  const projects = [
    {
      name: "Explorador de Quadrinhos Marvel",
      category: "Aplicação web com API",
      client: "Projeto experimental",
      delivery: "Aplicação que consulta e apresenta quadrinhos, personagens e conteúdos do universo Marvel.",
      description: "App desenvolvido com integração à API da Marvel para explorar quadrinhos e informações do catálogo em uma interface visual e intuitiva.",
      images: ["/Capturar1.PNG", "/Capturar2.PNG", "/Capturar3.PNG"],
      tags: ["Marvel API", "Integração", "Web App"],
      link: "#"
    },
    {
      name: "Plataforma de Música",
      category: "Integração com API musical",
      client: "Projeto experimental",
      delivery: "Site de testes conectado a uma API musical real para consultar e apresentar conteúdos de música.",
      description: "Experimento de integração com uma API de música real, reunindo dados musicais em uma experiência moderna e interativa.",
      images: ["/Capturar4.PNG", "/Capturar5.PNG"],
      tags: ["API Musical", "Integração", "UX"],
      link: "#"
    },
    {
      name: "Dashboard de Gestão",
      category: "Sistema de gestão",
      client: "Operação de serviços",
      delivery: "Dashboard centralizado para visualizar informações, acompanhar indicadores e apoiar a gestão da operação.",
      description: "Painel administrativo criado para organizar dados e oferecer uma visão clara das informações mais importantes do negócio.",
      images: ["/image.png"],
      tags: ["Dashboard", "Gestão", "Interface"],
      link: "#"
    },
    {
      name: "Petly — Marketplace Pet",
      category: "Em desenvolvimento • Marketplace",
      client: "Plataforma para pet shops",
      delivery: "Aplicação multiplataforma para conectar clientes a pet shops, produtos e serviços em um só lugar.",
      description: "Marketplace desenvolvido com React Native para mobile e web. A plataforma permitirá que diferentes pet shops se cadastrem, divulguem seus serviços e recebam agendamentos de clientes.",
      images: [
        "/pets/WhatsApp Image 2026-08-01 at 16.24.12.jpeg",
        "/pets/WhatsApp Image 2026-08-01 at 16.24.12 (1).jpeg",
        "/pets/WhatsApp Image 2026-08-01 at 16.24.13.jpeg",
        "/pets/WhatsApp Image 2026-08-01 at 16.24.14.jpeg"
      ],
      video: "/pets/Gravação de Tela 2026-08-12 083432.mp4",
      tags: ["React Native", "Mobile/Web", "Marketplace"],
      link: "#"
    },
    {
      name: "Restaurante Online",
      category: "Site gastronômico",
      client: "Restaurante",
      delivery: "Site de restaurante com cardápio, reservas e identidade visual atraente.",
      description: "Projeto de restaurante para apresentar menu, promoções e reservar mesas com experiência visual convidativa.",
      images: ["/restaurante1.PNG", "/restaurante2.PNG", "/restaurante3.PNG"],
      tags: ["Restaurante", "Cardápio", "UX"],
      link: "#"
    },
    {
      name: "Jornal Hip Hop",
      category: "Portal editorial",
      client: "Mídia musical",
      delivery: "Site de jornal com conteúdo cultural, notícias e seções para artistas.",
      description: "Portal hip hop com matérias, lançamentos e cobertura de cultura urbana com visual moderno.",
      images: ["/jornal_hiphop.PNG", "/jornal_hiphop2.PNG", "/jornal_hiphop3.PNG"],
      tags: ["Jornal", "Música", "Cultura"],
      link: "#"
    },

    {
      name: "Pizzaria",
      category: "Site gastronômico",
      client: "Pizzaria",
      delivery: "Site de pizzaria com cardápio, calendário de ofertas e identidade visual atraente.",
      description: "Projeto de pizzaria para apresentar menu, promoções e reservar mesas com experiência visual convidativa.",
      images: ["/pizzaria1.jpeg", "/pizzaria2.jpeg", "/pizzaria3.jpeg", "/pizzaria4.jpeg"],
      tags: ["Pizzaria", "Cardápio", "UX"],
      link: "#"
    }
  ];

  const grid = document.getElementById("foldersGrid");
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

  if (!grid || !modal || !closeButton) {
    return;
  }

  function buildCards() {
    grid.innerHTML = "";

    projects.forEach((project, index) => {
      const button = document.createElement("button");
      button.className = "folder-wrapper project-thumbnail-card";
      button.type = "button";
      button.dataset.index = index;
      button.setAttribute("aria-label", "Abrir detalhes do projeto " + project.name);

      const previewSrc = Array.isArray(project.images) && project.images.length ? project.images[0] : project.image;
      const preview = project.video
        ? '<video class="project-preview project-preview-video" src="' + project.video + '" poster="' + previewSrc + '" aria-label="Pr&eacute;via em vídeo do projeto ' + project.name + '" autoplay muted loop playsinline preload="metadata"></video>'
        : previewSrc
          ? '<img class="project-preview" src="' + previewSrc + '" alt="Pr&eacute;via do projeto ' + project.name + '" loading="lazy">'
          : "";

      button.innerHTML = [
        '<span class="project-card-media">',
          preview,
          '<span class="project-card-action" aria-hidden="true">&nearr;</span>',
        '</span>',
        '<span class="project-card-content">',
          '<span class="project-card-category">' + project.category + '</span>',
          '<span class="folder-label">' + project.name + '</span>',
          '<span class="project-card-tags">' + project.tags.slice(0, 3).map((tag) => '<span>' + tag + '</span>').join("") + '</span>',
        '</span>'
      ].join("");

      button.addEventListener("click", () => openModal(project));
      grid.appendChild(button);
    });
  }

  function openModal(project) {
    const images = Array.isArray(project.images) && project.images.length ? project.images : project.image ? [project.image] : [];
    const mainImage = images.length ? images[0] : "";

    modalImage.src = mainImage;
    modalImage.alt = "Imagem do projeto " + project.name;
    modalImage.hidden = false;
    if (modalVideo) {
      modalVideo.pause();
      modalVideo.hidden = true;
      modalVideo.removeAttribute("src");
    }
    modalTitle.innerHTML = project.name;
    modalCategory.innerHTML = project.category;
    modalDescription.innerHTML = project.description;
    modalClient.innerHTML = project.client;
    modalDelivery.innerHTML = project.delivery;
    modalLink.href = project.link || "#";
    modalTags.innerHTML = project.tags.map((tag) => '<span class="tag">' + tag + '</span>').join("");

    if (modalGallery) {
      modalGallery.innerHTML = "";
      images.forEach((src, index) => {
        const thumbButton = document.createElement("button");
        thumbButton.type = "button";
        thumbButton.className = "modal-thumbnail" + (index === 0 ? " active" : "");
        thumbButton.setAttribute("aria-label", "Ver imagem " + (index + 1) + " do projeto " + project.name);
        thumbButton.innerHTML = '<img src="' + src + '" alt="Miniatura do projeto ' + project.name + '">';
        thumbButton.addEventListener("click", () => setModalImage(src, thumbButton));
        modalGallery.appendChild(thumbButton);
      });

      if (project.video && modalVideo) {
        const videoButton = document.createElement("button");
        videoButton.type = "button";
        videoButton.className = "modal-thumbnail modal-video-thumbnail";
        videoButton.setAttribute("aria-label", "Assistir ao vídeo do projeto " + project.name);
        videoButton.innerHTML = '<span aria-hidden="true">▶</span><small>Vídeo</small>';
        videoButton.addEventListener("click", () => setModalVideo(project.video, videoButton));
        modalGallery.appendChild(videoButton);
      }
    }

    modal.classList.add("active");
    modal.setAttribute("aria-hidden", "false");
    closeButton.focus();
    document.body.style.overflow = "hidden";
  }

  function setModalImage(src, selectedThumb) {
    if (modalVideo) {
      modalVideo.pause();
      modalVideo.hidden = true;
    }
    modalImage.hidden = false;
    modalImage.src = src;
    if (!modalGallery) {
      return;
    }
    modalGallery.querySelectorAll(".modal-thumbnail").forEach((button) => {
      button.classList.toggle("active", button === selectedThumb);
    });
  }

  function setModalVideo(src, selectedThumb) {
    if (!modalVideo) {
      return;
    }
    modalImage.hidden = true;
    modalVideo.hidden = false;
    modalVideo.src = src;
    modalVideo.load();
    modalVideo.play().catch(() => {});
    modalGallery.querySelectorAll(".modal-thumbnail").forEach((button) => {
      button.classList.toggle("active", button === selectedThumb);
    });
  }

  function closeModal() {
    if (modalVideo) {
      modalVideo.pause();
    }
    modal.classList.remove("active");
    modal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  }

  closeButton.addEventListener("click", closeModal);

  modal.addEventListener("click", (event) => {
    if (event.target === modal) {
      closeModal();
    }
  });

  window.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && modal.classList.contains("active")) {
      closeModal();
    }
  });

  window.addEventListener("DOMContentLoaded", buildCards);
})();
