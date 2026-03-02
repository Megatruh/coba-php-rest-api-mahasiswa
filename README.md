# Simple Student REST API (CRUD)

Repositori ini berisi implementasi REST API sederhana untuk pengelolaan data mahasiswa menggunakan PHP Native dengan konsep OOP (Object Oriented Programming). Proyek ini dibuat sebagai bagian dari tugas praktikum mata kuliah Arsitektur dan Organisasi Komputer/Pemrograman Web.

## 🚀 Fitur
- **Create**: Menambahkan data mahasiswa baru.
- **Read**: Menampilkan daftar seluruh mahasiswa.
- **Update**: Memperbarui data mahasiswa berdasarkan ID.
- **Delete**: Menghapus data mahasiswa berdasarkan ID.

## 🛠️ Teknologi yang Digunakan
- **Bahasa**: PHP 8.x
- **Database**: MySQL (PDO Extension)
- **Tools**: Laragon, Postman, Visual Studio Code

## 📂 Struktur Folder
- `api/`: Berisi file endpoint (read.php, create.php, update.php, delete.php).
- `config/`: Berisi konfigurasi koneksi database.
- `models/`: Berisi logic class (Mahasiswa.php).

## 📝 Cara Penggunaan
1. Import database `kampus` dan tabel `mahasiswa`.
2. Sesuaikan kredensial database di `config/Database.php`.
3. Gunakan **Postman** untuk melakukan request ke endpoint:
   - `GET http://localhost/coba_dulu_yekan/api/read.php`
   - `POST http://localhost/coba_dulu_yekan/api/create.php` (Body: JSON)
   - `PUT http://localhost/coba_dulu_yekan/api/update.php` (Body: JSON)
   - `DELETE http://localhost/coba_dulu_yekan/api/delete.php` (Body: JSON)

## 👤 Author
- **Farhan Esha Putra Kusuma Atmaja**
- GitHub: [@Megatruh](https://github.com/Megatruh)
