# 🎵 Analisis Sistem Inventaris Alat Musik

## 2. Tujuan Sistem

Sistem ini dibuat untuk:
- Mencatat semua alat musik.
- Mengelompokkan alat berdasarkan kategori (misalnya petik, pukul, tiup, dll).
- Menyimpan data transaksi masuk dan keluar alat musik.
- Memudahkan pencarian alat berdasarkan nama atau kategori.
- Melihat hubungan atau koneksi antar alat (misalnya alat yang sering dipinjam bersamaan).
- Menyimpan riwayat siapa saja yang pernah pakai alat (log transaksi).

## 3. Struktur Data yang Digunakan

Untuk membuat sistem ini berjalan dengan baik, digunakan beberapa struktur data penting:

### a. Tree (Kategori Alat Musik)
Struktur pohon (tree) untuk mengatur kategori alat musik. Misalnya, kategori utama seperti "Petik" yang mempunyai subkategori "Gitar" dan "Ukulele". Ini membuat data lebih terstruktur dan mudah dicari.

### b. Linked List (Data Masuk dan Keluar)
Untuk mencatat alat yang masuk dan keluar, memakai konsep linked list. Setiap transaksi disambungkan dari yang terbaru ke yang lama, biar mudah dilacak dan dianalisis urutannya.

### c. Array (Stok Alat)
Array dipakai untuk menyimpan daftar stok alat, karena array bisa menampung banyak data dan diakses berdasarkan indeks. Misalnya untuk mengetahui jumlah gitar, drum, dll.

### d. Searching (Pencarian Alat)
Menggunakan algoritma pencarian buat nemuin alat berdasarkan nama atau kategori. Jadi user tinggal ketik kata kunci, sistem langsung menampilkan hasilnya.

### e. Queue (Antrian Peminjaman)
Jika ada beberapa orang yang ingin meminjam alat yang sama, digunakan struktur queue (antrian). Siapa yang mendaftar terlebih dahulu, dia yang dapat mendapatkan terlebih dahulu.

### f. Graph (Relasi Antar Alat)
Struktur graf digunakan untuk menunjukkan hubungan antar alat. Misalnya, gitar dan amplifier sering dipinjam bersamaan. Dari data tersebut, sistem bisa menyarankan alat pelengkap saat peminjaman.


