# Handbook SIMPUS-Mini — Jobsheet 6

## 1. Gambaran Proyek

SIMPUS-Mini adalah website perpustakaan mini statis (tanpa backend) yang menampilkan data buku dan anggota dari file JSON, lengkap dengan pencarian, hapus data, validasi form, dan navbar responsif. Dibuat murni dengan HTML, CSS, dan JavaScript.

Struktur folder yang dipakai dari kode:

```text
simpus-mini/
├── index.html              (Beranda + ringkasan)
├── buku/
│   ├── list.html           (Daftar Buku)
│   └── tambah.html         (Form Tambah Buku)
├── anggota/
│   ├── list.html           (Daftar Anggota)
│   └── tambah.html         (Form Tambah Anggota)
├── assets/
│   ├── css/style.css       (semua styling)
│   └── js/
│       ├── app.js          (fitur global: hamburger, hapus, search, validasi)
│       ├── buku.js         (fetch + render tabel buku)
│       └── anggota.js      (fetch + render tabel anggota)
└── data/
    ├── buku.json
    └── anggota.json
```

Alur kerja satu halaman daftar (misalnya `buku/list.html`):

1. Browser memuat HTML dan `style.css`.
2. Script `app.js` dan `buku.js` jalan setelah `DOMContentLoaded`.
3. `buku.js` menampilkan teks "Memuat data...", menunggu 600 ms (simulasi loading), lalu `fetch` ke `../data/buku.json`.
4. Data JSON diubah jadi baris `<tr>` dan dimasukkan ke `<tbody>`.
5. User bisa mengetik di kotak cari (filter real-time) atau klik Hapus (muncul konfirmasi, baris dihapus dari tampilan).

Catatan: karena memakai `fetch`, project harus dibuka lewat server lokal (misalnya Live Server di VS Code), bukan dengan klik dua kali file HTML (`file://`), kalau tidak data JSON gagal dimuat.

## 2. Fitur HTML dan Fungsinya

| Fitur / elemen | Dipakai di | Fungsi |
| --- | --- | --- |
| `<!DOCTYPE html>`, `<html lang="id">` | Semua halaman | Menandakan dokumen HTML5 dan bahasa Indonesia (membantu browser dan screen reader). |
| `<meta charset="UTF-8">` | Semua halaman | Supaya karakter seperti simbol dan tanda baca tampil benar. |
| `<meta name="viewport">` | Semua halaman | Wajib untuk responsive: lebar halaman mengikuti lebar layar HP. |
| `<link rel="stylesheet">` | `<head>` | Menghubungkan halaman ke `style.css`. |
| `<header>`, `<nav>`, `<ul>`, `<li>`, `<a>` | Semua halaman | Header situs dan menu navigasi antar halaman (path relatif seperti `../index.html`). |
| `<main>`, `<section>`, `<article>`, `<footer>` | Semua halaman | Semantic HTML: struktur yang jelas. `<article>` dipakai untuk kartu Total Buku, Total Anggota, Sedang Dipinjam. |
| `<h1>`, `<h2>`, `<h3>` | Semua halaman | Hierarki judul: nama situs, judul section, judul kartu. |
| `<table>`, `<thead>`, `<tbody>`, `<tr>`, `<th>`, `<td>` | List buku dan anggota | Menampilkan data tabular. `<tbody>` sengaja dikosongkan karena diisi oleh JavaScript. |
| `<form>`, `<label for>`, `<input>`, `<select>`, `<option>`, `<button type="submit">` | Halaman tambah | Form input data. Atribut `for` pada label terhubung ke `id` input. |
| Atribut validasi: `required`, `min`, `max`, `type="number"` | Tambah buku | Validasi bawaan browser (wajib diisi, tahun 1900 sampai 2026, stok minimal 0). |
| `<input type="checkbox">` + `<label>` | `index.html` | Hamburger menu versi "checkbox hack" tanpa JavaScript. |
| `<button id="nav-toggle-btn">` | Halaman selain beranda | Tombol hamburger versi JavaScript (☰). |
| `<div class="table-responsive">` | List buku dan anggota | Pembungkus tabel supaya bisa digeser horizontal di layar kecil. |
| `<p id="loading-indicator">` | List buku dan anggota | Teks "Memuat data..." yang ditampilkan saat fetch berjalan. |
| `<script src>` di akhir `<body>` | Semua halaman | Memuat JavaScript setelah elemen HTML ada. `app.js` dimuat dulu, baru `buku.js` atau `anggota.js`. |
| Entitas HTML (`&copy;`, `&mdash;`, `&#9776;`) | Footer dan tombol | Menulis simbol ©, tanda pisah, dan ikon ☰. |

Atribut yang paling sering dipakai JavaScript sebagai "pegangan": `id` (misalnya `search-input`, `loading-indicator`, `form-tambah`) dan `class` (misalnya `table-responsive`, `btn-hapus`).

## 3. Fitur CSS dan Fungsinya

| Fitur | Contoh di kode | Fungsi |
| --- | --- | --- |
| Reset (`* { margin:0; padding:0; box-sizing:border-box }`) | Bagian RESET & BASE | Menghapus margin dan padding bawaan browser, dan `border-box` membuat lebar elemen sudah termasuk padding dan border sehingga lebih mudah dihitung. |
| Selector elemen dan turunan | `header nav ul`, `header nav a`, `section h2` | Menarget elemen berdasarkan posisinya di dalam elemen lain. |
| Pseudo-class `:hover` | `a:hover`, `tbody tr:hover`, `article:hover` | Efek saat mouse diarahkan (ganti warna, garis bawah, geser). |
| Pseudo-class `:focus` | `form input:focus` | Border berubah dan muncul glow saat input diklik. |
| `:nth-of-type(2)` | `main section:nth-of-type(2)` | Memilih `<section>` kedua di `<main>`, yaitu bagian Ringkasan di beranda. |
| `:nth-child(even)` | `tbody tr:nth-child(even)` | Baris genap tabel diberi warna beda (zebra stripe). |
| `:first-of-type`, `:last-of-type` | `td button:first-of-type` | Tombol pertama (Edit) berwarna oranye, tombol terakhir (Hapus) berwarna merah. |
| Flexbox | `header`, `.action-bar`, `.form-buttons`, `article` | Mengatur susunan elemen. `justify-content: space-between` untuk kiri-kanan, `align-items: center` untuk tengah vertikal, `flex-direction: column` agar kartu Ringkasan menumpuk ke bawah, `gap` untuk jarak, `flex-wrap` supaya boleh turun baris. |
| Box model | `padding`, `margin`, `border-radius`, `box-shadow` | Jarak dalam dan luar, sudut membulat, dan bayangan kartu. |
| `max-width` + `margin: auto` | `main`, `.form-container` | Konten dibatasi lebarnya dan diletakkan di tengah. |
| `transition`, `transform` | `translateX(5px)`, `translateY(-1px)` | Animasi halus: kartu bergeser, tombol naik sedikit. |
| `overflow-x: auto` | `.table-responsive` | Tabel yang terlalu lebar bisa digeser ke samping. |
| `display: none` / `block` | `.nav-toggle`, `header nav` di mobile | Menyembunyikan dan menampilkan elemen (dasar hamburger menu). |
| Selector sibling `~` | `.nav-toggle:checked ~ nav` | Saat checkbox dicentang, `nav` yang berada setelahnya ditampilkan. |
| Class `.nav-open` | `header nav.nav-open` | Ditambah JavaScript saat tombol ☰ diklik, menampilkan menu di HP. |
| `order` | `header nav { order: 3 }` | Memindahkan nav ke baris paling bawah pada layar HP. |
| Media query | `@media (max-width: 768px)` dan `480px` | Responsive: aturan tambahan untuk tablet dan HP. |
| `resize: vertical` | `form textarea` | Textarea hanya boleh ditarik tingginya. |

Warna yang dipakai konsisten bertema cokelat krem, misalnya `#a9784f` (header dan tombol utama), `#f5eadb` (kartu dan info), `#faf7f2` (background), dan `#c96f5b` (tombol hapus).

## 4. Fitur JavaScript dan Fungsinya

### app.js (fitur global, dimuat di semua halaman)

| Fungsi | Fitur JS yang dipakai | Fungsi dan cara kerja |
| --- | --- | --- |
| `initNavToggle()` | `getElementById`, `querySelector`, `addEventListener("click")`, `classList.toggle` | Saat tombol ☰ diklik, class `nav-open` ditambah atau dihapus di `<nav>` sehingga menu muncul dan hilang di HP. Ada guard `if (!toggleBtn \|\| !nav) return;` agar tidak error di halaman yang tidak punya tombol itu. |
| `initHapusConfirm()` | Event delegation, `e.target.closest()`, `confirm()`, `row.remove()` | Satu listener di `document` menangkap klik tombol `.btn-hapus`. Dipilih delegation karena baris tabel dibuat dinamis oleh fetch, jadi tombolnya belum ada saat halaman load. Muncul dialog konfirmasi, kalau OK baris dihapus dari DOM. |
| `initTableFilter()` | Event `keyup`, `toLowerCase()`, `includes()`, `style.display` | Pencarian real-time: tiap ketikan, semua baris dicek, yang tidak mengandung kata kunci disembunyikan (`display: none`). |
| `tampilkanError()` dan `hapusError()` | `createElement`, `textContent`, `insertAdjacentElement`, `classList.contains` | Membuat `<span class="error">` tepat di bawah input yang salah, dan menghapusnya kalau sudah benar. |
| `initValidasiForm()` | Event `submit`, `trim()`, `parseInt()`, `isNaN()`, `preventDefault()` | Validasi sebelum submit: judul atau nama tidak kosong, pengarang tidak kosong, tahun 1900 sampai 2026, stok tidak negatif. Kalau ada yang salah, `e.preventDefault()` menahan form terkirim. Satu fungsi dipakai untuk form buku dan anggota karena selector-nya `[name='judul'], [name='nama']` dan setiap field dicek hanya jika ada. |
| Pemicu | `DOMContentLoaded` | Semua fungsi `init...` dijalankan setelah HTML selesai dimuat. |

### buku.js dan anggota.js (khusus halaman list)

Keduanya punya pola yang sama dan hanya beda sumber data dan kolomnya.

| Bagian kode | Fitur | Fungsi |
| --- | --- | --- |
| `async function muatDaftarBuku()` | `async/await` | Fungsi asinkron supaya bisa menunggu proses fetch tanpa membekukan halaman. |
| `loading.style.display = "block"` | Manipulasi DOM | Menampilkan indikator loading, dan `tbody.innerHTML = ""` mengosongkan tabel dulu. |
| `await new Promise(r => setTimeout(r, 600))` | `Promise`, `setTimeout` | Jeda buatan 600 ms untuk mensimulasikan koneksi lambat (supaya loading terlihat). |
| `fetch("../data/buku.json")` | Fetch API | Mengambil file JSON. Path `../` karena halaman ada di dalam folder `buku/`. |
| `if (!res.ok) throw new Error(...)` | Error handling | Kalau status bukan 200 (misalnya 404), lempar error supaya masuk ke `catch`. |
| `await res.json()` | Parsing JSON | Mengubah isi file menjadi array of object JavaScript. |
| `forEach` + `createElement("tr")` + `innerHTML` + `appendChild` | Render dinamis | Untuk tiap object dibuat satu baris `<tr>` berisi `<td>` dan tombol Edit dan Hapus, lalu ditempel ke `<tbody>`. |
| `try / catch / finally` | Penanganan error | `catch` menampilkan pesan gagal di tabel, `finally` selalu menyembunyikan loading baik sukses maupun gagal. |
| `addEventListener("DOMContentLoaded", ...)` | Event | Memulai pengambilan data setelah halaman siap. |

## 5. Data JSON dan Cara Fetch

JSON (JavaScript Object Notation) adalah format teks untuk menyimpan data terstruktur. Di project ini data berupa array berisi object, dan tiap object mewakili satu baris tabel.

```json
{"no_anggota": "A001", "nama": "Al Fath Raya Maulana", "alamat": "Malang", "no_hp": "0812xxxxxxxx"}
```

Hubungan kunci JSON dengan tabel HTML:

| File | Kunci (key) | Kolom tabel |
| --- | --- | --- |
| `anggota.json` | `no_anggota`, `nama`, `alamat`, `no_hp` | No. Anggota, Nama, Alamat, No. HP |
| `buku.json` | `judul`, `pengarang`, `tahun`, `stok` | Judul, Pengarang, Tahun, Stok |

Kolom Aksi (Edit dan Hapus) tidak ada di JSON, tombolnya ditambahkan langsung oleh JavaScript saat render.

Urutan kerja fetch: `fetch(url)` mengembalikan Promise berisi response, `res.ok` dicek untuk memastikan sukses, lalu `res.json()` mengubah isinya menjadi array JavaScript yang siap di-loop.

## 6. Temuan Bug dan Typo di Kode

Beberapa hal ini bikin fitur tidak jalan atau tampilan tidak sesuai. Sebaiknya dibenerin sebelum dikumpulkan.

| No | File | Masalah | Perbaikan |
| --- | --- | --- | --- |
| 1 | `anggota/list.html` | `id="seacrh-input"` typo, padahal `app.js` mencari `search-input`. Akibatnya pencarian di Daftar Anggota tidak jalan. Label juga masih "Cari Judul Buku". | Ganti ke `search-input` (di `for` dan `id`), ubah label jadi "Cari Nama Anggota". |
| 2 | `anggota/tambah.html` | Link nav `anggota/list.html` dan `anggota/tambah.html` salah, karena halaman ini sudah di dalam folder `anggota/`. Hasilnya error 404. | Ganti jadi `list.html` dan `tambah.html`. |
| 3 | `style.css` | Style `.error` dan `.search-box` berada di dalam `@media (max-width: 480px)`, jadi pesan error dan kotak cari hanya bertema di HP. | Pindahkan keduanya ke luar media query. |
| 4 | `index.html` | Ringkasan menulis Total Buku 12, padahal `buku.json` berisi 10 buku. | Ubah jadi 10, atau hitung otomatis dari JSON. |
| 5 | `buku.json` | Tahun `"20018"` (Normal People) harusnya `2018`. Typo juga: "FIlosofi Teras". `anggota.json`: "FItra Eri". | Betulkan ejaannya. |
| 6 | `buku/tambah.html` | Label `judul` huruf kecil, dan field `isbn` serta `kategori` tidak divalidasi di JS. | Ubah jadi "Judul". |
| 7 | `anggota/list.html` | `<title>` masih "Beranda". Footer semua halaman masih tertulis "Jobsheet 1". | Ganti judul dan footer ke Jobsheet 6. |
| 8 | `anggota/list.html` | Kotak cari berada di dalam `.table-responsive`, berbeda dengan halaman buku. | Pindahkan ke luar `div.table-responsive`. |
| 9 | `style.css` | `.btn-edit` dan `.btn-delete` sudah ditulis, tetapi JS memakai class `.btn-hapus` dan tombol Edit tanpa class. Tampilan tombol sebenarnya ditopang `:first-of-type` dan `:last-of-type`. | Tambahkan class `btn-edit` pada tombol Edit, dan ganti `.btn-delete` jadi `.btn-hapus` di CSS. |
| 10 | `index.html` vs halaman lain | Beranda memakai hamburger checkbox, halaman lain memakai tombol dan JS. Dua cara berbeda untuk fungsi yang sama. | Samakan, pakai versi tombol dan JS di semua halaman. |

Catatan tambahan: data yang diisi lewat form Tambah belum tersimpan ke mana pun (form tidak punya `action` dan tidak ada kode penyimpanan), dan tombol Hapus hanya menghapus baris di tampilan, jadi data muncul lagi setelah refresh. Itu normal untuk tahap ini karena belum ada backend atau database.
