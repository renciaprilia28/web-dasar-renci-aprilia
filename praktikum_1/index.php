<?php
// 1. KONEKSI & SESSION
session_start();
include 'koneksi.php'; 

$pesan = "";

// 2. PROSES SIMPAN DATA (INSERT)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $umur      = $_POST['umur'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $warna     = $_POST['warna'];

    if (strlen($nama) < 3) {
        $pesan = "Nama minimal 3 karakter!";
    } else {
        $sql = "INSERT INTO kontak_masuk (nama, email, umur, tgl_lahir, warna) 
                VALUES ('$nama', '$email', '$umur', '$tgl_lahir', '$warna')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['user_nama'] = $nama;
            $pesan = "Data Berhasil Disimpan!";
        } else {
            $pesan = "Gagal Simpan: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pembelajaran HTML</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <h1>Website Pembelajaran HTML</h1>
        <p>Contoh penggunaan berbagai tag HTML</p>
        <nav>
            <a href="#">Home</a> |
            <a href="#materi">Materi</a> |
            <a href="#kontak">Kontak</a>
        </nav>
    </header>

    <main class="container">
        <section id="home">
            <h2>Selamat Datang</h2>
            <p id="teksHome">Ini adalah halaman utama media pembelajaran interaktif.</p>
        </section>

        <hr>

        <section class="card">
            <h2>Demo JavaScript</h2>
            <p id="teksUbah">Teks ini akan berubah jika tombol diklik.</p>
            <button onclick="document.getElementById('teksUbah').innerHTML='Teks berhasil diubah!'">Ubah Teks</button>
            <button onclick="document.body.style.backgroundColor='lightgreen'">Ganti Warna BG</button>
        </section>

        <section id="materi">
            <div class="card">
                <h2>A. Elemen HTML</h2>
                <p>
                    Contoh format teks: <b>Tebal</b>, <i>Miring</i>, <u>Garis Bawah</u>, 
                    <mark>Highlight</mark>, dan <span style="color:red;">Warna Merah</span>.
                </p>
            </div>

            <div class="card">
                <h2>B. Gambar & Galeri</h2>
                <div class="gallery">
                    <div class="img-box">
                        <img src="download (2).jpg" alt="Gambar 1">
                        <p>Koleksi 1</p>
                    </div>
                    <div class="img-box">
                        <img src="download (1).jpeg" alt="Gambar 2">
                        <p>Koleksi 2</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2>C. Tabel Mata Kuliah</h2>
                <table border="1" width="100%" cellpadding="10">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Pemrograman Web</td></tr>
                        <tr><td>2</td><td>Sistem Operasi</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="kontak" class="card">
            <h2>D. Form Input Data</h2>
            
            <?php if($pesan != ""): ?>
                <p style="color: blue; font-weight: bold;"><?php echo $pesan; ?></p>
            <?php endif; ?>

            <form method="POST" onsubmit="return validasiJS()">
                <label>Nama:</label>
                <input type="text" name="nama" id="nama_form" required>

                <label>Email:</label>
                <input type="email" name="email" id="email_form" required>

                <label>Umur:</label>
                <input type="number" name="umur" required>

                <label>Tanggal Lahir:</label>
                <input type="date" name="tgl_lahir" required>

                <label>Pilih Warna:</label>
                <input type="color" name="warna">

                <button type="submit" style="margin-top: 10px;">Kirim Data</button>
            </form>
            <p id="pesan_js" style="color:red;"></p>
        </section>

        <section class="card">
            <h2>Data Kontak Masuk (Database)</h2>
            <table border="1" width="100%" cellpadding="10">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM kontak_masuk ORDER BY id DESC");
                    if ($query && mysqli_num_rows($query) > 0) {
                        $no = 1;
                        while($data = mysqli_fetch_array($query)) {
                            echo "<tr>
                                    <td align='center'>$no</td>
                                    <td>" . htmlspecialchars($data['nama']) . "</td>
                                    <td>" . htmlspecialchars($data['email']) . "</td>
                                  </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='3' align='center'>Belum ada data.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>© 2026 Pembelajaran HTML - All Rights Reserved</p>
    </footer>

    <script>
    function validasiJS() {
        let nama = document.getElementById("nama_form").value;
        let email = document.getElementById("email_form").value;
        let pesan = document.getElementById("pesan_js");

        if (nama.length < 3) {
            pesan.innerText = "Nama minimal 3 karakter!";
            return false;
        }

        if (!email.includes("@")) {
            pesan.innerText = "Email tidak valid!";
            return false;
        }

        return true; // Lanjut kirim ke PHP
    }
    </script>
</body>
</html>