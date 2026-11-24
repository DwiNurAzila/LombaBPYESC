/**
 * File Khusus Testing
 * Jangan lupa hapus atau nonaktifkan file ini sebelum masuk ke production.
 */

const testingUsers = {
    pengantin: {
        login: 'pengantin@sakura.id',
        password: 'password123'
    },
    vendor: {
        email: 'vendor@sakura.id',
        password: 'password123'
    },
    admin: {
        email: 'admin@sakura.id',
        password: 'password123'
    }
};

function autoFillLogin(role) {
    const data = testingUsers[role];
    if (!data) return;

    // Cari form berdasarkan atribut name
    const emailInput = document.querySelector('input[name="login"]') || document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');

    if (emailInput && passwordInput) {
        // Isi value
        emailInput.value = data.login || data.email;
        passwordInput.value = data.password;
        
        // Beri efek highlight sebentar agar user tahu form sudah terisi
        emailInput.classList.add('ring-2', 'ring-green-400', 'bg-green-50');
        passwordInput.classList.add('ring-2', 'ring-green-400', 'bg-green-50');
        
        setTimeout(() => {
            emailInput.classList.remove('ring-2', 'ring-green-400', 'bg-green-50');
            passwordInput.classList.remove('ring-2', 'ring-green-400', 'bg-green-50');
        }, 1000);
    } else {
        console.warn('Form input tidak ditemukan di halaman ini.');
    }
}