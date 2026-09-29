const copyButton = document.querySelector('[data-copy-pix]');
const pixPayload = document.querySelector('[data-pix-payload]');

copyButton?.addEventListener('click', async () => {
    await navigator.clipboard.writeText(pixPayload.value);
    copyButton.textContent = 'Codigo copiado';
});

const statusLabel = document.querySelector('[data-order-status]');
const statusTitle = document.querySelector('[data-order-status-title]');

if (statusLabel && window.statusUrl) {
    const interval = setInterval(async () => {
        const response = await fetch(window.statusUrl, {
            headers: { Accept: 'application/json' },
        });

        if (! response.ok) {
            return;
        }

        const order = await response.json();
        statusLabel.textContent = order.status;

        if (order.status === 'paid') {
            statusTitle.textContent = 'Pagamento confirmado';
            clearInterval(interval);
        }
    }, 5000);
}
