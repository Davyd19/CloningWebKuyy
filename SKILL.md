---
name: website-cloner-codeigniter
description: Clone any website and rebuild it using PHP, MySQL, and CodeIgniter 4 framework. Use this skill when the user wants to clone/replicate an existing website into a CodeIgniter 4 project with proper MVC structure, database integration, and server-side rendering. Triggers include: "clone website", "replicate site", "rebuild web", or any request to recreate a website's UI/functionality using PHP/CodeIgniter stack.
---

# Website Cloner — PHP · MySQL · CodeIgniter 4

Clone any website with high visual fidelity and rebuild it as a production-ready **CodeIgniter 4** application with **PHP** backend and **MySQL** database.

---

## Overview

Skill ini mengatur alur kerja multi-fase untuk mengkloning sebuah website:

1. **Analisis Visual** — Tangkap dan pelajari tampilan website target
2. **Ekstraksi Aset** — Identifikasi warna, font, layout, komponen
3. **Scaffold Proyek** — Buat struktur CodeIgniter 4 yang lengkap
4. **Implementasi** — Bangun Views, Controllers, Models, dan migrasi database
5. **QA & Refinement** — Bandingkan hasil clone dengan target, iterasi hingga sesuai

---

## Tech Stack

| Teknologi | Versi | Keterangan |
|---|---|---|
| PHP | 8.1+ | Backend bahasa utama |
| CodeIgniter | 4.x | MVC framework |
| MySQL | 8.0+ | Database relasional |
| Bootstrap 5 | 5.3 | CSS framework utama (opsional, sesuai target) |
| Vanilla CSS | — | Custom styling pixel-perfect |
| jQuery / Vanilla JS | — | Interaktivitas frontend |

---

## Struktur Output Proyek

```
project-root/
├── app/
│   ├── Controllers/
│   │   ├── BaseController.php
│   │   ├── Home.php               ← Controller utama halaman
│   │   └── [PageName].php         ← Controller per halaman/section
│   ├── Models/
│   │   └── [EntityName]Model.php  ← Model untuk tiap entitas data
│   ├── Views/
│   │   ├── layouts/
│   │   │   └── main.php           ← Template layout utama
│   │   ├── partials/
│   │   │   ├── header.php
│   │   │   ├── navbar.php
│   │   │   ├── footer.php
│   │   │   └── [component].php    ← Komponen yang dapat digunakan ulang
│   │   └── pages/
│   │       ├── home.php
│   │       └── [page_name].php    ← View per halaman
│   ├── Database/
│   │   └── Migrations/
│   │       └── [timestamp]_create_[table].php
│   └── Config/
│       ├── Routes.php             ← Definisi semua route
│       └── Database.php
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css          ← Custom CSS pixel-perfect
│   │   ├── js/
│   │   │   └── main.js            ← Custom JavaScript
│   │   ├── images/                ← Semua gambar yang didownload
│   │   ├── fonts/                 ← Font lokal (jika ada)
│   │   └── icons/                 ← SVG/favicon
│   └── index.php
├── .env
├── .tasks/
│   ├── context.md                 ← Ringkasan ekstraksi desain
│   ├── screenshots/               ← Referensi visual
│   └── review-notes.md            ← Catatan QA
└── README.md
```

---

## Fase Kerja

### Fase 1 — Analisis Visual

**Input:** URL target atau screenshot website

**Tindakan:**
- Tangkap screenshot full-page dan per-section
- Identifikasi layout utama (header, hero, content sections, footer)
- Catat semua state interaktif (hover, active, modal, dropdown)
- Deteksi apakah website berbasis Flutter Web, React, atau HTML biasa

**Output:** File `.tasks/context.md` berisi:
```markdown
## Layout Structure
- Header: [deskripsi]
- Hero Section: [deskripsi]
- Sections: [list section]
- Footer: [deskripsi]

## Color Palette
- Primary: #XXXXXX
- Secondary: #XXXXXX
- Background: #XXXXXX
- Text: #XXXXXX
- Accent: #XXXXXX

## Typography
- Heading Font: [nama font] [weight]
- Body Font: [nama font] [weight]
- Font Sizes: h1=Xpx, h2=Xpx, body=Xpx

## Spacing System
- Section padding: Xpx / Xrem
- Container max-width: Xpx
- Grid: X columns

## Components Identified
- [ ] Navbar (sticky/static, transparent/solid)
- [ ] Hero (full-screen/partial, dengan/tanpa video)
- [ ] Cards (X per row)
- [ ] CTA Buttons
- [ ] Footer columns
- [ ] [Komponen lain...]

## Database Needs
- [ ] Konten dinamis? (berita, produk, dll)
- [ ] Form? (kontak, login, registrasi)
- [ ] User management?
```

---

### Fase 2 — Scaffold CodeIgniter 4

**Buat struktur proyek lengkap:**

#### `app/Config/Routes.php`
```php
<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/(:segment)', 'Home::page/$1');

// Tambahkan route spesifik sesuai website target
// $routes->get('/about', 'About::index');
// $routes->get('/contact', 'Contact::index');
// $routes->post('/contact/send', 'Contact::send');
```

#### `app/Views/layouts/main.php`
```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Website Clone' ?></title>
    <meta name="description" content="<?= $description ?? '' ?>">
    
    <!-- Fonts (sesuaikan dengan font target) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=[FONT_NAME]&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <?= $this->renderSection('styles') ?>
</head>
<body class="<?= $bodyClass ?? '' ?>">

    <?= $this->include('partials/navbar') ?>
    
    <?= $this->renderSection('content') ?>
    
    <?= $this->include('partials/footer') ?>

    <!-- JS -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
```

#### `app/Controllers/Home.php`
```php
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'       => 'Home — [Nama Website]',
            'description' => '[Meta description halaman utama]',
            // Tambahkan data dinamis dari model jika diperlukan
        ];
        return view('pages/home', $data);
    }

    public function page(string $slug): string
    {
        // Handler untuk halaman dinamis
        $data = ['title' => ucfirst($slug)];
        
        if (! view_exists("pages/{$slug}")) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($slug);
        }
        
        return view("pages/{$slug}", $data);
    }
}
```

---

### Fase 3 — Implementasi CSS Pixel-Perfect

**`public/assets/css/style.css`** — Pola wajib:

```css
/* =========================================
   CSS VARIABLES — Sesuaikan dengan target
   ========================================= */
:root {
    /* Colors */
    --color-primary:    #XXXXXX;
    --color-secondary:  #XXXXXX;
    --color-bg:         #XXXXXX;
    --color-bg-alt:     #XXXXXX;
    --color-text:       #XXXXXX;
    --color-text-muted: #XXXXXX;
    --color-accent:     #XXXXXX;
    --color-border:     #XXXXXX;

    /* Typography */
    --font-heading: '[Font Heading]', sans-serif;
    --font-body:    '[Font Body]', sans-serif;
    --font-size-base: 16px;
    --line-height-base: 1.6;

    /* Spacing */
    --section-padding: 80px 0;
    --container-max:   1200px;
    --border-radius:   8px;

    /* Shadows */
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
    --shadow-md: 0 4px 16px rgba(0,0,0,0.12);
    --shadow-lg: 0 8px 32px rgba(0,0,0,0.16);

    /* Transitions */
    --transition-fast:   150ms ease;
    --transition-normal: 300ms ease;
    --transition-slow:   500ms ease;
}

/* =========================================
   RESET & BASE
   ========================================= */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { font-size: var(--font-size-base); scroll-behavior: smooth; }
body {
    font-family: var(--font-body);
    color: var(--color-text);
    background-color: var(--color-bg);
    line-height: var(--line-height-base);
}

/* =========================================
   LAYOUT UTILITIES
   ========================================= */
.container {
    max-width: var(--container-max);
    margin: 0 auto;
    padding: 0 24px;
}
section { padding: var(--section-padding); }

/* =========================================
   KOMPONEN — Implementasi sesuai target
   ========================================= */

/* Navbar */
/* Hero */
/* Cards */
/* Buttons */
/* Footer */
```

---

### Fase 4 — Database & Model (Jika Diperlukan)

**Kapan membuat tabel MySQL:**
- Konten dinamis (berita, artikel, produk, portofolio)
- Form input pengguna (kontak, newsletter, registrasi)
- Sistem autentikasi
- Data yang bisa diubah melalui admin panel

#### Contoh Migrasi
```php
<?php
// app/Database/Migrations/[timestamp]_create_contents_table.php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContentsTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'body'       => ['type' => 'TEXT'],
            'image'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'     => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('contents');
    }

    public function down(): void
    {
        $this->forge->dropTable('contents');
    }
}
```

#### Contoh Model
```php
<?php
// app/Models/ContentModel.php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table      = 'contents';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'slug', 'body', 'image', 'status'];
    protected bool $useTimestamps = true;

    public function getActive(): array
    {
        return $this->where('status', 'active')->orderBy('created_at', 'DESC')->findAll();
    }

    public function getBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)->first();
    }
}
```

---

### Fase 5 — Penanganan Website Flutter Web

Website yang dibangun dengan **Flutter Web** tidak memiliki HTML DOM tradisional. Strategi kloning:

| Kondisi | Strategi |
|---|---|
| Flutter Web (Canvas renderer) | Clone dari screenshot, rebuild 100% dari nol |
| Flutter Web (HTML renderer) | Inspect elemen terbatas, gunakan sebagai referensi sebagian |
| React/Vue/Angular SPA | Gunakan DevTools Network tab untuk ekstrak API + data |
| Server-rendered HTML | Bisa scrape langsung struktur DOM |

**Untuk Flutter Web:**
1. Ambil screenshot setiap halaman dan state interaktif
2. Identifikasi palet warna dengan color picker dari screenshot
3. Identifikasi font dengan tools seperti WhatFontIs atau inspeksi network tab
4. Rebuild sepenuhnya menggunakan HTML/CSS/JS di dalam CodeIgniter Views
5. Tidak ada shortcut — semua komponen dibangun dari awal berdasarkan visual

---

### Fase 6 — QA & Perbandingan

**Checklist QA per komponen:**

```markdown
## Review Notes — [Domain Target]

### Navbar
- [ ] Logo posisi dan ukuran sesuai
- [ ] Link menu lengkap dan urut
- [ ] Behavior sticky/scroll sudah benar
- [ ] Mobile hamburger menu berfungsi
- [ ] Warna background dan teks match

### Hero Section
- [ ] Tinggi/proporsi sesuai target
- [ ] Tipografi heading match (font, size, weight, spacing)
- [ ] CTA button styling identik
- [ ] Background (warna/gambar/video) sesuai
- [ ] Responsive di mobile

### [Section Lain...]

### Footer
- [ ] Kolom dan konten lengkap
- [ ] Link footer berfungsi
- [ ] Copyright text sesuai
- [ ] Warna background match

### Global
- [ ] Color palette konsisten
- [ ] Font rendering sesuai
- [ ] Spacing antar section konsisten
- [ ] Responsive breakpoints: mobile (375px), tablet (768px), desktop (1280px)
- [ ] Form (jika ada) berfungsi dengan CodeIgniter validation

### STATUS: [ ] PERFECT / [ ] NEEDS_REVISION
### Critical Issues: [list]
### Minor Issues: [list]
```

---

## Aturan Implementasi Wajib

### PHP / CodeIgniter
- Selalu gunakan **CodeIgniter 4** namespace dan struktur folder standar
- Escape semua output dengan `esc()` atau `htmlspecialchars()`
- Gunakan **Query Builder** CI4, jangan raw query langsung
- Validasi form menggunakan **CI4 Validation** library
- Simpan konfigurasi sensitif di file `.env`, bukan di code
- Gunakan **CI4 Session** untuk flash messages

### CSS
- Definisikan semua warna dan ukuran sebagai **CSS Variables** di `:root`
- Gunakan **BEM methodology** untuk penamaan class (`.block__element--modifier`)
- Mobile-first approach: `min-width` bukan `max-width`
- Jangan gunakan `!important` kecuali benar-benar terpaksa
- Ukuran font dalam `rem`, spacing bisa `px` atau `rem`

### JavaScript
- Vanilla JS diutamakan; jQuery hanya jika target menggunakannya
- Semua event listener ditempatkan setelah DOM ready (`DOMContentLoaded`)
- Gunakan `fetch()` untuk AJAX ke controller CI4

### Database
- Semua nama tabel: `snake_case` dan plural (`users`, `blog_posts`)
- Selalu ada kolom `created_at` dan `updated_at`
- Primary key selalu `id` INT AUTO_INCREMENT
- Gunakan migrasi, jangan buat tabel manual

---

## Contoh Penggunaan

**Input dari pengguna:**
```
Clone website https://contoh.com menggunakan CodeIgniter 4, PHP, dan MySQL
```

**Langkah eksekusi:**

1. Fetch/screenshot URL target
2. Buat `.tasks/context.md` dengan hasil analisis
3. Scaffold folder CodeIgniter 4 lengkap
4. Implementasi Views per section dari navbar hingga footer
5. Buat Controllers dan Routes
6. Buat Models + Migrations jika ada konten dinamis
7. Tulis `public/assets/css/style.css` dengan CSS Variables dari target
8. Tulis `public/assets/js/main.js` untuk interaktivitas
9. Review dan iterasi

---

## File `.env` Template

```ini
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------
CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------
app.baseURL = 'http://localhost:8080/'
app.defaultLocale = 'id'
app.timezone = 'Asia/Jakarta'

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------
database.default.hostname = localhost
database.default.database = [nama_database]
database.default.username = [username]
database.default.password = [password]
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

---

## Troubleshooting

| Masalah | Solusi |
|---|---|
| Font tidak muncul | Cek URL Google Fonts atau letakkan font lokal di `public/assets/fonts/` |
| Gambar tidak tampil | Pastikan path menggunakan `base_url('assets/images/...')` |
| CSS tidak berubah setelah edit | Hard refresh browser (Ctrl+Shift+R) atau tambahkan cache-busting `?v=1` |
| 404 pada route | Pastikan `mod_rewrite` aktif dan `.htaccess` ada di folder `public/` |
| Database connection error | Cek konfigurasi `.env` dan pastikan MySQL service berjalan |
| Flutter web tidak bisa di-inspect | Gunakan screenshot + color picker; rebuild manual dari visual |
