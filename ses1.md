### 1. Desain Database (Schema)

**Tabel: `users`**

- `id` (Primary Key)
- `name` (String)
- `email` (Unique String)
- `password` (Hash)
- `whatsapp_number` (String)
- `learning_goal` (Text) - Untuk menyimpan tujuan belajar.
- `package_name` (String) - Nama paket yang diikuti (misal: "Laravel Mastery").
- `total_sessions` (Integer) - Kuota pertemuan yang didapat.
- `is_admin` (Boolean) - Default: false (untuk membedakan Anda dan siswa).

**Tabel: `sessions` (Pertemuan)**

- `id` (Primary Key)
- `user_id` (Foreign Key ke `users.id`) - Menghubungkan sesi ke siswa tertentu.
- `title` (String) - Judul pertemuan (misal: "Pertemuan 1: Setup Environment").
- `summary` (LongText) - Isi rangkuman materi.
- `video_url` (String) - Link YouTube.
- `source_code_url` (String) - Link GitHub atau upload file ZIP.
- `meeting_date` (Date) - Tanggal pertemuan dilaksanakan.
- `created_at` & `updated_at`

---

### 2. Alur Kerja Sistem (Workflow)

### A. Sisi Admin

1. **Dashboard Siswa:** Halaman untuk melihat daftar semua siswa yang terdaftar.
2. **Registrasi Manual:** Form untuk menginput nama, email, password awal, nomor WA, tujuan belajar, dan paket.
3. **Manajemen Sesi:**
    - Pilih siswa tertentu.
    - Klik "Tambah Pertemuan".
    - Isi judul, tulis *summary* (bisa pakai Markdown atau WYSIWYG editor), masukkan link video YouTube, dan upload/tempel link *source code*.
4. **Monitoring Progress:** Melihat sudah berapa banyak sesi yang diselesaikan oleh siswa tersebut dibandingkan dengan total kuota sesi mereka.

### B. Sisi User (Siswa)

1. **Login:** Siswa masuk menggunakan email dan password yang Anda berikan.
2. **Dashboard Materi:** Setelah login, mereka langsung melihat list pertemuan yang sudah Anda buatkan khusus untuk mereka.
3. **Halaman Detail Sesi:** Siswa klik salah satu sesi untuk melihat:
    - Video rekaman (Embed YouTube).
    - Membaca *summary* materi.
    - Download *source code*.
4. **Profil:** Melihat informasi diri mereka sendiri dan sisa pertemuan.

## 2. Stack

1. Laravel
2. Laravel Breeze dengan Blade
