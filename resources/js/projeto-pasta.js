(function() {
  const projects = [
    {
      name: "Site Institucional",
      category: "Desenvolvimento web",
      client: "Empresa de servi&ccedil;os",
      delivery: "Presen&ccedil;a digital, p&aacute;ginas responsivas e chamada para WhatsApp.",
      description: "Projeto focado em apresentar a empresa com mais profissionalismo, organizar servi&ccedil;os e facilitar o contato de novos clientes.",
      image: "/wlcars.png",
      tags: ["HTML", "CSS", "Responsivo"],
      link: "#"
    },
    {
      name: "Landing Page",
      category: "Capta&ccedil;&atilde;o",
      client: "Campanha comercial",
      delivery: "P&aacute;gina de oferta, se&ccedil;&otilde;es de prova social e bot&atilde;o de convers&atilde;o.",
      description: "Landing page criada para destacar uma oferta espec&iacute;fica, reduzir distra&ccedil;&otilde;es e direcionar o visitante para uma conversa comercial.",
      image: "/image.png",
      tags: ["UI", "Copy", "Convers&atilde;o"],
      link: "#"
    },
    {
      name: "Sistema de Agendamentos",
      category: "Sistema web",
      client: "Atendimento local",
      delivery: "Cadastro de clientes, agenda e organiza&ccedil;&atilde;o de hor&aacute;rios.",
      description: "Sistema para melhorar a rotina de atendimento, evitando conflitos de hor&aacute;rio e centralizando informa&ccedil;&otilde;es importantes.",
      image: "/computer.jpg",
      tags: ["JavaScript", "Dashboard", "Agenda"],
      link: "#"
    },
    {
      name: "Loja Virtual",
      category: "E-commerce",
      client: "Varejo",
      delivery: "Cat&aacute;logo, vitrine de produtos e fluxo de compra.",
      description: "Experi&ecirc;ncia de loja online com cards de produtos, detalhes claros e estrutura preparada para vendas digitais.",
      image: "/806d19b7-43fd-44db-b249-e2866db2484c.png",
      tags: ["E-commerce", "Produtos", "Mobile"],
      link: "#"
    },
    {
      name: "Dashboard Gerencial",
      category: "Dados e gest&atilde;o",
      client: "Opera&ccedil;&atilde;o interna",
      delivery: "Indicadores, cards de m&eacute;tricas e vis&atilde;o geral de resultados.",
      description: "Painel visual para acompanhar n&uacute;meros importantes da empresa em uma tela organizada, clara e f&aacute;cil de consultar.",
      image: "/dashft.png",
      tags: ["Indicadores", "Gest&atilde;o", "Relat&oacute;rios"],
      link: "#"
    },
    {
      name: "Automacao WhatsApp",
      category: "Atendimento",
      client: "Time comercial",
      delivery: "Fluxo de mensagens, respostas r&aacute;pidas e encaminhamento de leads.",
      description: "Automa&ccedil;&atilde;o planejada para reduzir tempo de resposta, qualificar contatos e deixar o atendimento mais consistente.",
      image: "/ftnova.png",
      tags: ["WhatsApp", "Leads", "Automa&ccedil;&atilde;o"],
      link: "#"
    },
    {
      name: "Portfolio Profissional",
      category: "Marca pessoal",
      client: "Profissional aut&ocirc;nomo",
      delivery: "Apresenta&ccedil;&atilde;o de servi&ccedil;os, trabalhos e contato.",
      description: "Site voltado para refor&ccedil;ar autoridade, organizar trabalhos realizados e facilitar or&ccedil;amentos.",
      image: "/fotofinal.png",
      tags: ["Portfolio", "Identidade", "Contato"],
      link: "#"
    },
    {
      name: "Diagnostico Digital",
      category: "Ferramenta interativa",
      client: "Dash Brasil",
      delivery: "Quiz, pontua&ccedil;&atilde;o e recomenda&ccedil;&otilde;es personalizadas.",
      description: "Experi&ecirc;ncia interativa para entender a maturidade digital de uma empresa e sugerir caminhos de melhoria.",
      image: "/logopronto.png",
      tags: ["Quiz", "JavaScript", "UX"],
      link: "#"
    }
  ];

  const grid = document.getElementById("foldersGrid");
  const modal = document.getElementById("projectModal");
  const closeButton = document.getElementById("closeModal");
  const modalImage = document.getElementById("modalImage");
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

      const preview = project.image
        ? '<img class="project-preview" src="' + project.image + '" alt="Pr&eacute;via do projeto ' + project.name + '">'
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
    modalImage.src = project.image;
    modalImage.alt = "Imagem do projeto " + project.name;
    modalTitle.innerHTML = project.name;
    modalCategory.innerHTML = project.category;
    modalDescription.innerHTML = project.description;
    modalClient.innerHTML = project.client;
    modalDelivery.innerHTML = project.delivery;
    modalLink.href = project.link || "#";
    modalTags.innerHTML = project.tags.map((tag) => '<span class="tag">' + tag + '</span>').join("");

    modal.classList.add("active");
    modal.setAttribute("aria-hidden", "false");
    closeButton.focus();
    document.body.style.overflow = "hidden";
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
