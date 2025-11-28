# Pokemon PC Storage System (MVVM)

## Janji

Saya Zharfan Faza Wibawa dengan NIM 2403995 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## 1\. Deskripsi Singkat Program

Aplikasi ini merupakan sistem manajemen penyimpanan Pokemon (PC Storage System) berbasis web yang dibangun menggunakan **PHP Native** dengan arsitektur **MVVM (Model-View-ViewModel)**. Aplikasi ini mensimulasikan sistem "PC Box" dalam game Pokemon yang berfungsi untuk mengelola data koleksi Pokemon, Trainer, Elemental Type, dan Region.

Pengguna dapat melakukan operasi CRUD (_Create, Read, Update, Delete_) pada setiap entitas. Aplikasi ini juga menerapkan **Data Binding** satu arah dan dua arah antara ViewModel dan View, serta memiliki fitur visual dinamis seperti _badge color preview_ untuk tipe elemen Pokemon.

## 2\. Struktur Folder Projek

```
.
├── config/           # Konfigurasi koneksi database (PDO)
│   └── Database.php
├── database/         # File SQL untuk import struktur tabel & dummy data
│   └── db_pokemon.sql
├── models/           # Model: Menangani query SQL mentah ke database
│   ├── Pokemon.php
│   ├── Trainer.php
│   ├── Type.php
│   └── Region.php
├── viewmodels/       # ViewModel: Menangani logika bisnis & pemrosesan data
│   ├── PokemonViewModel.php
│   ├── TrainerViewModel.php
│   ├── TypeViewModel.php
│   └── RegionViewModel.php
├── views/            # View: Tampilan antarmuka (UI) "Dumb View"
│   ├── home.php
│   ├── pokemon/
│   │   ├── form.php
│   │   └── list.php
│   ├── trainer/
│   │   ├── form.php
│   │   └── list.php
│   ├── type/
│   │   ├── form.php
│   │   └── list.php
│   ├── region/
│   │   ├── form.php
│   │   └── list.php
│   └── template/     # Template layout (Navbar & Footer)
│       ├── header.php
│       └── footer.php
├── index.php         # Entry point & Routing system
└── README.md         # Dokumentasi Proyek
```

## 3\. Desain Program

### Struktur Database

Aplikasi menggunakan MySQL dengan 4 tabel utama yang saling berelasi:

1.  **regions** (Master Data):
    - `region_id` (PK): ID unik region.
    - `region_name`: Nama wilayah (misal: Kanto, Johto).
    - `professor`: Nama profesor penanggung jawab region.
2.  **types** (Master Data):
    - `type_id` (PK): ID unik tipe elemen.
    - `type_name`: Nama tipe (misal: Fire, Water).
    - `badge_color`: Kode Hex warna untuk styling badge (UI).
3.  **trainers** (Data Pemilik):
    - `trainer_id` (PK): ID unik trainer.
    - `trainer_name`: Nama trainer.
    - `level`: Level trainer.
    - `region_id` (FK): Merujuk ke tabel `regions` (Satu trainer berasal dari satu region).
4.  **pokemons** (Data Utama):
    - `pokemon_id` (PK): ID unik pokemon.
    - `nickname`: Nama panggilan pokemon.
    - `species`: Spesies pokemon (misal: Pikachu).
    - `photo`: URL gambar pokemon.
    - `trainer_id` (FK): Merujuk ke tabel `trainers` (Pokemon dimiliki oleh trainer).
    - `type_id` (FK): Primary Type, merujuk ke tabel `types`.
    - `type_id_2` (FK): Secondary Type (Opsional), merujuk ke tabel `types`.

### Komponen MVVM

- **Model**: Bertanggung jawab penuh atas akses data (SQL Query). Model tidak mengetahui apapun tentang tampilan HTML atau logika warna. Menggunakan `PDO` untuk keamanan database.
- **ViewModel**: Bertindak sebagai mediator.
  - Mengambil data mentah dari Model.
  - Memproses data untuk kebutuhan tampilan (contoh: Mengolah kode warna Hex dari database menjadi string CSS `style="background-color: #..."`).
  - Menyediakan data siap saji untuk View.
- **View**: Tampilan HTML murni yang menggunakan **Bootstrap 5**. View bersifat pasif (_dumb view_) dan hanya menampilkan data yang sudah diproses oleh ViewModel.
- **Routing**: Ditangani oleh `index.php`. Menggunakan parameter `page` dan `action` untuk menentukan ViewModel mana yang dipanggil dan View mana yang dirender di dalam template Header/Footer.

## 4\. Alur Program

1.  **Navigasi Utama**: Pengguna mengakses `index.php` dan disambut dengan Dashboard. Navigasi dilakukan melalui Navbar (Pokemon, Trainer, Type, Region).
2.  **Routing**: Saat pengguna mengklik menu (misal: `index.php?page=pokemon`), sistem routing memanggil `PokemonViewModel`.
3.  **Data Binding (Read)**:
    - ViewModel meminta data ke `PokemonModel`.
    - Model melakukan `JOIN` query untuk mengambil data Pokemon beserta nama Trainer dan nama Type-nya.
    - ViewModel menerima data, lalu View menampilkannya. Warna badge tipe ditampilkan otomatis sesuai kode warna di database (Visual Data Binding).
4.  **Manipulasi Data (Create/Update)**:
    - Saat membuka Form, ViewModel menyiapkan data _dropdown_ (misal: list Trainer dan list Type) untuk dipilih pengguna.
    - Saat form disubmit (`POST`), data dikirim ke ViewModel.
    - ViewModel memvalidasi dan mengirim data ke Model untuk disimpan ke database.
5.  **Relasi Data**:
    - Menghapus Region akan gagal jika masih ada Trainer di region tersebut (atau set NULL tergantung konfigurasi).
    - Menghapus Trainer akan menghapus semua Pokemon miliknya (_Cascade_).

## Dokumentasi
