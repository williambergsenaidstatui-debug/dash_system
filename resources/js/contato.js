const form = document.getElementById("contactForm");
const submitBtn = document.getElementById("submitBtn");
const btnText = document.getElementById("btnText");
const formNote = document.getElementById("formNote");

if (form && submitBtn && btnText && formNote) {
  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const subject = form.subject.value;
    const message = form.message.value.trim();

    formNote.textContent = "";
    formNote.className = "form-note";

    if (!name || !email || !subject || !message) {
      formNote.textContent = "Por favor, preencha todos os campos.";
      formNote.className = "form-note form-note--error";
      return;
    }

    const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    if (!emailOk) {
      formNote.textContent = "Informe um e-mail valido.";
      formNote.className = "form-note form-note--error";
      return;
    }

    submitBtn.disabled = true;
    btnText.textContent = "Enviando...";

    await new Promise((resolve) => setTimeout(resolve, 900));

    const text = encodeURIComponent(
      `Ola! Meu nome e ${name}.\nE-mail: ${email}\nAssunto: ${subject}\nMensagem: ${message}`
    );

    submitBtn.disabled = false;
    btnText.textContent = "Enviar mensagem";
    formNote.textContent = "Mensagem pronta. Abrindo WhatsApp para envio.";
    formNote.className = "form-note form-note--success";
    form.reset();

    window.open(`https://wa.me/5511994083005?text=${text}`, "_blank", "noopener,noreferrer");
  });
}
