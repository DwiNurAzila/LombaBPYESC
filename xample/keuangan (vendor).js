
const menuToggle = document.getElementById("menuToggle");
const sidebar = document.querySelector(".sidebar");

menuToggle.addEventListener("click", () => {
    sidebar.classList.toggle("open");
});

// MODAL TRANSAKSI
const transactionModal = document.getElementById("transactionModal");

document.getElementById("transactionBtn").addEventListener("click", () => {
    transactionModal.classList.add("show");
});

document.getElementById("invoiceBtn").addEventListener("click", () => {
    showMessage("Fitur pengiriman tagihan siap digunakan");
});

function closeModal() {
    transactionModal.classList.remove("show");
}

transactionModal.addEventListener("click", (e) => {
    if (e.target === transactionModal) {
        closeModal();
    }
});

// SIMPAN TRANSAKSI
document.getElementById("transactionForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const name = document.getElementById("transactionName").value;
    const type = document.getElementById("transactionType").value;
    const amount = Number(document.getElementById("transactionAmount").value);

    if (!name || !type || amount <= 0) {
        showMessage("Lengkapi data transaksi terlebih dahulu");
        return;
    }

    showMessage("Transaksi " + type.toLowerCase() + " berhasil dicatat: " + name);

    this.reset();
    closeModal();
});

// EXPORT
document.getElementById("exportBtn").addEventListener("click", () => {
    const rows = [
        ["Nama Transaksi", "Jenis", "Nominal"],
        ["Pemasukan Bulan Ini", "Pemasukan", 468000000],
        ["Biaya Vendor & Goods", "Pengeluaran", 312500000],
        ["Menunggu Pelunasan", "Piutang", 196000000],
        ["Laba Bersih Estimasi", "Laba", 155500000]
    ];

    const csv = rows.map(row => row.join(",")).join("\n");

    const blob = new Blob([csv], {
        type: "text/csv;charset=utf-8;"
    });

    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");

    link.href = url;
    link.download = "laporan-keuangan-sakura.csv";
    link.click();

    URL.revokeObjectURL(url);

    showMessage("Laporan berhasil diunduh dalam format CSV");
});

// TOAST
let toastTimer;

function showMessage(message) {
    const toast = document.getElementById("toast");

    toast.textContent = message;
    toast.classList.add("show");

    clearTimeout(toastTimer);

    toastTimer = setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}

// NAVIGASI MENU
document.querySelectorAll("[data-coming]").forEach(item => {
    item.addEventListener("click", function(e) {
        e.preventDefault();
        showMessage("Fitur " + this.dataset.coming + " segera tersedia");
    });
});
