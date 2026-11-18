// Kategori biaya (urutannya harus sama dengan array BASE di bawah)
const KATEGORI = [
  { nama: "Tempat & Katering Resepsi",       legenda: "Katering & Venue", warna: "#8a6a52", ikon: "🍽️", ket: "Buffet, stall racikan, beverage, & sewa gedung" },
  { nama: "Dekorasi & Tata Panggung",        legenda: "Dekorasi",         warna: "#c9a98e", ikon: "💐", ket: "Pelaminan, floral arch, photobooth, & ambient lighting" },
  { nama: "Wedding Organizer Full Planning", legenda: "WO Service",       warna: "#5a3e2b", ikon: "📋", ket: "8-12 kru lapangan, rundown kursi, & technical meeting" },
  { nama: "Dokumentasi Foto & Sinema",       legenda: "Dokumentasi",      warna: "#b08968", ikon: "📷", ket: "Teaser cinematic, album hard-cover, & drone coverage" },
  { nama: "Tata Rias & Busana (MUA)",        legenda: "Rias & Busana",    warna: "#e3c9b4", ikon: "💄", ket: "Busana akad/resepsi, rias pengantin, & keluarga inti" },
  { nama: "Dana Darurat & Kontingensi",      legenda: "Kontingensi",      warna: "#7a5a44", ikon: "🛟", ket: "Izin keramaian, over-time venue, & tak terduga hari-H" }
];

// Persentase dasar (Ballroom + Kuliner Unggul), diambil dari desain Figma
const BASE = [45, 17, 12, 9.6, 10, 6.4];

// Pergeseran persentase per pilihan. Tiap baris jumlahnya 0 supaya total tetap 100%.
// ASUMSI AWAL, perlu diganti dengan data riset.
const DELTA_VENUE = {
  ballroom: [0, 0, 0, 0, 0, 0],
  pendopo:  [-3, 2, 0, 0, 1, 0],
  garden:   [-4, 2, 0, 0, 0, 2]
};
const DELTA_FOKUS = {
  kuliner: [0, 0, 0, 0, 0, 0],
  seni:    [-4, 4, 0, 0, 0, 0],
  sinema:  [-4, 0, 0, 4, 0, 0]
};

// Batas minimal katering per tamu (asumsi, ganti setelah riset)
const MIN_KATERING_PER_TAMU = 100000;

// Data paket sementara (nanti bisa diambil dari vendors.json)
const PAKET = [
  { label: "Paling Populer",    nama: "Kalyana Wedding Atelier", paket: "Paket Royal Heritage",      harga: 45000000, ket: "Termasuk pajak & izin kepanitiaan" },
  { label: "Best Value",        nama: "Sekar Jagad WO",          paket: "Paket Gayatri Tradisional", harga: 62000000, ket: "Standard Traditional Protocol" },
  { label: "Rekomendasi Hemat", nama: "Lumina Event Artistry",   paket: "Paket Modern Intimate",     harga: 38000000, ket: "Ideal untuk < 350 undangan" }
];

let venue = "ballroom";
let fokus = "kuliner";

const elAnggaran = document.getElementById("anggaran");
const elTamu = document.getElementById("tamu");

function rupiah(angka) {
  return "Rp " + Math.round(angka).toLocaleString("id-ID");
}

// Ambil angka murni dari kotak anggaran ("120.000.000" -> 120000000)
function bacaAnggaran() {
  return Number(elAnggaran.value.replace(/\D/g, "")) || 0;
}

function tandaiChip() {
  const sekarang = bacaAnggaran();
  document.querySelectorAll("#chips .pill").forEach(function (c) {
    c.classList.toggle("aktif", Number(c.dataset.nilai) === sekarang);
  });
}

function render() {
  const anggaran = bacaAnggaran();
  const tamu = Number(elTamu.value);
  document.getElementById("tamu-teks").textContent = tamu.toLocaleString("id-ID") + " Tamu";

  if (anggaran <= 0) {
    document.getElementById("total-teks").textContent = "Rp 0";
    document.getElementById("hasil").innerHTML =
      '<p class="peringatan">Isi plafon anggaran dengan angka yang valid.</p>';
    return;
  }

  // Hitung persentase akhir per kategori
  const persen = BASE.map(function (p, i) {
    return Math.round((p + DELTA_VENUE[venue][i] + DELTA_FOKUS[fokus][i]) * 10) / 10;
  });

  document.getElementById("total-teks").textContent = rupiah(anggaran);

  // Bar gabungan dan legenda
  document.getElementById("bar-gabung").innerHTML = KATEGORI.map(function (k, i) {
    return `<div style="width:${persen[i]}%; background:${k.warna}"></div>`;
  }).join("");
  document.getElementById("legenda").innerHTML = KATEGORI.map(function (k) {
    return `<span><i style="background:${k.warna}"></i>${k.legenda}</span>`;
  }).join("");

  // Peringatan kalau katering per tamu terlalu kecil
  const kateringPerTamu = anggaran * persen[0] / 100 / tamu;
  document.getElementById("peringatan").innerHTML =
    kateringPerTamu < MIN_KATERING_PER_TAMU
      ? `<p class="peringatan">Alokasi venue &amp; katering sekitar ${rupiah(kateringPerTamu)} per tamu, tergolong rendah. Pertimbangkan menaikkan anggaran atau mengurangi jumlah tamu.</p>`
      : "";

  // Baris rincian
  document.getElementById("hasil").innerHTML = KATEGORI.map(function (k, i) {
    const nilai = anggaran * persen[i] / 100;
    return `
      <div class="baris">
        <div class="ikon">${k.ikon}</div>
        <div class="teks"><strong>${k.nama}</strong><small>${k.ket}</small></div>
        <div class="angka"><small>${persen[i].toFixed(1)}%</small><strong>${rupiah(nilai)}</strong></div>
      </div>`;
  }).join("");

  // Kartu rekomendasi paket
  document.getElementById("paket").innerHTML = PAKET.map(function (p) {
    const masuk = p.harga <= anggaran;
    return `
      <div class="kartu-paket ${masuk ? "" : "luar"}">
        <span class="label-paket">${p.label}</span>
        <h3>${p.nama}</h3>
        <div class="nama-paket">${p.paket}</div>
        <div class="harga">${rupiah(p.harga)}</div>
        <div class="ket">${p.ket}</div>
        <div class="status">${masuk ? "✓ Masuk plafon anggaran" : "Di atas plafon anggaran"}</div>
      </div>`;
  }).join("");

  tandaiChip();
}

// Ketik anggaran: otomatis diberi titik ribuan
elAnggaran.addEventListener("input", function () {
  const angka = bacaAnggaran();
  elAnggaran.value = angka ? angka.toLocaleString("id-ID") : "";
  render();
});

// Tombol cepat Rp 50 Jt, 100 Jt, dst
document.querySelectorAll("#chips .pill").forEach(function (chip) {
  chip.addEventListener("click", function () {
    elAnggaran.value = Number(chip.dataset.nilai).toLocaleString("id-ID");
    render();
  });
});

// Slider jumlah tamu
elTamu.addEventListener("input", render);

// Pilih venue
document.querySelectorAll("#venue .opsi").forEach(function (tombol) {
  tombol.addEventListener("click", function () {
    document.querySelectorAll("#venue .opsi").forEach(function (t) { t.classList.remove("aktif"); });
    tombol.classList.add("aktif");
    venue = tombol.dataset.venue;
    render();
  });
});

// Pilih fokus
document.querySelectorAll("#fokus .opsi").forEach(function (tombol) {
  tombol.addEventListener("click", function () {
    document.querySelectorAll("#fokus .opsi").forEach(function (t) { t.classList.remove("aktif"); });
    tombol.classList.add("aktif");
    fokus = tombol.dataset.fokus;
    render();
  });
});

// Unduh rincian: buka dialog cetak, lalu pilih "Save as PDF"
document.getElementById("unduh").addEventListener("click", function () {
  window.print();
});

render();