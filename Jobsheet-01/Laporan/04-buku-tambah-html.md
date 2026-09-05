# 4. File `buku/tambah.html`

| No. | Kode | Penjelasan |
|---:|---|---|
| 1 | `<!DOCTYPE html>` | Menentukan dokumen menggunakan HTML5. |
| 2 | `<html lang="id">` | Membuka dokumen HTML dan menentukan bahasa sebagai Bahasa Indonesia. |
| 3 | `<head>` | Membuka bagian head. |
| 4 | `<meta charset="UTF-8">` | Menentukan encoding karakter UTF-8. |
| 5 | `<title>SIMPUS-Mini \| Tambah Buku</title>` | Menentukan judul halaman pada tab browser. |
| 6 | `</head>` | Menutup head. |
| 7 | `<body>` | Membuka bagian body. |
| 8 | `<header>` | Membuka header. |
| 9 | `<h1>SIMPUS-Mini</h1>` | Menampilkan judul utama website. |
| 10 | `<nav>` | Membuka bagian navigasi. |
| 11 | `<ul>` | Membuat daftar menu navigasi. |
| 12 | `<li><a href="../index.html">Beranda</a></li>` | Membuat menu Beranda. |
| 13 | `<li><a href="list.html">Daftar Buku</a></li>` | Membuat menu Daftar Buku. |
| 14 | `<li><a href="tambah.html">Tambah Buku</a></li>` | Membuat menu Tambah Buku. |
| 15 | `<li><a href="../anggota/list.html">Daftar Anggota</a></li>` | Membuat menu Daftar Anggota. |
| 16 | `</ul>` | Menutup daftar menu. |
| 17 | `</nav>` | Menutup navigasi. |
| 18 | `</header>` | Menutup header. |
| 19 | `<main>` | Membuka bagian utama halaman. |
| 20 | `<section>` | Membuka section untuk form tambah buku. |
| 21 | `<h2>Tambah Buku</h2>` | Menampilkan judul Tambah Buku. |
| 22 | `<form>` | Membuka form input data buku. |
| 23 | `<p>` | Membuka paragraf input judul. |
| 24 | `<label for="judul">judul</label><br>` | Membuat label untuk input judul. |
| 25 | `<input type="text" id="judul" name="judul" required>` | Membuat input teks untuk judul. |
| 26 | `</p>` | Menutup paragraf input judul. |
| 27 | `<p>` | Membuka paragraf pengarang. |
| 28 | `<label for="pengarang">Pengarang</label><br>` | Membuat label pengarang. |
| 29 | `<input type="text" id="pengarang" name="pengarang" required>` | Membuat input teks untuk nama pengarang dan wajib diisi. |
| 30 | `</p>` | Menutup paragraf pengarang. |
| 31 | `<p>` | Membuka paragraf tahun terbit. |
| 32 | `<label for="tahun">Tahun Terbit</label><br>` | Membuat label tahun terbit. |
| 33 | `<input type="number" id="tahun" name="tahun" min="1900" max="2026" required>` | Membuat input angka tahun terbit dengan batas 1900 sampai 2026 dan wajib diisi. |
| 34 | `</p>` | Menutup paragraf tahun. |
| 35 | `<p>` | Membuka paragraf ISBN. |
| 36 | `<label for="isbn">ISBN</label><br>` | Membuat label ISBN. |
| 37 | `<input type="text" id="isbn" name="isbn" required>` | Membuat input teks ISBN dan wajib diisi. |
| 38 | `</p>` | Menutup paragraf ISBN. |
| 39 | `<p>` | Membuka paragraf stok. |
| 40 | `<label for="stok">Stok</label><br>` | Membuat label stok. |
| 41 | `<input type="number" id="stok" name="stok" min="0" required>` | Membuat input angka stok dengan nilai minimum 0 dan wajib diisi. |
| 42 | `</p>` | Menutup paragraf. |
| 43 | `<p>` | Membuka paragraf kategori. |
| 44 | `<label for="kategori">Kategori</label><br>` | Membuat label kategori. |
| 45 | `<select id="kategori" name="kategori">` | Membuat dropdown untuk memilih kategori buku. |
| 46 | `<option value="fiksi">Fiksi</option>` | Membuat pilihan kategori Fiksi. |
| 47 | `<option value="non-fiksi">Non-Fiksi</option>` | Membuat pilihan kategori Non-Fiksi. |
| 48 | `<option value="referensi">Referensi</option>` | Membuat pilihan kategori Referensi. |
| 49 | `</select>` | Menutup dropdown kategori. |
| 50 | `</p>` | Menutup paragraf kategori. |
| 51 | `<p>` | Membuka paragraf tombol. |
| 52 | `<button type="submit">Simpan</button>` | Membuat tombol untuk mengirim atau menyimpan data buku. |
| 53 | `</p>` | Menutup paragraf tombol. |
| 54 | `</form>` | Menutup form. |
| 55 | `</section>` | Menutup section. |
| 56 | `</main>` | Menutup bagian utama. |
| 57 | `<footer>` | Membuka footer. |
| 58 | `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 1</p>` | Menampilkan copyright dan informasi jobsheet. |
| 59 | `</footer>` | Menutup footer. |
| 60 | `</body>` | Menutup body. |
| 61 | `</html>` | Menutup dokumen HTML. |