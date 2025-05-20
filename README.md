# TP10DPBO2025C1

## Janji

*Saya, **Hafsah Hamidah** dengan NIM **2311474**, mengerjakan **Tugas Praktikum 10** dalam mata kuliah **DPBO** dengan sebaik-baiknya demi keberkahan-Nya.
Saya berjanji tidak melakukan kecurangan sebagaimana yang telah dispesifikasikan. **Aamiin.***

---

## Deskripsi Program

**TP10DPBO2025C1 - Event Management** adalah aplikasi berbasis PHP native yang mengimplementasikan pola arsitektur **MVVM (Model-View-ViewModel)** untuk mengelola data acara (event), tempat (venue), dan tiket penjualan.

Aplikasi ini terdiri dari 3 modul utama:

* **Event**
* **Venue**
* **Ticket**

---

## Fitur

1. **Manajemen Event (CRUD)** – Tambah, edit, hapus, dan lihat data event.
2. **Manajemen Venue (CRUD)** – Tambah, edit, hapus, dan lihat data venue.
3. **Manajemen Ticket (CRUD)** – Tambah, edit, hapus, dan lihat data tiket yang terkait event dan venue.

---

## Struktur Folder

```
DPBO_MVVM/
│
├── config/
│   └── Database.php                  ← konfigurasi koneksi database
│
├── database/
│   └── event_management.sql          ← struktur dan data awal database
│
├── model/
│   ├── Event.php                    ← model untuk tabel event
│   ├── Venue.php                    ← model untuk tabel venue
│   └── Ticket.php                   ← model untuk tabel ticket
│
├── viewmodel/
│   ├── EventViewModel.php           ← penghubung antara Model dan View untuk Event
│   ├── VenueViewModel.php           ← penghubung antara Model dan View untuk Venue
│   └── TicketViewModel.php          ← penghubung antara Model dan View untuk Ticket
│
├── views/
│   ├── event_form.php               ← form tambah/edit event
│   ├── event_list.php               ← daftar event
│   ├── venue_form.php               ← form tambah/edit venue
│   ├── venue_list.php               ← daftar venue
│   ├── ticket_form.php              ← form tambah/edit ticket
│   └── ticket_list.php              ← daftar ticket
│
└── index.php                       ← routing utama aplikasi
```

---

## Alur Navigasi Halaman

| Halaman                   | Fungsi                                                                            |
| ------------------------- | --------------------------------------------------------------------------------- |
| `index.php?entity=event`  | Menampilkan daftar event dan form tambah/edit event                               |
| `index.php?entity=venue`  | Menampilkan daftar venue dan form tambah/edit venue                               |
| `index.php?entity=ticket` | Menampilkan daftar ticket, form tambah/edit ticket dengan pilihan event dan venue |

---

## Relasi Tabel MySQL

**Database: `event_management`**

* `event` (`id`, `event_name`, `event_date`)
* `venue` (`id`, `venue_name`, `location`)
* `ticket` (`id`, `event_id`, `venue_id`, `price`)

Relasi:

* `ticket.event_id` → `event.id` (FK)
* `ticket.venue_id` → `venue.id` (FK)

---

## Komponen Sistem

### Model (`model/`)

* **Event.php**
  Mengelola data event dengan CRUD menggunakan PDO dan prepared statement.

* **Venue.php**
  Mengelola data venue dengan CRUD menggunakan PDO dan prepared statement.

* **Ticket.php**
  Mengelola data ticket dengan CRUD, termasuk relasi ke event dan venue.

### ViewModel (`viewmodel/`)

* Menghubungkan Model dengan View.
* Menyediakan method CRUD dan data yang diperlukan View.

### Views (`views/`)

* Berisi file form dan list untuk Event, Venue, dan Ticket.
* Sudah mengimplementasikan fitur **data binding** agar form menampilkan data lama saat edit.

---

## Dokumentasi dan Screenshot

| Halaman           | Preview                                     |
| ----------------- | ------------------------------------------- |
| **Daftar Event**  | ![image](https://github.com/user-attachments/assets/485245f7-821d-448c-a117-778934da91b6)  |
| **Form Event**    | ![image](https://github.com/user-attachments/assets/31568ca3-20fb-41de-b6bf-4e5e3c1f4516) ![image](https://github.com/user-attachments/assets/82aa45d7-4093-45bb-9f85-cf06aa6e582d)  |
| **Daftar Venue**  | ![image](https://github.com/user-attachments/assets/812a2668-f1cf-4437-9fa7-54ec3918551c) |
| **Form Venue**    | ![image](https://github.com/user-attachments/assets/82e71696-af1f-456d-8e5c-85801e718b25) ![image](https://github.com/user-attachments/assets/3b9074b4-fec7-41bf-91ca-a801b1086430) |
| **Daftar Ticket** | ![image](https://github.com/user-attachments/assets/45491922-d4e1-4bff-884b-f74169466eab) |
| **Form Ticket**   | ![image](https://github.com/user-attachments/assets/b02ab2a5-3dc5-47f2-8c55-5144627fd620) ![image](https://github.com/user-attachments/assets/e51209a4-8750-4838-89d3-df8cdec18f26) |

---

## Catatan

* Semua operasi CRUD menggunakan PDO dan prepared statement untuk keamanan.
* Pola MVVM memisahkan logika bisnis (ViewModel) dari tampilan (View) dan data (Model).
* Fitur data binding sudah diterapkan di form untuk kemudahan pengeditan data.

---
