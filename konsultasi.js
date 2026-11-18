const NAMA_BULAN = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
const NAMA_HARI = ["Min","Sen","Sel","Rab","Kam","Jum","Sab"];

const hariIni = new Date();
hariIni.setHours(0, 0, 0, 0);

let bulan = hariIni.getMonth();
let tahun = hariIni.getFullYear();
let tanggalDipilih = null;

const elGrid = document.getElementById("kal-grid");
const elJudul = document.getElementById("kal-judul");
const elTanggalTeks = document.getElementById("tanggal-teks");

function teksTanggal(d) {
  return d.toLocaleDateString("id-ID", { weekday: "long", day: "numeric", month: "long", year: "numeric" });
}

function renderKalender() {
  elJudul.textContent = NAMA_BULAN[bulan] + " " + tahun;

  let html = NAMA_HARI.map(function (h) { return '<div class="nama-hari">' + h + "</div>"; }).join("");

  const hariPertama = new Date(tahun, bulan, 1).getDay();
  const jumlahHari = new Date(tahun, bulan + 1, 0).getDate();

  for (let i = 0; i < hariPertama; i++) html += "<div></div>";

  for (let tgl = 1; tgl <= jumlahHari; tgl++) {
    const d = new Date(tahun, bulan, tgl);
    const lewat = d < hariIni;
    const dipilih = tanggalDipilih && d.getTime() === tanggalDipilih.getTime();
    html += '<button type="button" class="hari' + (lewat ? " mati" : "") + (dipilih ? " pilih" : "") +
            '" data-tgl="' + tgl + '"' + (lewat ? " disabled" : "") + ">" + tgl + "</button>";
  }
  elGrid.innerHTML = html;

  // Matikan tombol "bulan sebelumnya" kalau sudah di bulan ini
  document.getElementById("bln-sebelum").disabled =
    (tahun === hariIni.getFullYear() && bulan === hariIni.getMonth());
}

elGrid.addEventListener("click", function (e) {
  const tombol = e.target.closest(".hari");
  if (!tombol || tombol.disabled) return;
  tanggalDipilih = new Date(tahun, bulan, Number(tombol.dataset.tgl));
  elTanggalTeks.textContent = "Tanggal dipilih: " + teksTanggal(tanggalDipilih);
  renderKalender();
});

document.getElementById("bln-sebelum").addEventListener("click", function () {
  bulan--;
  if (bulan < 0) { bulan = 11; tahun--; }
  renderKalender();
});
document.getElementById("bln-sesudah").addEventListener("click", function () {
  bulan++;
  if (bulan > 11) { bulan = 0; tahun++; }
  renderKalender();
});

const form = document.getElementById("form-konsul");
const sukses = document.getElementById("sukses");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  if (!tanggalDipilih) {
    elTanggalTeks.textContent = "Pilih tanggal konsultasi terlebih dahulu.";
    elTanggalTeks.style.color = "#b3261e";
    return;
  }
  elTanggalTeks.style.color = "";

  const format = form.querySelector('input[name="format"]:checked').value;
  const jam = document.getElementById("jam").value;
  const wanita = document.getElementById("n-wanita").value.trim();
  const pria = document.getElementById("n-pria").value.trim();

  document.getElementById("ringkasan").innerHTML =
    "Terima kasih, <strong>" + wanita + " &amp; " + pria + "</strong>.<br>" +
    "Format: <strong>" + format + "</strong><br>" +
    "Tanggal: <strong>" + teksTanggal(tanggalDipilih) + "</strong><br>" +
    "Waktu: <strong>" + jam + " WIB</strong><br><br>" +
    "Ini simulasi untuk demo. Tidak ada data yang dikirim atau disimpan.";

  form.style.display = "none";
  sukses.style.display = "block";
  window.scrollTo({ top: 0, behavior: "smooth" });
});

document.getElementById("ulang").addEventListener("click", function () {
  form.reset();
  tanggalDipilih = null;
  elTanggalTeks.textContent = "Belum ada tanggal dipilih.";
  sukses.style.display = "none";
  form.style.display = "";
  renderKalender();
});

renderKalender();