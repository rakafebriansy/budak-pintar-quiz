// js/main.js
document.addEventListener('DOMContentLoaded', () => {
    // Inisialisasi model, view, dan controller untuk halaman utama (tidak ada kuis di sini)
    const model = new KuisModel();
    const view = new KuisView();
    const controller = new KuisController(model, view);
});
