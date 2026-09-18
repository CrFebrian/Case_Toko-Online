# Case Toko Online

Aplikasi web Toko Online sederhana yang dibangun menggunakan **PHP Native** dengan penyimpanan data berbasis file **JSON**. Proyek ini disusun dengan standar *best practices* pengujian perangkat lunak, mencakup **Unit Testing (PHPUnit)**, **End-to-End (E2E) Testing (Cypress)**, laporan **Code Coverage**, serta otomasi **CI/CD Pipeline** menggunakan GitHub Actions.

---

## 📌 Fitur Utama

- **Otentikasi Pengguna (`Auth.php`)**: Fitur registrasi (`register.php`), login (`login.php`), dan logout (`logout.php`).
- **Katalog Produk (`Catalog.php`)**: Menampilkan daftar produk yang diambil dari database JSON (`data/products.json`).
- **Manajemen Pesanan & Checkout (`Checkout.php`)**: Proses pemesanan produk dan penyimpanan riwayat transaksi (`data/orders.json`).
- **Panel Admin (`AdminManager.php`)**: Halaman khusus untuk manajemen toko (`admin.php`).
- **Automated Testing & Coverage**:
  - Unit Test menggunakan PHPUnit.
  - End-to-End Testing menggunakan Cypress.
  - Laporan cakupan kode (*Code Coverage Report*) dalam format HTML (`laporan_coverage/`).

---

## 📂 Struktur Direktori Proyek

```text
Case_Toko-Online-main/
├── .github/
│   └── workflows/
│       └── ci.yml             # Workflow CI/CD untuk otomatisasi pengujian di GitHub
├── data/                      # File database berbasis JSON
│   ├── orders.json            # Data transaksi/pesanan
│   ├── products.json          # Data produk aktif
│   ├── products_seed.json     # Seed data produk awal
│   └── users.json             # Data akun pengguna
├── cypress/                   # Framework E2E Testing (Cypress)
│   ├── e2e/
│   │   └── toko_online.cy.js  # Test suite E2E untuk flow toko online
│   ├── fixtures/              # Mock data testing
│   └── support/               # Setup & perintah kustom Cypress
├── src/                       # Source code / Logic utama aplikasi
│   ├── AdminManager.php       # Logika bisnis manajemen admin
│   ├── Auth.php               # Logika autentikasi & sesi
│   ├── Catalog.php            # Logika pengelolaan katalog produk
│   └── Checkout.php           # Logika pemrosesan checkout pesanan
├── tests/                     # Unit Test Suite (PHPUnit)
│   ├── CatalogTest.php        # Unit test untuk kelas Catalog
│   └── CheckoutTest.php       # Unit test untuk kelas Checkout
├── laporan_coverage/          # Laporan Code Coverage PHPUnit (Format HTML)
├── admin.php                  # Halaman dashboard admin
├── automated_testing.php      # Script pembantu/runner otomatisasi tes
├── index.php                  # Halaman utama (Katalog & Toko)
├── login.php                  # Halaman login
├── logout.php                 # Script penanganan logout
├── proses.php                 # Handler pemrosesan form
├── register.php               # Halaman pendaftaran akun
├── composer.json / lock       # Dependensi PHP (PHPUnit, dll.)
├── package.json / lock        # Dependensi Node.js (Cypress, dll.)
├── cypress.config.js          # Konfigurasi Cypress
├── phpunit.xml                # Konfigurasi pengujian PHPUnit
└── .gitignore                 # File/folder yang diabaikan Git
```

---

## 🛠️ Prasyarat & Teknologi

Sebelum menjalankan proyek, pastikan lingkungan pengembang Anda telah terkonfigurasi dengan:

- **PHP** >= 7.4 / 8.x
- **Composer** (untuk dependensi PHP)
- **Node.js** & **NPM** (untuk dependensi JavaScript & Cypress)

---

## 🚀 Cara Instalasi & Memulai

### 1. Clone Repository & Masuk ke Direktori
```bash
git clone <URL_REPOSITORY_ANDA>
cd Case_Toko-Online-main
```

### 2. Install Dependensi PHP & Node.js
```bash
# Install paket PHP (PHPUnit)
composer install

# Install paket Node.js (Cypress)
npm install
```

### 3. Menjalankan Server Lokal
Anda dapat menggunakan built-in web server milik PHP:
```bash
php -S localhost:8000
```
Buka browser dan akses `http://localhost:8000`.

---

## 🧪 Menguji Aplikasi (Automated Testing)

Proyek ini mendukung dua skenario pengujian utama:

### 1. Unit Testing (PHPUnit)
Untuk menjalankan pengujian unit pada kelas-kelas backend di direktori `src/`:
```bash
./vendor/bin/phpunit
```
*Gunakan konfigurasi yang ada di `phpunit.xml` untuk mengatur pembuatan laporan coverage secara lokal.*

### 2. End-to-End (E2E) Testing (Cypress)
Pastikan server lokal (`http://localhost:8000`) sedang berjalan sebelum menguji UI.

- **Menjalankan Cypress GUI:**
  ```bash
  npx cypress open
  ```
- **Menjalankan Cypress Headless Mode (Command Line):**
  ```bash
  npx cypress run
  ```

---

## 🔄 CI/CD Pipeline

Proyek ini telah dikonfigurasi menggunakan **GitHub Actions** via file `.github/workflows/ci.yml`. Setiap ada aksi `push` atau `pull request`, pipeline akan otomatis:
1. Menyiapkan lingkungan PHP & Node.js.
2. Menginstall dependensi proyek via Composer & NPM.
3. Menjalankan unit test berbasis PHPUnit.
4. Menjalankan pengujian E2E menggunakan Cypress.

---

## 📊 Laporan Coverage

Anda dapat melihat laporan tingkat cakupan tes (*Code Coverage*) secara visual dengan membuka file berikut di browser:
```text
laporan_coverage/index.html
```
