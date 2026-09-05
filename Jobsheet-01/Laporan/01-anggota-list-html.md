## 1. File `anggota/list.html`

| No. | Kode | Penjelasan |
|---:|---|---|
| 1 | `<!DOCTYPE html>` | Menentukan bahwa dokumen menggunakan standar HTML5. |
| 2 | `<html lang="id">` | Membuka dokumen HTML dan menentukan bahasa halaman sebagai Bahasa Indonesia. |
| 3 | `<head>` | Membuka bagian head yang berisi informasi mengenai dokumen HTML. |
| 4 | `<meta charset="UTF-8">` | Menentukan karakter encoding UTF-8 agar karakter dapat ditampilkan dengan benar. |
| 5 | `<tittle>SIMPUS-Mini \| Beranda</tittle>` | Menentukan judul halaman browser. |
| 6 | `</head>` | Menutup bagian head. |
| 7 | `<body>` | Membuka bagian body yang berisi konten yang ditampilkan pada browser. |
| 8 | `<header>` | Membuka bagian header halaman. |
| 9 | `<h1>SIMPUS-Mini</h1>` | Menampilkan judul utama website SIMPUS-Mini. |
| 10 | `<nav>` | Membuka bagian navigasi website. |
| 11 | `<ul>` | Membuat daftar tidak berurutan untuk menu navigasi. |
| 12 | `<li><a href="../index.html">Beranda</a></li>` | Membuat menu Beranda yang mengarah ke file `index.html` satu folder di atas. |
| 13 | `<li><a href="../buku/list.html">Daftar Buku</a></li>` | Membuat menu Daftar Buku yang mengarah ke halaman daftar buku. |
| 14 | `<li><a href="list.html">Daftar Anggota</a></li>` | Membuat menu Daftar Anggota yang mengarah ke halaman `list.html` pada folder yang sama. |
| 15 | `<li><a href="tambah.html">Tambah Anggota</a></li>` | Membuat menu untuk menuju halaman tambah anggota. |
| 16 | `</ul>` | Menutup daftar menu navigasi. |
| 17 | `</nav>` | Menutup bagian navigasi. |
| 18 | `</header>` | Menutup bagian header. |
| 19 | `<main>` | Membuka bagian utama halaman. |
| 20 | `<section>` | Membuka sebuah section untuk mengelompokkan konten daftar anggota. |
| 21 | `<h2>Daftar Anggota</h2>` | Menampilkan judul bagian Daftar Anggota. |
| 22 | `<table>` | Membuat tabel untuk menampilkan data anggota. |
| 23 | `<thead>` | Membuka bagian kepala tabel. |
| 24 | `<tr>` | Membuat satu baris pada tabel. |
| 25 | `<th>No. Anggota</th>` | Membuat kolom header untuk nomor anggota. |
| 26 | `<th>Nama</th>` | Membuat kolom header untuk nama anggota. |
| 27 | `<th>Alamat</th>` | Membuat kolom header untuk alamat anggota. |
| 28 | `<th>No. HP</th>` | Membuat kolom header untuk nomor HP anggota. |
| 29 | `<th>Aksi</th>` | Membuat kolom header untuk tombol aksi. |
| 30 | `</tr>` | Menutup baris header tabel. |
| 31 | `</thead>` | Menutup bagian kepala tabel. |
| 32 | `<tbody>` | Membuka bagian isi tabel. |
| 33 | `<tr>` | Membuat baris data anggota pertama. |
| 34 | `<td>A001</td>` | Menampilkan nomor anggota A001. |
| 35 | `<td>Al Fath Raya Maulana</td>` | Menampilkan nama anggota. |
| 36 | `<td>Malang</td>` | Menampilkan alamat anggota. |
| 37 | `<td>0812xxxxxx</td>` | Menampilkan nomor HP anggota. |
| 38 | `<td>` | Membuka kolom untuk aksi. |
| 39 | `<button type="button">Edit</button>` | Membuat tombol Edit untuk data anggota. |
| 40 | `<button type="button">hapus</button>` | Membuat tombol Hapus untuk data anggota. |
| 41 | `</td>` | Menutup kolom aksi. |
| 42 | `</tr>` | Menutup baris data anggota. |
| 43 | `<tr>` | Membuat baris data anggota kedua. |
| 44 | `<td>A002</td>` | Menampilkan nomor anggota A002. |
| 45 | `<td>Angel</td>` | Menampilkan nama anggota. |
| 46 | `<td>Jakarta</td>` | Menampilkan alamat anggota. |
| 47 | `<td>0813xxxxxx</td>` | Menampilkan nomor HP anggota. |
| 48 | `<td>` | Membuka kolom aksi. |
| 49 | `<button type="button">Edit</button>` | Membuat tombol Edit. |
| 50 | `<button type="button">hapus</button>` | Membuat tombol Hapus. |
| 51 | `</td>` | Menutup kolom aksi. |
| 52 | `</tr>` | Menutup baris data anggota. |
| 53 | `<tr>` | Membuat baris data anggota ketiga. |
| 54 | `<td>A003</td>` | Menampilkan nomor anggota A003. |
| 55 | `<td>javier</td>` | Menampilkan nama anggota Javier. |
| 56 | `<td>Semarang</td>` | Menampilkan alamat anggota. |
| 57 | `<td>0812xxxxxx</td>` | Menampilkan nomor HP anggota. |
| 58 | `<td>` | Membuka kolom aksi. |
| 59 | `<button type="button">Edit</button>` | Membuat tombol Edit. |
| 60 | `<button type="button">hapus</button>` | Membuat tombol Hapus. |
| 61 | `</td>` | Menutup kolom aksi. |
| 62 | `</tr>` | Menutup baris data anggota. |
| 63 | `<tr>` | Membuat baris data anggota keempat. |
| 64 | `<td>A004</td>` | Menampilkan nomor anggota A004. |
| 65 | `<td>Gofar Hilman</td>` | Menampilkan nama anggota. |
| 66 | `<td>Bekasi</td>` | Menampilkan alamat anggota. |
| 67 | `<td>0813xxxxxx</td>` | Menampilkan nomor HP anggota. |
| 68 | `<td>` | Membuka kolom aksi. |
| 69 | `<button type="button">Edit</button>` | Membuat tombol Edit. |
| 70 | `<button type="button">hapus</button>` | Membuat tombol Hapus. |
| 71 | `</td>` | Menutup kolom aksi. |
| 72 | `</tr>` | Menutup baris data anggota. |
| 73 | `<tr>` | Membuat baris data anggota kelima. |
| 74 | `<td>A005</td>` | Menampilkan nomor anggota A005. |
| 75 | `<td>Maulana Wancoy</td>` | Menampilkan nama anggota. |
| 76 | `<td>Bogor</td>` | Menampilkan alamat anggota. |
| 77 | `<td>0812xxxxxx</td>` | Menampilkan nomor HP anggota. |
| 78 | `<td>` | Membuka kolom aksi. |
| 79 | `<button type="button">Edit</button>` | Membuat tombol Edit. |
| 80 | `<button type="button">hapus</button>` | Membuat tombol Hapus. |
| 81 | `</td>` | Menutup kolom aksi. |
| 82 | `</tr>` | Menutup baris data anggota. |
| 83 | `<tr>` | Membuat baris data anggota keenam. |
| 84 | `<td>A006</td>` | Menampilkan nomor anggota A006. |
| 85 | `<td>Fitra Eri</td>` | Menampilkan nama anggota. |
| 86 | `<td>Depok</td>` | Menampilkan alamat anggota. |
| 87 | `<td>0813xxxxxx</td>` | Menampilkan nomor HP anggota. |
| 88 | `<td>` | Membuka kolom aksi. |
| 89 | `<button type="button">Edit</button>` | Membuat tombol Edit. |
| 90 | `<button type="button">hapus</button>` | Membuat tombol Hapus. |
| 91 | `</td>` | Menutup kolom aksi. |
| 92 | `</tr>` | Menutup baris data anggota. |
| 93 | `<tr>` | Membuat baris data anggota ketujuh. |
| 94 | `<td>A007</td>` | Menampilkan nomor anggota A007. |
| 95 | `<td>Keenan Inara</td>` | Menampilkan nama anggota. |
| 96 | `<td>Tangerang</td>` | Menampilkan alamat anggota. |
| 97 | `<td>0813xxxxxx</td>` | Menampilkan nomor HP anggota. |
| 98 | `<td>` | Membuka kolom aksi. |
| 99 | `<button type="button">Edit</button>` | Membuat tombol Edit. |
| 100 | `<button type="button">hapus</button>` | Membuat tombol Hapus. |
| 101 | `</td>` | Menutup kolom aksi. |
| 102 | `</tr>` | Menutup baris data anggota. |
| 103 | `<tr>` | Membuat baris data anggota kedelapan. |
| 104 | `<td>A008</td>` | Menampilkan nomor anggota A008. |
| 105 | `<td>Luthfi Halimawan</td>` | Menampilkan nama anggota. |
| 106 | `<td>Bandung</td>` | Menampilkan alamat anggota. |
| 107 | `<td>0812xxxxxx</td>` | Menampilkan nomor HP anggota. |
| 108 | `<td>` | Membuka kolom aksi. |
| 109 | `<button type="button">Edit</button>` | Membuat tombol Edit. |
| 110 | `<button type="button">hapus</button>` | Membuat tombol Hapus. |
| 111 | `</td>` | Menutup kolom aksi. |
| 112 | `</tr>` | Menutup baris data anggota. |
| 113 | `</tbody>` | Menutup bagian isi tabel. |
| 114 | `</table>` | Menutup tabel daftar anggota. |
| 115 | `</section>` | Menutup section daftar anggota. |
| 116 | `</main>` | Menutup bagian utama halaman. |
| 117 | `<footer>` | Membuka bagian footer halaman. |
| 118 | `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 1</p>` | Menampilkan informasi copyright dan nama jobsheet. |
| 119 | `</footer>` | Menutup footer. |
| 120 | `</body>` | Menutup bagian body. |
| 121 | `</html>` | Menutup dokumen HTML. |
