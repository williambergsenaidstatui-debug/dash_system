const loginForm = document.getElementById('loginForm');

loginForm?.addEventListener('submit', () => {
    const button = loginForm.querySelector('button[type="submit"]');
    if (button) {
        button.disabled = true;
        button.textContent = 'Entrando...';
    }
});

window.addEventListener('pageshow', () => {
    const button = loginForm?.querySelector('button[type="submit"]');
    if (button) {
        button.disabled = false;
        button.textContent = 'Entrar';
    }
});
