// js/models/kuisModel.js
class KuisModel {
  constructor() {
      this.skor = 0;
      this.waktuKuis = 600; // 10 menit dalam detik
      this.sisaWaktu = this.waktuKuis;
      this.kesulitan = "easy"; // Default kesulitan adalah "easy"
  }

  // Fungsi untuk mengatur tingkat kesulitan
  setKesulitan(kesulitan) {
      this.kesulitan = kesulitan;
      // Sesuaikan waktu kuis berdasarkan tingkat kesulitan
      if (kesulitan === "easy") {
          this.waktuKuis = 600; // 10 menit
      } else if (kesulitan === "medium") {
          this.waktuKuis = 450; // 7,5 menit
      } else if (kesulitan === "hard") {
          this.waktuKuis = 300; // 5 menit
      }
      this.sisaWaktu = this.waktuKuis;
  }

  // Fungsi untuk mendapatkan tingkat kesulitan
  getKesulitan() {
      return this.kesulitan;
  }

  // Fungsi untuk mendapatkan waktu kuis berdasarkan kesulitan
  getWaktuKuis() {
      return this.waktuKuis;
  }

  // Fungsi untuk mengurangi waktu sisa kuis
  kurangiWaktu() {
      this.sisaWaktu--;
  }

  // Fungsi untuk mendapatkan sisa waktu kuis
  getSisaWaktu() {
      return this.sisaWaktu;
  }
}
