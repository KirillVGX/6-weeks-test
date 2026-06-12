document.addEventListener('DOMContentLoaded', () => {
    const form      = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const btnText   = document.getElementById('btn-text');
    const btnSpinner = document.getElementById('btn-spinner');
    const btnIcon   = document.getElementById('btn-icon');

    if (!form || !submitBtn) return;

    form.addEventListener('submit', () => {
        submitBtn.disabled = true;
        btnText.textContent = 'Надсилання...';
        btnSpinner.classList.remove('hidden');
        btnIcon.classList.add('hidden');
    });

    // Scroll success/error alerts into view
    const alert = document.querySelector('[role="alert"]');
    if (alert) {
        alert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
});
