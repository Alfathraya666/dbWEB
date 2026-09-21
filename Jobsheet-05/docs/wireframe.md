# SIMPUS-Mini  Wireframe & User Flow (Jobsheet 5)

**Sub-CPMK:** Menambahkan interaktivitas (JavaScript) pada antarmuka yang sudah ada

Berbeda dari Jobsheet sebelumnya yang murni statis (HTML + CSS), Jobsheet 5 **tidak menambah halaman baru**, tapi menambahkan perilaku (behavior) di atas halaman yang sudah ada: `index.html`, `buku/list.html`, `buku/tambah.html`, `anggota/list.html`, `anggota/tambah.html`. Semua logika ditulis di `assets/js/app.js` dan dijalankan lewat event `DOMContentLoaded`.

Ada 4 fitur interaktif yang ditambahkan:
1. Hamburger menu (nav toggle)
2. Konfirmasi hapus (front-end only)
3. Filter/pencarian tabel real-time
4. Validasi form sisi klien (client-side)

## 1. Komponen yang Terdampak

| Fitur | Halaman yang terdampak | Elemen terkait |
|---|---|---|
| Nav toggle | Semua halaman (header sama di tiap halaman) | `#nav-toggle-btn`, `header nav` |
| Konfirmasi hapus | `buku/list.html`, `anggota/list.html` | tombol `.btn-hapus`, baris `<tr>` |
| Filter tabel | `buku/list.html`, `anggota/list.html` | `#search-input`, `.table-responsive table` |
| Validasi form | `buku/tambah.html`, `anggota/tambah.html` | `#form-tambah`, field `judul`/`nama`, `pengarang`, `tahun`, `stok` |

## 2. User Flow

### A. User Flow — Nav Toggle (Mobile)

```
1. Pengguna buka SIMPUS-Mini di layar sempit (mobile)
   |
   v
2. Navbar (<nav>) tersembunyi, hanya ikon hamburger (☰) yang tampil
   |
   v
3. Klik ikon hamburger
   |
   v
4. class "nav-open" ditambahkan ke <nav>
   |
   v
5. Menu navigasi muncul (dropdown di bawah header)
   |
   v
6. Klik lagi ikon hamburger -> class "nav-open" dihapus -> menu tertutup
```

### B. User Flow — Hapus Data (Front-end Only)

```
1. Petugas berada di Daftar Buku / Daftar Anggota
   |
   v
2. Klik tombol "Hapus" pada salah satu baris
   |
   v
3. Muncul dialog konfirmasi browser: 'Yakin ingin menghapus "<nama/judul>"?'
   |
   v
4a. Klik "Batal" -> tidak terjadi apa-apa, baris tetap ada
   |
4b. Klik "OK" -> baris (<tr>) langsung dihapus dari tabel (DOM only)
```

> **Catatan:** Ini baru hapus di tampilan (DOM), belum terhubung ke data/server. Kalau halaman di-refresh, baris akan muncul lagi karena sumber data (`buku.json` / data statis) tidak berubah.

### C. User Flow — Pencarian/Filter Tabel

```
1. Petugas berada di Daftar Buku / Daftar Anggota
   |
   v
2. Ketik kata kunci di kolom "Cari Judul Buku" / "Cari Anggota"
   |
   v
3. Setiap kali tombol dilepas (keyup), semua baris tabel dicek
   |
   v
4. Baris yang teksnya (gabungan seluruh kolom) mengandung kata kunci -> tetap tampil
   |
   v
5. Baris yang tidak cocok -> disembunyikan (display: none)
   |
   v
6. Kolom kosong -> semua baris tampil kembali
```

### D. User Flow — Validasi Form Tambah

```
1. Petugas mengisi form Tambah Buku / Tambah Anggota
   |
   v
2. Klik tombol "Simpan" (submit)
   |
   v
3. JS mengecek tiap field wajib sebelum form benar-benar terkirim
   |
   v
4a. Ada field kosong/tidak valid:
    - Judul/Nama kosong -> "Field ini wajib diisi."
    - Pengarang kosong -> "Pengarang wajib diisi."
    - Tahun di luar 1900-2026 -> "Tahun harus di antara 1900-2026."
    - Stok negatif -> "Stok tidak boleh negatif."
    -> pesan error muncul di bawah field, submit dibatalkan (preventDefault)
   |
4b. Semua field valid -> form lanjut submit (belum ke server, masih Jobsheet 5)
```

## 3. Wireframe Perilaku (Behavior Spec)

### 3.1 Header — Nav Toggle

```
[Desktop, layar lebar]
 SIMPUS-Mini      Beranda | Daftar Buku | Tambah Buku | Daftar Anggota

[Mobile, layar sempit — nav tertutup]
 SIMPUS-Mini                                                    [☰]

[Mobile, setelah diklik — nav terbuka]
 SIMPUS-Mini                                                    [☰]
 ------------------------------------------------
 Beranda
 Daftar Buku
 Tambah Buku
 Daftar Anggota
```

### 3.2 Baris Tabel — Sebelum & Sesudah Hapus

```
Sebelum:
Judul                          Pengarang        Tahun   Stok   Aksi
--------------------------------------------------------------------
The Answer                     Alan & Barbara   2018    5      (Edit) (Hapus)
Anatomic Habits                James Clear      2018    2      (Edit) (Hapus)

--- klik "Hapus" pada baris "The Answer" -> konfirmasi "OK" ---

Sesudah:
Judul                          Pengarang        Tahun   Stok   Aksi
--------------------------------------------------------------------
Anatomic Habits                James Clear      2018    2      (Edit) (Hapus)
```

### 3.3 Filter Tabel

```
Cari Judul Buku [ money.......... ]

Judul                          Pengarang        Tahun   Stok   Aksi
--------------------------------------------------------------------
The Psychology Of Money        Morgan Housel    2020    1      (Edit) (Hapus)

(baris lain disembunyikan karena tidak mengandung kata "money")
```

### 3.4 Form dengan Pesan Error

```
Judul
[......................................]
⚠ Field ini wajib diisi.

Pengarang
[......................................]
⚠ Pengarang wajib diisi.

Tahun Terbit
[ 1899 ]
⚠ Tahun harus di antara 1900-2026.

Stok
[ -2 ]
⚠ Stok tidak boleh negatif.

            ( Simpan )
```

## 4. Konsistensi Desain

- Style pesan error (`.error`) mengikuti palet warna yang sama dengan aksen halaman lain di `assets/css/style.css` (butuh perbaikan kecil: nilai `color: d9534f;` di CSS belum diberi tanda pagar `#`, jadi warna teks error saat ini tidak terbaca sebagai merah oleh browser).
- Perilaku hover/transisi tombol (`Edit`, `Hapus`, `Simpan`) tetap memakai style tombol yang sudah ada, tidak ada tombol baru yang diperkenalkan di Jobsheet 5.
- Ikon hamburger (`#nav-toggle-btn`) menggantikan pendekatan checkbox-hack (`#nav-toggle`) yang dipakai di `index.html` lama — perlu disamakan di semua halaman karena saat ini `index.html` masih pakai `<input type="checkbox" id="nav-toggle">` sedangkan halaman lain (`buku/list.html`, `anggota/tambah.html`, dst.) sudah pakai `<button id="nav-toggle-btn">`. Ini bikin toggle menu tidak konsisten antar halaman.

## 5. Validasi & Edge Case

- Konfirmasi hapus memakai `confirm()` bawaan browser — belum ada pembatalan otomatis jika data sedang dipakai transaksi (baru relevan mulai fitur Peminjaman).
- Filter tabel bersifat case-insensitive dan mencocokkan seluruh isi baris (`row.textContent`), bukan hanya kolom judul/nama — perlu dicek apakah ini sesuai kebutuhan atau harus dibatasi ke satu kolom saja.
- Validasi form saat ini hanya jalan di form dengan `id="form-tambah"`; field `judul` di form Buku dan field `nama` di form Anggota dicek lewat selector gabungan `[name='judul'], [name='nama']` — perlu dipastikan tidak bentrok kalau nanti ada form lain dengan `id` yang sama.
- Validasi hanya sisi klien (client-side); belum ada validasi ulang di sisi server/data karena backend belum diimplementasikan.

> **Catatan:** Bagian Jobsheet 6 akan ditambahkan menyusul setelah kode untuk jobsheet tersebut dikirim.
