const form = document.getElementById("contactForm");
const submitBtn = document.getElementById("submitBtn");
const btnText = document.getElementById("btnText");
const formNote = document.getElementById("formNote");

if (form && submitBtn && btnText && formNote) {
  form.addEventListener("submit", (event) => {
    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const subject = form.subject.value;
    const message = form.message.value.trim();

    formNote.textContent = "";
    formNote.className = "form-note";

    if (!name || !email || !subject || !message) {
      event.preventDefault();
      formNote.textContent = "Por favor, preencha todos os campos.";
      formNote.className = "form-note form-note--error";
      return;
    }

    const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

    if (!emailOk) {
      event.preventDefault();
      formNote.textContent = "Informe um e-mail valido.";
      formNote.className = "form-note form-note--error";
      return;
    }

    submitBtn.disabled = true;
    btnText.textContent = "Enviando...";
  });
}