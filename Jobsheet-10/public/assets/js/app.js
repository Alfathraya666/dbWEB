function initHapusConfirm() {
    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".btn-hapus");
        if (!btn) return;

        const card = btn.closest(".car-card, .customer-card");
        const nama = card ? card.querySelector("h3")?.textContent.trim() : "data ini";
        const yakin = confirm("Yakin ingin menghapus \"" + nama + "\"?");
        if (yakin) {
            window.location.href = "hapus.php?id=" + btn.dataset.id;
        }
    });
}

function initTableFilter() {
    const input = document.getElementById("search-input");
    const cards = document.querySelectorAll(".car-card, .customer-card");
    if (!input || cards.length === 0) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        cards.forEach(function (card) {
            const teks = card.textContent.toLowerCase();
            card.style.display = teks.includes(keyword) ? "" : "none";
        });
    });
}

function tampilkanError(input, pesan) {
    hapusError(input);
    const span = document.createElement("span");
    span.className = "error";
    span.textContent = pesan;
    input.insertAdjacentElement("afterend", span);
}

function hapusError(input) {
    const next = input.nextElementSibling;
    if (next && next.classList.contains("error")) {
        next.remove();
    }
}

// Validasi hanya untuk form dengan id="form-tambah" (form mobil & pelanggan).
// Form login/register sengaja tidak memakai id ini.
function initValidasiForm() {
    const form = document.getElementById("form-tambah");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;

        const merk = form.querySelector("[name='merk'], [name='nama']");
        if (merk && merk.value.trim() === "") {
            tampilkanError(merk, "Field ini wajib diisi.");
            valid = false;
        } else if (merk) {
            hapusError(merk);
        }

        const model = form.querySelector("[name='model']");
        if (model && model.value.trim() === "") {
            tampilkanError(model, "Model wajib diisi.");
            valid = false;
        } else if (model) {
            hapusError(model);
        }

        const tahun = form.querySelector("[name='tahun']");
        if (tahun) {
            const nilai = parseInt(tahun.value, 10);
            if (isNaN(nilai) || nilai < 1990 || nilai > 2026) {
                tampilkanError(tahun, "Tahun harus di antara 1990-2026.");
                valid = false;
            } else {
                hapusError(tahun);
            }
        }

        const harga = form.querySelector("[name='harga']");
        if (harga) {
            const nilai = parseInt(harga.value, 10);
            if (isNaN(nilai) || nilai < 0) {
                tampilkanError(harga, "Harga tidak boleh negatif.");
                valid = false;
            } else {
                hapusError(harga);
            }
        }

        if (!valid) {
            e.preventDefault();
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    initHapusConfirm();
    initTableFilter();
    initValidasiForm();
});