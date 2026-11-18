const PILAR = [
  { nama: "Gedung & Katering Jamuan",           persen: 42 },
  { nama: "Dekorasi, Lighting & Sound",         persen: 23 },
  { nama: "Jasa Wedding Organizer & Kru",       persen: 12 },
  { nama: "Dokumentasi (Foto & Sinematografi)", persen: 13 },
  { nama: "Busana Pengantin & Tata Rias (MUA)", persen: 10 }
];

const BIAYA_PER_TAMU = 300000; // asumsi awal, ganti setelah riset

function rupiah(angka) {
  return "Rp " + Math.round(angka).toLocaleString("id-ID");
}

const elDana = document.getElementById("dana");

if (elDana) {
  function render() {
    const angka = Number(elDana.value.replace(/\D/g, "")) || 0;
    const dana = angka || 120000000; // kalau kosong, tampilkan contoh Rp 120 juta

    document.getElementById("status-dana").textContent =
      angka ? "Total: " + rupiah(dana) : "Contoh: Rp 120 juta";

    // Estimasi tamu ideal: kisaran ±12,5% dari dana / biaya per tamu
    const tengah = dana / BIAYA_PER_TAMU;
    const bawah = Math.round(tengah * 0.875 / 10) * 10;
    const atas = Math.round(tengah * 1.125 / 10) * 10;
    document.getElementById("tamu-ideal").textContent = bawah + " - " + atas + " Undangan";

    document.getElementById("pilar").innerHTML = PILAR.map(function (p) {
      return `
        <div class="pilar">
          <div class="atas">
            <span>${p.nama}${p.tag ? '<span class="tag-hot">' + p.tag + '</span>' : ""}</span>
            <span>${p.persen}% <strong>${rupiah(dana * p.persen / 100)}</strong></span>
          </div>
          <div class="bar"><div style="width:${p.persen}%"></div></div>
        </div>`;
    }).join("");
  }

  elDana.addEventListener("input", function () {
    const angka = Number(elDana.value.replace(/\D/g, "")) || 0;
    elDana.value = angka ? angka.toLocaleString("id-ID") : "";
    render();
  });

  render();
}