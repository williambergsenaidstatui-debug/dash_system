const page = document.querySelector(".diagnostico-page");

if (page) {
    const state = { s1: null, s2: [], s3: null, s4: [], horas: 0 };

    const setStep = (n) => {
        document.querySelectorAll(".step").forEach((step) => step.classList.remove("active"));
        document.getElementById(`s${n}`).classList.add("active");

        const pct = Math.round((n / 5) * 100);
        document.getElementById("progress-fill").style.width = `${pct}%`;
        document.getElementById("step-label").textContent = `Passo ${n} de 5`;
        document.getElementById("pct-label").textContent = `${pct}%`;
    };

    const toggleContactButton = () => {
        const nome = document.getElementById("inp-nome").value.trim();
        const empresa = document.getElementById("inp-empresa").value.trim();
        const whatsapp = document.getElementById("inp-whatsapp").value.trim();

        document.getElementById("btn-s5").disabled = !(nome && empresa && whatsapp);
    };

    const addDiagnosis = (text, warn = false) => {
        document.getElementById("diag-list").insertAdjacentHTML("beforeend", `
            <div class="diag-item">
                <div class="diag-dot ${warn ? "warn" : ""}"></div>
                <div class="diag-text">${text}</div>
            </div>
        `);
    };

    const addSolution = (text) => {
        document.getElementById("solucoes-list").insertAdjacentHTML("beforeend", `
            <div class="diag-item">
                <div class="diag-dot"></div>
                <div class="diag-text">${text}</div>
            </div>
        `);
    };

    const showResult = () => {
        document.getElementById("quiz-card").style.display = "none";
        document.querySelector(".progress-wrap").style.display = "none";
        document.getElementById("diag-list").innerHTML = "";
        document.getElementById("solucoes-list").innerHTML = "";

        const nome = document.getElementById("inp-nome").value.trim().split(" ")[0];
        const problemas = state.s2;
        const horas = state.horas;
        const oportunidades = problemas.length + (horas >= 10 ? 2 : horas >= 5 ? 1 : 0);

        document.getElementById("res-nome").textContent = nome;
        document.getElementById("score-oport").textContent = oportunidades;
        document.getElementById("score-horas").textContent = horas >= 10 ? "10+" : `${horas}h`;
        document.getElementById("score-prioridade").textContent = oportunidades >= 4 ? "Urgente" : oportunidades >= 2 ? "Alta" : "Média";

        const diagMap = {
            clientes: "Clientes podem estar sendo perdidos por lentidão no atendimento. Cada minuto sem resposta pode virar uma venda para o concorrente.",
            manual: "Processos manuais estão consumindo tempo da equipe que poderia ser usado em atividades que geram receita.",
            visibilidade: "Baixa presença digital limita o alcance do seu negócio para novos clientes.",
            controle: "Falta de visibilidade dos dados dificulta decisões e a identificação de problemas.",
            integracao: "Sistemas isolados geram retrabalho e aumentam o risco de erro nas informações.",
        };

        const solutionMap = {
            clientes: "Bot de atendimento no WhatsApp para responder clientes automaticamente.",
            manual: "Automações para documentos, notificações, relatórios e tarefas repetitivas.",
            visibilidade: "Site profissional com foco em presença digital e captação de clientes.",
            controle: "Dashboard centralizado para acompanhar clientes, pedidos e indicadores.",
            integracao: "Integração entre sistemas para eliminar retrabalho e centralizar informações.",
        };

        problemas.forEach((problema) => {
            if (diagMap[problema]) addDiagnosis(diagMap[problema], true);
            if (solutionMap[problema]) addSolution(solutionMap[problema]);
        });

        if (horas >= 5) {
            addDiagnosis(`Estimamos que você perde <strong>${horas}+ horas/semana</strong> em tarefas que podem ser automatizadas.`, true);
        }

        const segmentMap = {
            comercio: "Comércio",
            servicos: "Serviços",
            saude: "Saúde",
            educacao: "Educação",
            industria: "Indústria",
            outro: "Negócio",
        };

        const tagMap = {
            clientes: "Atendimento",
            manual: "Automação",
            visibilidade: "Presença digital",
            controle: "Gestão",
            integracao: "Integrações",
        };

        const tagList = document.getElementById("tags-list");
        tagList.innerHTML = `<span class="tag green">${segmentMap[state.s1] || "Negócio"}</span>`;

        problemas.forEach((problema) => {
            if (tagMap[problema]) tagList.insertAdjacentHTML("beforeend", `<span class="tag">${tagMap[problema]}</span>`);
        });

        document.getElementById("result").style.display = "block";
        window.scrollTo({ top: 0, behavior: "smooth" });
    };

    page.addEventListener("click", (event) => {
        const option = event.target.closest(".opt");
        const stepButton = event.target.closest("[data-next]");

        if (option && option.dataset.step) {
            option.closest(".options").querySelectorAll(".opt").forEach((opt) => opt.classList.remove("selected"));
            option.classList.add("selected");
            state[option.dataset.step] = option.dataset.val;

            if (option.dataset.step === "s3") state.horas = parseInt(option.dataset.val, 10);

            document.getElementById(`btn-${option.dataset.step}`).disabled = false;
        }

        if (option && option.dataset.multi) {
            option.classList.toggle("selected");

            const step = option.closest(".step").id;
            const vals = [...option.closest(".options").querySelectorAll(".opt.selected")].map((opt) => opt.dataset.val);
            state[step] = vals;

            document.getElementById(`btn-${step}`).disabled = vals.length === 0;
        }

        if (stepButton) setStep(Number(stepButton.dataset.next));

        if (event.target.closest("#btn-s5")) showResult();
    });

    page.querySelectorAll(".contact-field").forEach((input) => {
        input.addEventListener("input", toggleContactButton);
    });
}
