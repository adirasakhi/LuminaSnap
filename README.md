# 📸 LuminaSnap — Social Photo Sharing App

LuminaSnap adalah platform berbagi foto modern yang terinspirasi dari **Pinterest** dan **Instagram**, dengan desain fresh, responsif, dan full interaksi sosial.  
Dibangun menggunakan **Laravel 10 + TailwindCSS**, project ini cocok sebagai portfolio profesional yang menampilkan skill Backend & Frontend Development.

---

## 🎨 Preview UI

### 🏠 Explore Page  
Foto tampil dalam gaya **masonry grid**, mirip Pinterest.

![Explore](https://i.imgur.com/c2PXp0C.jpeg)

### 📱 Feed Page  
Foto dari teman + terbaru, ala Instagram.

![Feed](https://i.imgur.com/7zEdGGf.jpeg)

### 👤 Profile Page  

---

### 🖼️ Photo Detail  
Menampilkan foto, like, comment, dan follow.

![Detail](https://i.imgur.com/dVqr3i3.jpeg)

---

### 🔔 Notifications
Like / Comment / Follow dengan badge realtime.

![Notif](https://i.imgur.com/VL1dnEh.jpeg)

---

## 🧩 Fitur Utama

### 🔐 Autentikasi  
- Register  
- Login  
- Email verification ready  
- Forgot password  

---

### 🏠 Explore Page (Public)  
- Semua foto tampil dalam **masonry layout**
- Hover animation smooth  
- Klik → detail foto  

---

### 📰 Feed Page  
- Sistem rekomendasi sederhana:
  - Foto teman dulu (1 minggu terakhir)
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

### 1️⃣ Clone Repositori
```bash
git clone https://github.com/username/luminasnap.git
cd luminasnap
composer install
npm install
cp .env.example .env
