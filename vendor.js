// vendor.js — hanya aktif di halaman yang punya .grid-vendor
(function () {
  const grid = document.querySelector(".grid-vendor");
  if (!grid) return;

  const kartuAsli = [...grid.querySelectorAll(":scope > .kartu")];
  const jumlah  = document.getElementById("jumlah");
  const kosong  = document.getElementById("kosong");
  const cari    = document.getElementById("cari");
  const urut    = document.getElementById("urut");
  const pills   = [...document.querySelectorAll(".pill")];
  let kategori  = "semua";

  // "45.000.000" / "45000000" / "" -> angka
  const angka = s => parseInt(String(s || "").replace(/[^\d]/g, ""), 10) || 0;

  const data = k => ({
    lokasi: k.dataset.lokasi || "",
    konsep: (k.dataset.konsep || "").split(/\s+/),
    harga:  angka(k.dataset.harga),
    rating: parseFloat(k.dataset.rating) || 0,
    teks:   k.textContent.toLowerCase()
  });

  function terapkan() {
    const q      = (cari?.value || "").trim().toLowerCase();
    const lokasi = [...document.querySelectorAll('input[name="lokasi"]:checked')].map(i => i.value);
    const konsep = [...document.querySelectorAll('input[name="konsep"]:checked')].map(i => i.value);
    const min    = angka(document.getElementById("min")?.value);
    const max    = angka(document.getElementById("max")?.value);

    let hasil = kartuAsli.filter(k => {
      const d = data(k);
      if (q && !d.teks.includes(q)) return false;
      if (lokasi.length && !lokasi.includes(d.lokasi)) return false;
      if (konsep.length && !konsep.some(c => d.konsep.includes(c))) return false;
      if (min && d.harga < min) return false;
      if (max && d.harga > max) return false;
      if (kategori === "rating" && d.rating < 4.8) return false;
      if (["adat", "modern", "intimate"].includes(kategori) && !d.konsep.includes(kategori)) return false;
      return true;
    });

    const mode = urut?.value || "rekomendasi";
    if (mode === "harga") hasil.sort((a, b) => data(a).harga - data(b).harga);
    if (mode === "rating" || kategori === "rating") hasil.sort((a, b) => data(b).rating - data(a).rating);

    // pindahkan node asli (bukan innerHTML string) -> aman & event tetap utuh
    grid.innerHTML = "";
    hasil.forEach(k => grid.appendChild(k));

    if (jumlah) jumlah.textContent = `Menampilkan ${hasil.length} vendor`;
    if (kosong) kosong.hidden = hasil.length > 0;
  }

  cari?.addEventListener("input", terapkan);
  urut?.addEventListener("change", terapkan);
  document.getElementById("terapkan")?.addEventListener("click", terapkan);

  pills.forEach(p => p.addEventListener("click", () => {
    pills.forEach(x => x.classList.remove("aktif"));
    p.classList.add("aktif");
    kategori = p.dataset.filter;
    terapkan();
  }));

  document.getElementById("reset")?.addEventListener("click", () => {
    document.querySelectorAll('input[name="lokasi"], input[name="konsep"]').forEach(i => (i.checked = false));
    ["min", "max"].forEach(id => { const el = document.getElementById(id); if (el) el.value = ""; });
    if (cari) cari.value = "";
    if (urut) urut.value = "rekomendasi";
    pills.forEach(x => x.classList.toggle("aktif", x.dataset.filter === "semua"));
    kategori = "semua";
    terapkan();
  });

  terapkan(); // render awal + sinkronkan jumlah
})();