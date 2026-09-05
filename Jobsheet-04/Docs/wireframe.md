# SIMPUS-Mini — Wireframe & User Flow

**Sub-CPMK:** Merancang UI/UX aplikasi (proyek)

Halaman yang sudah ada (Beranda, Daftar/Tambah Buku, Daftar/Tambah Anggota Jobsheet 1-3) belum mencakup fitur Login, Dashboard Petugas, dan Peminjaman/Pengembalian. Dokumen ini merancang wireframe untuk halaman-halaman tersebut, mengikuti struktur data dan penamaan field yang sudah dipakai di kode (`buku/list.html`, `buku/tambah.html`, `anggota/list.html`, `anggota/tambah.html`), sebelum diimplementasikan mulai Jobsheet 5 dan seterusnya.

## 1. Aktor Sistem

**Tamu**
- Hanya bisa melihat katalog buku (Beranda, Daftar Buku).
- Tidak perlu login.

**Petugas**
- Login untuk mengakses seluruh fitur.
- CRUD `anggota` (kolom: `no_anggota`, `nama`, `alamat`, `no_hp`)
- CRUD `buku` (kolom: `judul`, `pengarang`, `tahun`, `isbn`, `stok`, `kategori`)
- Peminjaman
- Pengembalian

## 2. User Flow

### A. User Flow — Peminjaman Buku

```
1. Petugas Login
   |
   v
2. Dashboard
   |
   v
3. Pilih "Peminjaman Baru"
   |
   v
4. Pilih Anggota
   |
   v
5. Pilih Buku (stok > 0)
   |
   v
6. Simpan
   |
   v
7. Stok berkurang 1
   |
   v
8. Kembali ke Dashboard
```

### B. User Flow — Pengembalian Buku

```
1. Dashboard
   |
   v
2. Menu "Pengembalian"
   |
   v
3. Cari transaksi aktif
   |
   v
4. Tandai "Dikembalikan"
   |
   v
5. Stok bertambah 1
   |
   v
6. Kembali ke Dashboard
```

## 3. Wireframe Halaman

### 3.1 Halaman Login

| Elemen | Tipe | Keterangan |
|---|---|---|
| Username | text input | required |
| Password | password input | required |
| Masuk | tombol submit | ke Dashboard bila berhasil |

```
 SIMPUS-Mini
 Login Petugas

 Username [......................]
 Password [......................]

           ( Masuk )

 Belum punya akun? Daftar di sini
```

### 3.2 Dashboard Petugas — Navbar Baru

Navbar yang sekarang ada di kode kamu:

```
Beranda | Daftar Buku | Tambah Buku | Daftar Anggota | Tambah Anggota
```

Navbar setelah petugas login (Jobsheet 10), tombol Tambah dipindah jadi tombol "+ Tambah" di dalam halaman Daftar (biar navbar tidak kepanjangan), lalu ditambah menu Peminjaman dan info sesi login:

```
Beranda | Buku | Anggota | Peminjaman .......... (Nama Petugas v)  [Logout]
```

Isi Dashboard-nya:

```
[ Total Buku ]   [ Total Anggota ]   [ Sedang Dipinjam ]

Aksi Cepat: ( + Peminjaman Baru )  ( + Pengembalian )

Transaksi Terbaru
Anggota (nama)   Buku (judul)   Tgl Pinjam   Status
------------------------------------------------------
...              ...            ...          Dipinjam / Selesai
                                    Lihat semua transaksi >
```

### 3.3 Form Peminjaman

| Field | Sumber | Catatan |
|---|---|---|
| Anggota | dropdown dari `anggota` (`no_anggota` — `nama`) | wajib pilih |
| Buku | dropdown dari `buku` (`judul`), filter `stok > 0` | buku stok 0 disembunyikan |
| Tanggal Pinjam | date, default hari ini | otomatis, bisa diedit |
| Simpan Peminjaman | tombol submit | `stok` buku berkurang 1, lalu redirect ke Dashboard |

### 3.4 Form Pengembalian

```
Cari transaksi aktif: [ nama anggota / judul buku ]

Anggota (nama)   Buku (judul)   Tgl Pinjam   Aksi
-----------------------------------------------------
...              ...            ...          ( Kembalikan )
```

Tombol **Kembalikan** hanya tampil jika status transaksi masih "Dipinjam". Klik tombol ini langsung memicu langkah 4-6 pada alur Pengembalian di atas.

### 3.5 Riwayat Peminjaman per Anggota

```
Riwayat Peminjaman — [nama]

Buku (judul)     Pinjam     Kembali    Status
-------------------------------------------------
...              ...        ...        Selesai
...              ...        -          Dipinjam

Keterangan: * Dipinjam  * Selesai  * Dikembalikan
```

## 4. Konsistensi Desain

- Warna aksen, tipografi navbar, dan gaya tabel/kartu mengikuti `assets/css/style.css` yang sudah dibangun sejak Jobsheet 2-3.
- Navbar akan ditambah menu Peminjaman dan indikator status login (nama petugas / tombol Logout) mulai implementasi di Jobsheet 10.
- Komponen UI (tabel, tombol, form, card) konsisten dengan desain yang sudah berjalan — tombol baru (Kembalikan, Peminjaman Baru) memakai kelas tombol yang sama seperti yang sudah ada di `buku/list.html` dan `anggota/list.html`.
- Tipografi yang digunakan tetap mengikuti style yang ada agar tampilan antarmuka tetap selaras dan profesional.

## 5. Validasi & Edge Case

- Buku dengan `stok = 0` tidak boleh dipilih di form peminjaman.
- Anggota dengan tunggakan/terlambat divalidasi saat peminjaman (implementasi di Jobsheet 12).
- `stok` buku otomatis berkurang saat peminjaman dan bertambah saat pengembalian.
- Transaksi hanya dapat dikembalikan jika status masih "Dipinjam".
- Hanya petugas yang login yang dapat mengakses fitur CRUD dan transaksi.

> **Catatan:** Seluruh wireframe ini adalah rancangan antarmuka. Implementasi akan dilakukan mulai Jobsheet 5 dan seterusnya.
