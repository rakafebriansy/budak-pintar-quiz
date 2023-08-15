// js/views/kuisView.js
class KuisView {
    constructor() {
        // Element-elemen yang diperlukan dalam tampilan kuis
        this.waktuKuisElement = document.getElementById("waktuKuis");
        this.skorElement = document.getElementById("skor");
        this.loadingSpinner = document.getElementById("loadingSpinner"); // Element untuk border spinner
    }

    // Fungsi untuk menampilkan waktu kuis
    tampilkanWaktuKuis(menit, detik) {
        this.waktuKuisElement.textContent = `${menit.toString().padStart(2, '0')}:${detik.toString().padStart(2, '0')}`;
    }

    // Fungsi untuk menampilkan skor
    tampilkanSkor(skor) {
        this.skorElement.textContent = skor;
    }

    // Fungsi untuk menyembunyikan loading spinner
    sembunyikanLoading() {
        this.loadingSpinner.style.display = "none";
    }
}
