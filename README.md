📚 Interactive Learning Web: Dasar HTML & PHP

Website edukasi berbasis web yang dirancang untuk mendemonstrasikan implementasi tag HTML modern, manipulasi DOM lewat JavaScript, serta manajemen data menggunakan PHP dan MySQL. Project ini cocok untuk eksplorasi bagi siapa pun yang baru terjun di dunia web development.

🚀 Fitur Unggulan
- Interactive UI: Eksplorasi tag-tag HTML (Text Formatting, Table, & Media) dengan tampilan yang sudah clean berkat font Poppins.
- Dynamic Action: Simulasi perubahan elemen secara real-time menggunakan JavaScript tanpa perlu *refresh* halaman.
- Form Handling: Validasi input dua lapis (Client-side & Server-side) untuk menjamin keamanan data.
- Data Persistence: Terintegrasi dengan MySQL untuk menyimpan dan menampilkan data input secara dinamis.

🛠️ Tech Stack
- Languages: PHP (Native), JavaScript (ES6), HTML5, CSS3.
- Database: MySQL.
- Typography: Poppins via Google Fonts.

⚙️ Konfigurasi & Setup
1. Persiapan Database
Buat database baru di MySQL dan jalankan query berikut untuk membuat tabel:
```sql
CREATE TABLE kontak_masuk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    umur INT,
    tgl_lahir DATE,
    warna VARCHAR(20)
);
```
2. Koneksi Database
Pastikan file `koneksi.php` sudah disesuaikan dengan kredensial server lokal Anda:
```php
$conn = mysqli_connect("localhost", "root", "", "nama_database_kamu");
```
3. Deployment
Pindahkan seluruh folder project ke dalam direktori server (`htdocs` atau `www`), lalu akses melalui `http://localhost/nama_folder/` di browser.

📂 Struktur File
 `index.php` - Halaman utama & logika proses data.
 `koneksi.php` - Jembatan antara aplikasi dan database.
 `style.css` - Styling interface agar lebih modern dan enak dilihat.
 `script.js` - Logika validasi dan interaktivitas halaman. 
