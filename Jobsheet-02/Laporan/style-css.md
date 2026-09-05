# PENJELASAN KODE CSS SIMPUS-MINI

## File `style.css`

| No. | Kode | Penjelasan |
|---:|---|---|
| 1 | `/* ===== Reset & Base ===== */` | Komentar untuk menandai bagian Reset dan Base CSS. Komentar tidak memengaruhi tampilan website. |
| 2 | `* {` | Selector universal yang memilih semua elemen HTML dan membuka blok CSS. |
| 3 | `box-sizing: border-box;` | Membuat ukuran elemen menghitung padding dan border ke dalam nilai width dan height. |
| 4 | `margin: 0;` | Menghilangkan margin bawaan dari semua elemen. |
| 5 | `padding: 0;` | Menghilangkan padding bawaan dari semua elemen. |
| 6 | `}` | Menutup blok CSS untuk selector universal. |
| 7 | `body {` | Memilih elemen `<body>` dan membuka aturan CSS untuk seluruh isi halaman. |
| 8 | `font-family: "Segoe UI", Arial, sans-serif;` | Menentukan jenis font yang digunakan. Browser akan mencoba Segoe UI, kemudian Arial, lalu font sans-serif jika font sebelumnya tidak tersedia. |
| 9 | `color: #4a4036;` | Menentukan warna teks utama menjadi cokelat gelap. |
| 10 | `background-color: #faf7f2;` | Memberikan warna background cream yang lembut pada halaman. |
| 11 | `line-height: 1.5;` | Mengatur jarak antarbaris teks menjadi 1,5 kali ukuran font. |
| 12 | `}` | Menutup aturan CSS untuk `body`. |
| 13 | `a {` | Memilih semua elemen link `<a>` dan membuka blok CSS. |
| 14 | `color: #9a6b3f;` | Memberikan warna cokelat pada link. |
| 15 | `text-decoration: none;` | Menghilangkan garis bawah bawaan pada link. |
| 16 | `transition: color 0.2s ease;` | Membuat perubahan warna link menjadi halus selama 0,2 detik. |
| 17 | `}` | Menutup aturan CSS untuk link. |
| 18 | `a:hover {` | Menentukan tampilan link ketika kursor mouse berada di atas link. |
| 19 | `color: #c08a58;` | Mengubah warna link menjadi cokelat yang lebih terang ketika di-hover. |
| 20 | `text-decoration: underline;` | Memberikan garis bawah pada link ketika mouse berada di atasnya. |
| 21 | `}` | Menutup aturan `a:hover`. |
| 22 | `/* ===== Header & Navbar (Flexbox) ===== */` | Komentar yang menandai bagian header dan navbar yang menggunakan Flexbox. |
| 23 | `header {` | Memilih elemen `<header>` dan membuka aturan CSS-nya. |
| 24 | `background-color: #a9784f;` | Memberikan warna cokelat caramel pada bagian header. |
| 25 | `color: #fffaf3;` | Mengatur warna teks header menjadi cream sangat terang. |
| 26 | `padding: 1rem 1.5rem;` | Memberikan jarak bagian dalam header sebesar 1rem untuk atas-bawah dan 1,5rem untuk kiri-kanan. |
| 27 | `display: flex;` | Mengaktifkan sistem layout Flexbox pada header. |
| 28 | `align-items: center;` | Menempatkan isi header secara vertikal di tengah. |
| 29 | `justify-content: space-between;` | Memberikan jarak antara elemen header sehingga berada di sisi yang berlawanan. |
| 30 | `flex-wrap: wrap;` | Mengizinkan isi header berpindah ke baris berikutnya jika ruang tidak cukup. |
| 31 | `}` | Menutup aturan CSS untuk `header`. |
| 32 | `header h1 {` | Memilih elemen `<h1>` yang berada di dalam `<header>`. |
| 33 | `font-size: 1.4rem;` | Mengatur ukuran tulisan judul header menjadi 1,4rem. |
| 34 | `}` | Menutup aturan CSS untuk `header h1`. |
| 35 | `header nav ul {` | Memilih `<ul>` yang berada di dalam navigasi header. |
| 36 | `list-style: none;` | Menghilangkan bullet atau tanda daftar bawaan dari `<ul>`. |
| 37 | `display: flex;` | Menggunakan Flexbox untuk menyusun menu navigasi secara horizontal. |
| 38 | `gap: 1.25rem;` | Memberikan jarak sebesar 1,25rem antar menu navigasi. |
| 39 | `}` | Menutup aturan CSS untuk `header nav ul`. |
| 40 | `header nav a {` | Memilih link `<a>` yang berada di dalam navigasi header. |
| 41 | `color: #fffaf3;` | Memberikan warna cream terang pada teks menu navigasi. |
| 42 | `font-weight: 500;` | Membuat teks menu sedikit lebih tebal. |
| 43 | `transition: opacity 0.2s ease;` | Membuat perubahan transparansi menu menjadi halus selama 0,2 detik. |
| 44 | `}` | Menutup aturan CSS untuk link navigasi. |
| 45 | `header nav a:hover {` | Menentukan tampilan menu navigasi ketika kursor diarahkan ke menu. |
| 46 | `opacity: 0.75;` | Membuat menu menjadi sedikit transparan ketika di-hover. |
| 47 | `}` | Menutup aturan `header nav a:hover`. |
| 48 | `/* ===== Main Layout ===== */` | Komentar yang menandai bagian layout utama halaman. |
| 49 | `main {` | Memilih elemen `<main>` sebagai area utama halaman. |
| 50 | `max-width: 1000px;` | Membatasi lebar maksimal area utama menjadi 1000 pixel. |
| 51 | `margin: 2rem auto;` | Memberikan margin atas-bawah sebesar 2rem dan membuat area utama berada di tengah secara horizontal. |
| 52 | `padding: 0 1.5rem;` | Memberikan padding kiri dan kanan sebesar 1,5rem tanpa padding atas dan bawah. |
| 53 | `}` | Menutup aturan CSS untuk `main`. |
| 54 | `section {` | Memilih semua elemen `<section>`. |
| 55 | `background-color: #fffdf9;` | Memberikan warna cream sangat terang pada section. |
| 56 | `border-radius: 10px;` | Membuat sudut section menjadi melengkung sebesar 10 pixel. |
| 57 | `padding: 1.5rem;` | Memberikan ruang di dalam section sebesar 1,5rem. |
| 58 | `margin-bottom: 1.5rem;` | Memberikan jarak sebesar 1,5rem di bawah setiap section. |
| 59 | `box-shadow: 0 2px 8px rgba(120, 90, 60, 0.08);` | Memberikan bayangan tipis pada section agar terlihat memiliki kedalaman. |
| 60 | `transition: transform 0.2s ease, box-shadow 0.2s ease;` | Membuat perubahan posisi dan bayangan section menjadi halus selama 0,2 detik. |
| 61 | `}` | Menutup aturan CSS untuk `section`. |
| 62 | `section:hover {` | Menentukan perubahan tampilan section ketika kursor berada di atasnya. |
| 63 | `transform: translateY(-2px);` | Menggerakkan section sedikit ke atas sebesar 2 pixel ketika di-hover. |
| 64 | `box-shadow: 0 5px 14px rgba(120, 90, 60, 0.12);` | Membuat bayangan section sedikit lebih terlihat ketika di-hover. |
| 65 | `}` | Menutup aturan `section:hover`. |
| 66 | `section h2 {` | Memilih elemen `<h2>` yang berada di dalam section. |
| 67 | `margin-bottom: 1rem;` | Memberikan jarak 1rem di bawah judul section. |
| 68 | `color: #8b5e3c;` | Memberikan warna cokelat pada judul section. |
| 69 | `}` | Menutup aturan CSS untuk `section h2`. |
| 70 | `/* ===== Kartu Statistik (CSS Grid) ===== */` | Komentar yang menandai bagian kartu statistik yang menggunakan CSS Grid. |
| 71 | `main section:nth-of-type(2) {` | Memilih section kedua yang berada di dalam elemen `<main>`. |
| 72 | `display: grid;` | Mengaktifkan CSS Grid pada section kedua. |
| 73 | `grid-template-columns: repeat(3, 1fr);` | Membagi area menjadi 3 kolom dengan ukuran yang sama. |
| 74 | `gap: 1rem;` | Memberikan jarak 1rem antara setiap kartu statistik. |
| 75 | `}` | Menutup aturan CSS untuk section statistik. |
| 76 | `main section:nth-of-type(2) article {` | Memilih setiap `<article>` yang berada di dalam section kedua pada `<main>`. |
| 77 | `background-color: #f5eadb;` | Memberikan warna cream/beige pada kartu statistik. |
| 78 | `border-radius: 10px;` | Membuat sudut kartu menjadi melengkung sebesar 10 pixel. |
| 79 | `padding: 1.25rem;` | Memberikan ruang di dalam kartu sebesar 1,25rem. |
| 80 | `text-align: center;` | Membuat teks di dalam kartu berada di tengah. |
| 81 | `transition: transform 0.2s ease, background-color 0.2s ease;` | Membuat perubahan posisi dan warna background kartu menjadi halus selama 0,2 detik. |
| 82 | `}` | Menutup aturan CSS untuk article statistik. |
| 83 | `main section:nth-of-type(2) article:hover {` | Menentukan perubahan kartu statistik ketika kursor diarahkan ke kartu. |
| 84 | `transform: translateY(-3px);` | Menggerakkan kartu sedikit ke atas sebesar 3 pixel ketika di-hover. |
| 85 | `background-color: #f1dfc8;` | Mengubah background kartu menjadi cream yang sedikit lebih gelap ketika di-hover. |
| 86 | `}` | Menutup aturan `article:hover`. |
| 87 | `main section:nth-of-type(2) article h3 {` | Memilih judul `<h3>` pada kartu statistik. |
| 88 | `font-size: 0.95rem;` | Mengatur ukuran font judul kartu menjadi 0,95rem. |
| 89 | `color: #806f5d;` | Memberikan warna cokelat keabu-abuan pada judul kartu. |
| 90 | `margin-bottom: 0.5rem;` | Memberikan jarak 0,5rem di bawah judul kartu. |
| 91 | `}` | Menutup aturan CSS untuk judul kartu. |
| 92 | `main section:nth-of-type(2) article p {` | Memilih paragraf `<p>` yang berada di dalam kartu statistik. |
| 93 | `font-size: 1.8rem;` | Membuat ukuran angka statistik menjadi 1,8rem. |
| 94 | `font-weight: 700;` | Membuat angka statistik menjadi tebal. |
| 95 | `color: #8b5e3c;` | Memberikan warna cokelat pada angka statistik. |
| 96 | `}` | Menutup aturan CSS untuk paragraf statistik. |
| 97 | `/* ===== Tabel ===== */` | Komentar yang menandai bagian styling tabel. |
| 98 | `table {` | Memilih semua elemen tabel `<table>`. |
| 99 | `width: 100%;` | Membuat tabel menggunakan seluruh lebar container yang tersedia. |
| 100 | `border-collapse: collapse;` | Menggabungkan border antar sel tabel sehingga terlihat lebih rapi. |
| 101 | `}` | Menutup aturan CSS untuk tabel. |
| 102 | `th, td {` | Memilih semua `<th>` dan `<td>` pada tabel. |
| 103 | `text-align: left;` | Membuat isi sel tabel rata kiri. |
| 104 | `padding: 0.65rem 0.75rem;` | Memberikan jarak di dalam sel sebesar 0,65rem untuk atas-bawah dan 0,75rem untuk kiri-kanan. |
| 105 | `border-bottom: 1px solid #e8ded1;` | Memberikan garis bawah setebal 1 pixel dengan warna beige pada setiap sel. |
| 106 | `}` | Menutup aturan CSS untuk `<th>` dan `<td>`. |
| 107 | `thead {` | Memilih bagian kepala tabel `<thead>`. |
| 108 | `background-color: #a9784f;` | Memberikan warna cokelat caramel pada header tabel. |
| 109 | `color: #fffaf3;` | Membuat teks header tabel berwarna cream terang. |
| 110 | `}` | Menutup aturan CSS untuk `<thead>`. |
| 111 | `tbody tr:nth-child(even) {` | Memilih baris tabel genap pada bagian `<tbody>`. |
| 112 | `background-color: #fcf8f2;` | Memberikan background cream sangat lembut pada baris genap. |
| 113 | `}` | Menutup aturan CSS untuk baris genap. |
| 114 | `tbody tr:hover {` | Menentukan tampilan baris tabel ketika kursor diarahkan ke baris tersebut. |
| 115 | `background-color: #f5eadb;` | Mengubah warna background baris menjadi beige ketika di-hover. |
| 116 | `}` | Menutup aturan `tbody tr:hover`. |
| 117 | `/* ===== Button ===== */` | Komentar yang menandai bagian styling tombol pada tabel. |
| 118 | `td button {` | Memilih semua tombol yang berada di dalam sel tabel `<td>`. |
| 119 | `padding: 0.35rem 0.7rem;` | Memberikan jarak di dalam tombol sebesar 0,35rem untuk atas-bawah dan 0,7rem untuk kiri-kanan. |
| 120 | `margin-right: 0.35rem;` | Memberikan jarak 0,35rem di sebelah kanan tombol. |
| 121 | `border: none;` | Menghilangkan border bawaan tombol. |
| 122 | `border-radius: 5px;` | Membuat sudut tombol menjadi sedikit melengkung sebesar 5 pixel. |
| 123 | `cursor: pointer;` | Mengubah bentuk cursor menjadi pointer ketika berada di atas tombol. |
| 124 | `font-size: 0.85rem;` | Mengatur ukuran tulisan tombol menjadi 0,85rem. |
| 125 | `transition: transform 0.2s ease, opacity 0.2s ease;` | Membuat perubahan posisi dan transparansi tombol menjadi halus selama 0,2 detik. |
| 126 | `}` | Menutup aturan CSS untuk tombol tabel. |
| 127 | `td button:hover {` | Menentukan perubahan tampilan tombol ketika kursor berada di atasnya. |
| 128 | `transform: translateY(-1px);` | Menggerakkan tombol sedikit ke atas sebesar 1 pixel ketika di-hover. |
| 129 | `opacity: 0.85;` | Membuat tombol sedikit transparan ketika di-hover. |
| 130 | `}` | Menutup aturan `td button:hover`. |
| 131 | `td button:first-of-type {` | Memilih tombol pertama yang berada di dalam setiap sel tabel. |
| 132 | `background-color: #d69a4c;` | Memberikan warna gold/caramel pada tombol pertama, yaitu tombol Edit. |
| 133 | `color: #fff;` | Membuat teks tombol Edit berwarna putih. |
| 134 | `}` | Menutup aturan CSS tombol pertama. |
| 135 | `td button:last-of-type {` | Memilih tombol terakhir yang berada di dalam setiap sel tabel. |
| 136 | `background-color: #c96f5b;` | Memberikan warna terracotta pada tombol terakhir, yaitu tombol Hapus. |
| 137 | `color: #fff;` | Membuat teks tombol Hapus berwarna putih. |
| 138 | `}` | Menutup aturan CSS tombol terakhir. |
| 139 | `/* ===== Form ===== */` | Komentar yang menandai bagian styling form. |
| 140 | `form p {` | Memilih elemen paragraf `<p>` yang berada di dalam form. |
| 141 | `margin-bottom: 1rem;` | Memberikan jarak 1rem di bawah setiap paragraf pada form. |
| 142 | `}` | Menutup aturan CSS untuk paragraf form. |
| 143 | `form label {` | Memilih label yang berada di dalam form. |
| 144 | `display: block;` | Membuat label menjadi elemen block sehingga menempati satu baris penuh. |
| 145 | `margin-bottom: 0.35rem;` | Memberikan jarak 0,35rem antara label dan input. |
| 146 | `font-weight: 600;` | Membuat teks label menjadi cukup tebal. |
| 147 | `color: #5c5146;` | Memberikan warna cokelat gelap pada label. |
| 148 | `}` | Menutup aturan CSS untuk label. |
| 149 | `form input,` | Memilih elemen input yang berada di dalam form. Koma menunjukkan selector berikutnya juga menggunakan aturan yang sama. |
| 150 | `form select {` | Memilih elemen `<select>` di dalam form dan menggabungkan aturannya dengan `form input`. |
| 151 | `width: 100%;` | Membuat input dan select menggunakan seluruh lebar container yang tersedia. |
| 152 | `max-width: 400px;` | Membatasi lebar maksimal input dan select menjadi 400 pixel. |
| 153 | `padding: 0.55rem 0.7rem;` | Memberikan ruang di dalam input dan select sebesar 0,55rem untuk atas-bawah dan 0,7rem untuk kiri-kanan. |
| 154 | `border: 1px solid #d8cabb;` | Memberikan border setebal 1 pixel dengan warna beige. |
| 155 | `border-radius: 5px;` | Membuat sudut input dan select menjadi sedikit melengkung. |
| 156 | `font-size: 1rem;` | Mengatur ukuran teks input dan select menjadi 1rem. |
| 157 | `transition: border-color 0.2s ease, box-shadow 0.2s ease;` | Membuat perubahan warna border dan shadow menjadi halus selama 0,2 detik. |
| 158 | `}` | Menutup aturan CSS untuk input dan select. |
| 159 | `form input:focus,` | Memilih input ketika sedang aktif atau sedang digunakan untuk mengetik. |
| 160 | `form select:focus {` | Memilih select ketika sedang aktif dan menggabungkannya dengan aturan `input:focus`. |
| 161 | `outline: none;` | Menghilangkan outline bawaan browser ketika input atau select aktif. |
| 162 | `border-color: #b8895f;` | Mengubah warna border menjadi cokelat ketika input atau select aktif. |
| 163 | `box-shadow: 0 0 0 3px rgba(184, 137, 95, 0.15);` | Memberikan efek bayangan tipis di sekitar input atau select ketika sedang aktif. |
| 164 | `}` | Menutup aturan CSS untuk input dan select yang sedang aktif. |
| 165 | `form button[type="submit"] {` | Memilih tombol submit yang berada di dalam form. |
| 166 | `background-color: #a9784f;` | Memberikan warna cokelat caramel pada tombol Simpan. |
| 167 | `color: #fffaf3;` | Membuat teks tombol Simpan berwarna cream terang. |
| 168 | `border: none;` | Menghilangkan border bawaan tombol. |
| 169 | `padding: 0.6rem 1.5rem;` | Memberikan jarak di dalam tombol sebesar 0,6rem untuk atas-bawah dan 1,5rem untuk kiri-kanan. |
| 170 | `border-radius: 5px;` | Membuat sudut tombol sedikit melengkung. |
| 171 | `font-size: 1rem;` | Mengatur ukuran tulisan tombol menjadi 1rem. |
| 172 | `cursor: pointer;` | Mengubah cursor menjadi pointer ketika diarahkan ke tombol. |
| 173 | `transition: background-color 0.2s ease, transform 0.2s ease;` | Membuat perubahan warna dan posisi tombol menjadi halus selama 0,2 detik. |
| 174 | `}` | Menutup aturan CSS untuk tombol submit. |
| 175 | `form button[type="submit"]:hover {` | Menentukan tampilan tombol submit ketika kursor diarahkan ke tombol. |
| 176 | `background-color: #8b5e3c;` | Mengubah warna tombol menjadi cokelat lebih gelap ketika di-hover. |
| 177 | `transform: translateY(-1px);` | Menggerakkan tombol sedikit ke atas sebesar 1 pixel ketika di-hover. |
| 178 | `}` | Menutup aturan `form button[type="submit"]:hover`. |
| 179 | `/* ===== Footer ===== */` | Komentar yang menandai bagian footer halaman. |
| 180 | `footer {` | Memilih elemen `<footer>` dan membuka aturan CSS-nya. |
| 181 | `text-align: center;` | Membuat teks footer berada di tengah. |
| 182 | `padding: 1.25rem;` | Memberikan ruang di dalam footer sebesar 1,25rem. |
| 183 | `color: #8a7b6c;` | Memberikan warna cokelat keabu-abuan pada teks footer. |
| 184 | `font-size: 0.9rem;` | Mengatur ukuran teks footer menjadi 0,9rem. |
| 185 | `}` | Menutup aturan CSS untuk `footer`. |
