// js/controllers/kuisController.js
class KuisController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        // Ambil elemen yang diperlukan dari tampilan
        this.waktuKuisElement = document.getElementById("waktuKuis");

        // Mulai kuis secara otomatis
        this.handleMulaiKuis();
    }

    // Fungsi untuk memulai kuis
    handleMulaiKuis() {
        // Update tampilan waktu kuis
        this.view.tampilkanWaktuKuis(Math.floor(this.model.getSisaWaktu() / 60), this.model.getSisaWaktu() % 60);

        // Jalankan fungsi yang mengurangi waktu kuis setiap detik
        this.intervalWaktu = setInterval(() => {
            this.model.kurangiWaktu();
            this.view.tampilkanWaktuKuis(Math.floor(this.model.getSisaWaktu() / 60), this.model.getSisaWaktu() % 60);

            // Hentikan kuis jika waktu habis
            if (this.model.getSisaWaktu() <= 0) {
                clearInterval(this.intervalWaktu);
                this.handleKuisSelesai();
            }
        }, 1000);
    }

    // Fungsi yang dipanggil saat kuis selesai
    handleKuisSelesai() {
        // Lakukan aksi yang sesuai setelah kuis selesai
        console.log("Kuis selesai. Waktu habis.");
    }
}
