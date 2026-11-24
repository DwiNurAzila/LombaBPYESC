document.addEventListener('DOMContentLoaded', function() {
    // Mencari semua tombol yang memiliki atribut 'data-toggle-password'
    const toggleButtons = document.querySelectorAll('[data-toggle-password]');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah form tersubmit jika tombol ada di dalam form
            
            // Cari elemen input password berdasarkan target id yang ada di atribut data-target
            const targetId = this.getAttribute('data-toggle-password');
            const input = document.getElementById(targetId);
            
            if (input) {
                // Cek tipe input saat ini, lalu ubah
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                
                // Opsional: Ubah ikon mata menjadi mata dicoret (jika Anda menggunakan SVG)
                // Untuk saat ini kita hanya mengubah atribut aria-label atau warna untuk indikasi
                if (type === 'text') {
                    this.classList.add('text-brown'); // Memberi warna saat aktif
                } else {
                    this.classList.remove('text-brown');
                }
            }
        });
    });
});