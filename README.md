# 📸 LuminaSnap — Social Photo Sharing App

LuminaSnap adalah platform berbagi foto modern yang terinspirasi dari **Pinterest** dan **Instagram**, dengan desain fresh, responsif, dan full interaksi sosial.  
Dibangun menggunakan **Laravel 12 + TailwindCSS**, Jika ingin Tanya tanya atau ada tambahan untuk project ini hubungi langsung aja
[Adira](https://www.instagram.com/adirasakhi14).

---

## 🎨 Preview UI

### 🏠 Explore Page  
Foto tampil dalam gaya **masonry grid**, mirip Pinterest.

![Explore](https://github.com/adirasakhi/LuminaSnap/blob/main/public/preview/HalamanUtama(explore).png)

### 📱 Feed Page  
Foto dari teman + terbaru, ala Instagram.

![Feed](https://github.com/adirasakhi/LuminaSnap/blob/main/public/preview/HalamanFeed(Half).png)
![Feed](https://github.com/adirasakhi/LuminaSnap/blob/main/public/preview/HalamanFeed(Half2).png)


### 👤 Profile Page  

![Profile](https://github.com/adirasakhi/LuminaSnap/blob/main/public/preview/HalamanProfile.png)


### 🖼️ Photo Detail  
Menampilkan foto, like, comment, dan follow.

![Detail](https://github.com/adirasakhi/LuminaSnap/blob/main/public/preview/HalamanDetail(foto).png)

---

### 🔔 Notifications
Like / Comment / Follow dengan badge realtime.

![Notif](https://github.com/adirasakhi/LuminaSnap/blob/main/public/preview/HalamanNotification.png)

---

## 🧩 Fitur Utama

### 🔐 Autentikasi  
- Register  
- Login   

---

### 🏠 Explore Page (Public)  
- Semua foto tampil dalam **masonry layout**
- Hover animation smooth  
- Klik → detail foto  

---

### 📰 Feed Page  
- Sistem rekomendasi sederhana:
  - Foto teman(follower or following) dulu (1 minggu terakhir)
  - Lalu foto terbaru secara global  
- Infinite scroll feel  
- Like & Comment langsung dari feed  

---

### ❤️ Like System  
- Toggle like / unlike  
- Icon animasi heartbeat  
- Jumlah like realtime  

---

### 💬 Comment System  
- 3 komentar terbaru ditampilkan  
- Komentar penuh di halaman detail  
- Bubble style ala Instagram  

---

### 👥 Follow System  
- Follow / Unfollow  
- Feed beradaptasi dengan siapa yang diikuti  
- Guest tetap lihat tombol follow → redirect login  

---

### 🔔 Notification System  
Notifikasi dibuat saat:  
- Foto di-like  
- Foto di-comment  
- User di-follow  

Tampilan seperti Instagram dengan badge merah.

---

### 📂 Album System  
- Buat album  
- Edit album  
- Tambahkan foto ke album  
- Grid 3 kolom estetik  
- Cover album otomatis / custom  

---

### 🚨 Report System  
- User bisa report foto  
- Admin menerima report  
- Admin dapat:
  - Delete foto
  - Ban user  
  - Unban user  

---

## 🛠️ Tech Stack

| Bagian | Teknologi |
|--------|-----------|
| Backend | Laravel 12 |
| Frontend | TailwindCSS |
| UI Components | Custom Tailwind |
| Auth | Laravel Breeze |
| DB | MySQL / MariaDB |
| Storage | Laravel Storage (public) |

---

## 📦 Instalasi

1. **Klon Repositori**

    ```bash
    git clone https://github.com/adirasakhi/LuminaSnap.git
    cd LuminaSnap
    composer install
    npm install
    cp .env.example .env
    ```

2. **Konfigurasi Database**

    ```conf
    APP_DEBUG=true
    DB_DATABASE=perpus1
    DB_USERNAME=nama-pengguna-anda
    DB_PASSWORD=kata-sandi-anda
    ```

3. **Migrasi dan Symlink**

    ```bash
    php artisan key:generate
    php artisan storage:link
    php artisan migrate --seed
    ```

4. **Mulai Situs Web**

    ```bash
    npm run dev
    # Jalankan di terminal yang berbeda
    php artisan serve
    ```

