(function() {
  const projects = [
    {
      name: "Marvel API",
      category: "API e Integração",
      client: "Universo Marvel",
      delivery: "API REST para heróis, quadrinhos e personagens com documentação e endpoints completos.",
      description: "Serviço de dados para consultar personagens, séries e eventos do universo Marvel, ideal para apps, games e dashboards.",
      images: ["/Capturar1.PNG", "/Capturar2.PNG", "/Capturar3.PNG"],
      tags: ["API", "Laravel", "REST"],
      link: "#"
    },
    {
      name: "Site de Música",
      category: "Experiência musical",
      client: "Artistas e bandas",
      delivery: "Site moderno com playlists, lançamentos e conteúdo interativo.",
      description: "Projeto musical com player, home de lançamento, biografia e seções para engajar ouvintes.",
      images: ["/Capturar4.PNG", "/Capturar5.PNG"],
      tags: ["Música", "Player", "UX"],
      link: "#"
    },
    {
      name: "Landing institucional",
      category: "Site corporativo",
      client: "Cliente institucional",
      delivery: "Página institucional com foco em apresentação de serviços e identidade visual.",
      description: "Site corporativo desenvolvido para comunicar a marca, serviços e gerar novos contatos.",
      images: ["/wlcars.png"],
      tags: ["Web", "Design", "Responsivo"],
      link: "#"
    },
    {
      name: "Design de Interface",
      category: "UI/UX Design",
      client: "Cliente de design",
      delivery: "Interface de usuário com foco em experiência, usabilidade e estética visual.",
      description: "Projeto de design de interface para aplicativo ou sistema, priorizando navegação intuitiva e visual atraente.",
      images: ["/logodash.png", "/ftnova.png", "/fotofinal.png"],
      tags: ["Dashboard", "Gestão", "Interface"],
      link: "#"
    },
    {
      name: "Portal de Serviços",
      category: "Comunicação digital",
      client: "Serviços online",
      delivery: "Website com conteúdo institucional, serviços e contato otimizado.",
      description: "Portal desenvolvido para apresentar serviços, gerar confiança e facilitar a conversão de clientes.",
      images: ["/image.png"],
      tags: ["Site", "Conteúdo", "Performance"],
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
      button.className = "folder-wrapper";
      button.type = "button";
      button.dataset.index = index;
      button.setAttribute("aria-label", "Abrir informa&ccedil;&otilde;es do projeto " + project.name);

      const previewSrc = Array.isArray(project.images) && project.images.length ? project.images[0] : project.image;
      const preview = previewSrc
        ? '<img class="project-preview" src="' + previewSrc + '" alt="Pr&eacute;via do projeto ' + project.name + '">'
        : "";

      button.innerHTML = [
        '<div class="pasta">',
          '<div class="folder-back"></div>',
          preview,
          '<div class="folder-front">',
            '<div class="aba"></div>',
            '<div class="detalhe"></div>',
          '</div>',
        '</div>',
        '<span class="folder-label">' + project.name + '</span>'
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
    }

    modal.classList.add("active");
    modal.setAttribute("aria-hidden", "false");
    closeButton.focus();
    document.body.style.overflow = "hidden";
  }

  function setModalImage(src, selectedThumb) {
    modalImage.src = src;
    if (!modalGallery) {
      return;
    }
    modalGallery.querySelectorAll(".modal-thumbnail").forEach((button) => {
      button.classList.toggle("active", button === selectedThumb);
    });
  }

  function closeModal() {
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
