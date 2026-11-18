
// ===================================
// ELEMENT
// ===================================

const modal = document.getElementById("modal");
const toast = document.getElementById("toast");

let selectedClient = null;


// ===================================
// TOAST NOTIFICATION
// ===================================

function showToast(message) {
    toast.textContent = message;
    toast.classList.add("show");

    clearTimeout(window.toastTimer);

    window.toastTimer = setTimeout(() => {
        toast.classList.remove("show");
    }, 2500);
}


// ===================================
// SIDEBAR MOBILE
// ===================================

document.getElementById("menuToggle").addEventListener("click", () => {
    document.getElementById("sidebar").classList.toggle("open");
});


// ===================================
// PILIH KLIEN
// ===================================

const clientCards = document.querySelectorAll(".client-card");

clientCards.forEach(card => {
    card.addEventListener("click", () => {

        clientCards.forEach(item => {
            item.classList.remove("selected-client");
        });

        card.classList.add("selected-client");

        selectedClient = card;

        document.getElementById("detailName").textContent =
            card.dataset.name;

        document.getElementById("detailSubtitle").textContent =
            "Status: " + card.dataset.status;

        document.getElementById("detailPackage").textContent =
            card.dataset.package;

        document.getElementById("detailBudget").textContent =
            card.dataset.budget;

        document.getElementById("detailLocation").textContent =
            card.dataset.location;

        showToast("Detail " + card.dataset.name + " ditampilkan.");
    });
});


// ===================================
// PENCARIAN KLIEN
// ===================================

const searchInput = document.getElementById("searchInput");

searchInput.addEventListener("input", function() {

    const keyword = this.value.toLowerCase();

    clientCards.forEach(card => {

        const name = card.dataset.name.toLowerCase();
        const packageName = card.dataset.package.toLowerCase();

        if (
            name.includes(keyword) ||
            packageName.includes(keyword)
        ) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }

    });

});


// ===================================
// TAMBAH KLIEN
// ===================================

const addClientButton = document.getElementById("addClientButton");

addClientButton.addEventListener("click", () => {
    modal.classList.add("show");
});

function closeModal() {
    modal.classList.remove("show");
}

document.getElementById("closeModal").addEventListener("click", closeModal);

document.getElementById("cancelModal").addEventListener("click", closeModal);

modal.addEventListener("click", event => {
    if (event.target === modal) {
        closeModal();
    }
});


// ===================================
// SIMPAN KLIEN BARU
// ===================================

document.getElementById("clientForm").addEventListener("submit", function(event) {

    event.preventDefault();

    const name = document.getElementById("clientNameInput").value.trim();
    const packageName = document.getElementById("packageInput").value.trim();
    const budget = document.getElementById("budgetInput").value.trim() || "Belum ditentukan";
    const date = document.getElementById("dateInput").value || "Belum ditentukan";

    if (!name || !packageName) {
        showToast("Nama klien dan paket wajib diisi.");
        return;
    }

    const newCard = document.createElement("div");

    newCard.className = "client-card";

    newCard.dataset.client = "new";
    newCard.dataset.name = name;
    newCard.dataset.status = "Prospek";
    newCard.dataset.budget = budget;
    newCard.dataset.date = date;
    newCard.dataset.package = packageName;
    newCard.dataset.location = "Belum ditentukan";
    newCard.dataset.contact = name;

    newCard.innerHTML = `
        <div class="client-title">
            <h4></h4>
            <span class="status-tag new">Baru</span>
        </div>
        <p></p>
        <div class="client-meta">
            <span>Estimasi Budget</span>
            <b></b>
        </div>
        <div class="client-meta">
            <span>Target Acara: ${date}</span>
        </div>
        <div class="card-bottom">
            <span class="package-tag">Prospek Baru</span>
        </div>
    `;

    newCard.querySelector("h4").textContent = name;
    newCard.querySelector(".client-title p")?.remove();
    newCard.querySelector(".client-card > p")?.remove();
    newCard.querySelector(".client-meta b").textContent = budget;
    newCard.querySelector("p").textContent = packageName;

    newCard.addEventListener("click", () => selectNewClient(newCard));

    document.querySelector(".board-column").appendChild(newCard);

    closeModal();
    this.reset();

    showToast("Klien " + name + " berhasil ditambahkan.");

});


// ===================================
// PILIH KLIEN BARU
// ===================================

function selectNewClient(card) {

    document.querySelectorAll(".client-card").forEach(item => {
        item.classList.remove("selected-client");
    });

    card.classList.add("selected-client");

    selectedClient = card;

    document.getElementById("detailName").textContent = card.dataset.name;
    document.getElementById("detailSubtitle").textContent = "Status: " + card.dataset.status;
    document.getElementById("detailPackage").textContent = card.dataset.package;
    document.getElementById("detailBudget").textContent = card.dataset.budget;
    document.getElementById("detailLocation").textContent = card.dataset.location;

}


// ===================================
// FILTER KUSTOM
// ===================================

document.getElementById("filterButton").addEventListener("click", () => {

    const filter = prompt(
        "Pilih filter:\n1. Prospek\n2. Konsultasi\n3. Negosiasi\n4. Closing\n\nMasukkan angka:"
    );

    const filterMap = {
        "1": "Prospek",
        "2": "Konsultasi",
        "3": "Negosiasi",
        "4": "Closing"
    };

    if (filter === null) return;

    if (!filterMap[filter]) {
        showToast("Pilihan filter tidak valid.");
        return;
    }

    clientCards.forEach(card => {
        card.style.display =
            card.dataset.status === filterMap[filter] ? "block" : "none";
    });

    showToast("Filter " + filterMap[filter] + " diterapkan.");

});


// ===================================
// RESET FILTER MELALUI PENCARIAN
// ===================================

searchInput.addEventListener("search", function() {
    if (this.value === "") {
        clientCards.forEach(card => card.style.display = "block");
    }
});


// ===================================
// EKSPOR CSV
// ===================================

document.getElementById("exportButton").addEventListener("click", () => {

    const rows = [
        ["Nama Klien", "Status", "Paket", "Anggaran", "Tanggal Acara"]
    ];

    document.querySelectorAll(".client-card").forEach(card => {

        rows.push([
            card.dataset.name,
            card.dataset.status,
            card.dataset.package,
            card.dataset.budget,
            card.dataset.date
        ]);

    });

    const csv = rows.map(row =>
        row.map(value =>
            '"' + String(value || "").replace(/"/g, '""') + '"'
        ).join(",")
    ).join("\n");

    const blob = new Blob(["\uFEFF" + csv], {
        type: "text/csv;charset=utf-8;"
    });

    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");

    link.href = url;
    link.download = "laporan-leads-sakura.csv";
    link.click();

    URL.revokeObjectURL(url);

    showToast("Laporan CSV berhasil diekspor.");

});


// ===================================
// TAMBAH CATATAN
// ===================================

document.getElementById("addHistoryButton").addEventListener("click", () => {

    const note = prompt("Masukkan catatan interaksi klien:");

    if (!note || !note.trim()) return;

    const item = document.createElement("div");
    item.className = "timeline-item";

    const title = document.createElement("b");
    title.textContent = note.trim();

    const date = document.createElement("small");
    date.textContent = new Date().toLocaleString("id-ID");

    item.append(title, date);

    document.getElementById("timeline").prepend(item);

    showToast("Catatan berhasil ditambahkan.");

});


// ===================================
// TOMBOL DETAIL
// ===================================

document.getElementById("addNoteButton").addEventListener("click", () => {
    document.getElementById("addHistoryButton").click();
});

document.getElementById("meetingButton").addEventListener("click", () => {
    showToast("Fitur reschedule meeting akan dikembangkan.");
});

document.getElementById("revisionButton").addEventListener("click", () => {
    showToast("Membuka fitur pengiriman revisi.");
});

document.getElementById("vendorButton").addEventListener("click", () => {
    showToast("Membuka pencarian vendor.");
});

document.getElementById("openWhatsapp").addEventListener("click", () => {
    showToast("Nomor WhatsApp klien perlu dihubungkan terlebih dahulu.");
});


// ===================================
// MENU YANG BELUM DIBUAT
// ===================================

document.querySelectorAll("[data-coming]").forEach(link => {
    link.addEventListener("click", event => {
        event.preventDefault();
        showToast("Halaman " + link.dataset.coming + " belum dibuat.");
    });
});


// ===================================
// EKSPOR / STATUS AWAL
// ===================================

console.log("Sakura Leads & Klien berhasil dimuat.");
