// js/pages/kuis.js
document.addEventListener('DOMContentLoaded', () => {
    const model = new KuisModel();
    const view = new KuisView();
    const controller = new KuisController(model, view);

    // Mulai kuis langsung saat halaman dimuat
    controller.handleMulaiKuis();

    // Tampilkan waktu kuis di halaman kuis
    view.tampilkanWaktuKuis(Math.floor(model.getWaktuKuis() / 60), model.getWaktuKuis() % 60);
});
