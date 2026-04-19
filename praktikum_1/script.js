// GANTI WARNA (HOME)
const btnWarna = document.querySelector("#btnWarna");
if (btnWarna) {
    btnWarna.addEventListener("click", function () {
        document.body.style.backgroundColor = "black";
    });
}

// UBAH TEKS (MATERI)
function ubahTeks() {
    const teks = document.querySelector("#teks");
    if (teks) {
        teks.innerText = "Teks berhasil diubah!";
    }
}

// LOOP (MATERI)
const btnLoop = document.querySelector("#btnLoop");
if (btnLoop) {
    btnLoop.addEventListener("click", function () {
        const list = document.querySelectorAll(".img-box p");

        let hasil = "";
        for (let i = 0; i < list.length; i++) {
            hasil += list[i].innerText + "\n";
        }

        alert(hasil);
    });
}

// VALIDASI FORM (KONTAK)
const form = document.querySelector("#formSaya");

if (form) {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let nama = document.querySelector("#nama").value;
        let email = document.querySelector("#email").value;
        let pesan = document.querySelector("#pesan");

        if (nama.length < 3) {
            pesan.innerText = "Nama terlalu pendek!";
        } else if (!email.includes("@")) {
            pesan.innerText = "Email tidak valid!";
        } else {
            pesan.innerText = "Berhasil dikirim!";
        }
    });
}