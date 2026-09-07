# Jobsheet 3  Catatan Responsive Design (CSS)

## Studi Kasus: SIMPUS-Mini

CSS responsive digunakan untuk membuat tampilan website dapat menyesuaikan ukuran layar perangkat, baik desktop, tablet, maupun smartphone.

---

## Tabel Responsif

`.table-responsive` digunakan pada halaman daftar buku dan daftar anggota untuk membuat tabel dapat digeser secara horizontal apabila ukuran tabel lebih lebar daripada layar.

```css
.table-responsive {
    width: 100%;
    overflow-x: auto;
}
```

---

## Navigasi Responsive

`.nav-toggle` dan `.nav-toggle-label` digunakan untuk membuat navigasi hamburger pada perangkat dengan layar kecil. Pada tampilan desktop, keduanya disembunyikan karena menu navigasi ditampilkan secara normal.

```css
.nav-toggle {
    display: none;
}

.nav-toggle-label {
    display: none;
    font-size: 1.6rem;
    color: #fff;
    cursor: pointer;
}
```

Pada layar mobile, tombol hamburger akan ditampilkan. Ketika tombol tersebut dipilih, checkbox `.nav-toggle` menjadi aktif dan menu navigasi akan ditampilkan menggunakan selector:

```css
.nav-toggle:checked ~ nav {
    display: block;
}
```

Dengan cara ini, menu navigasi dapat dibuka dan ditutup tanpa menggunakan JavaScript.

---

## Responsive Tablet (`max-width: 768px`)

Pada ukuran layar maksimal 768px, tampilan kartu statistik yang menggunakan grid (semula 3 kolom) diubah menjadi 2 kolom:

```css
@media (max-width: 768px) {
    main section:nth-of-type(2) {
        grid-template-columns: repeat(2, 1fr);
    }
}
```

Hal ini dilakukan agar tampilan tetap rapi pada perangkat tablet.

---

## Responsive Mobile (`max-width: 480px`)

Pada ukuran layar maksimal 480px, beberapa penyesuaian dilakukan, yaitu:

- **Header** menggunakan `position: relative` agar elemen di dalamnya (termasuk menu yang di-toggle) dapat diposisikan dengan baik.
- **Tombol hamburger** ditampilkan sebagai pengganti menu navigasi biasa, lewat `.nav-toggle-label { display: block; }`.
- **Menu navigasi** (`header nav`) disembunyikan terlebih dahulu (`display: none`), diberi `width: 100%` dan `order: 3` agar turun ke bawah header, lalu akan muncul (`display: block`) ketika checkbox `.nav-toggle` dalam kondisi `checked`.
- **Menu navigasi** diubah menjadi susunan vertikal menggunakan `flex-direction: column` pada `header nav ul`.
- **Kartu statistik** (grid) diubah menjadi 1 kolom menggunakan `grid-template-columns: 1fr`.
- **Tabel responsif** tetap dipertahankan dengan `overflow-x: auto` agar tabel bisa digeser horizontal di layar sempit.
- **Input teks dan select** pada form dibatasi `max-width: 100%` dari lebar container agar tidak melebihi layar.

```css
@media (max-width: 480px) {
    header {
        position: relative;
    }

    .nav-toggle-label {
        display: block;
    }

    header nav {
        display: none;
        width: 100%;
        order: 3;
        margin-top: 1rem;
    }

    .nav-toggle:checked ~ nav {
        display: block;
    }

    header nav ul {
        flex-direction: column;
        gap: 0.75rem;
    }

    main section:nth-of-type(2) {
        grid-template-columns: 1fr;
    }

    .table-responsive {
        overflow-x: auto;
    }
}

form input,
form select {
    max-width: 100%;
}
```

---

## Kesimpulan

Penerapan responsive design bertujuan agar website tetap nyaman digunakan pada berbagai ukuran layar. Website akan menyesuaikan tata letak berdasarkan perangkat yang digunakan:

- **Desktop** / tampilan penuh dengan menu navigasi horizontal dan kartu statistik 3 kolom
- **Tablet** (≤768px) / kartu statistik disusun menjadi 2 kolom
- **Mobile** (≤480px) / menu navigasi diganti tombol hamburger, kartu statistik menjadi 1 kolom, dan elemen form dibatasi lebarnya agar tidak melebihi layar
