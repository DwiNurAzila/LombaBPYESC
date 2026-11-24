
const menuToggle = document.getElementById("menuToggle");
const sidebar = document.querySelector(".sidebar");

menuToggle.addEventListener("click", () => {
    sidebar.classList.toggle("open");
});

// FILTER PERIODE
const periodButtons = document.querySelectorAll(".period-btn");

periodButtons.forEach(button => {
    button.addEventListener("click", () => {

        periodButtons.forEach(item => {
            item.classList.remove("active");
        });

        button.classList.add("active");

        showToast("Periode analitik: " + button.dataset.period);
    });
});

// DOWNLOAD LAPORAN
document.getElementById("reportBtn").addEventListener("click", () => {

    const data = [
        ["Indikator", "Nilai"],
        ["Konversi Leads", "32.5%"],
        ["Skor Kepuasan", "4.95"],
        ["Jumlah Ulasan", "38"],
        ["Sesi Temu Terkonfirmasi", "16"],
        ["Total Prospek", "48"],
        ["Reservasi Terkunci", "6"],
        ["Kenaikan Leads", "15%"]
    ];

    const csv = data.map(row => row.join(",")).join("\n");

    const blob = new Blob([csv], {
        type: "text/csv;charset=utf-8;"
    });

    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");

    link.href = url;
    link.download = "laporan-analitik-sakura.csv";
    link.click();

    URL.revokeObjectURL(url);

    showToast("Laporan analitik berhasil diunduh");
});

// REKOMENDASI
document.getElementById("strategyBtn").addEventListener("click", () => {
    showToast("Rekomendasi: Tingkatkan promosi Wedding Fair di wilayah Priangan");
});

// TOAST
let toastTimer;

function showToast(message) {

    const toast = document.getElementById("toast");

    toast.textContent = message;
    toast.classList.add("show");

    clearTimeout(toastTimer);

    toastTimer = setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}
