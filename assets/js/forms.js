document.getElementById('contactForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    const btn = this.querySelector('.submit-btn');
    btn.classList.add('loading');

    const formData = new FormData(this);
    fetch('enviar_formulario.php', {
        method: 'POST',
        body: formData
    })
    .then(() => {
        showNotification('Formulario enviado con éxito', 'success');
        this.reset();
    })
    .catch(() => showNotification('Error al enviar', 'error'))
    .finally(() => btn.classList.remove('loading'));
});