# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

A CodeIgniter 3 PHP web application for a university "Pemrograman Web" (Web Programming) course at Universitas Bumigora. Runs on XAMPP with MySQL. The app provides authentication and CRUD management for students (Mahasiswa), faculties (Fakultas), and study programs (Prodi).

## Run Locally

- **Base URL**: `http://localhost/uas/` (configured in `application/config/config.php`)
- **Database**: MySQL database `pweb` on `localhost` (configured in `application/config/database.php`)
- **Serve**: Place in `C:\xampp\htdocs\pweb\` and start Apache + MySQL via XAMPP
- **Import DB schema**: `mysql -u root -p pweb < tugas-3.sql`

## Architecture

### MVC Pattern (CodeIgniter 3)

```
application/
├── controllers/          # Route handling & request logic
│   ├── Auth.php           # Login/logout (uses MahasiswaModel for credentials)
│   ├── Dashboard.php      # Landing page after login
│   ├── Dasar.php          # PHP basics practice (not part of the main app)
│   ├── Mahasiswa.php      # CRUD for students (reference pattern for all CRUD)
│   ├── Fakultas.php       # CRUD for faculties
│   ├── Prodi.php          # CRUD for study programs (FK to fakultas)
│   └── Welcome.php        # Default CodeIgniter welcome page
├── models/
│   ├── MahasiswaModel.php # Student data + authentication (checkAccount)
│   ├── FakultasModel.php  # Faculty data
│   └── ProdiModel.php     # Study program data (JOIN with fakultas)
├── views/
│   ├── layout/
│   │   ├── header.php     # Navbar + sidebar + offcanvas (mobile)
│   │   └── footer.php     # JS includes (DataTable, SweetAlert2, jQuery)
│   ├── auth/login.php     # Login form
│   ├── dashboard/index.php
│   ├── mahasiswa/         # Student CRUD views
│   ├── fakultas/          # Faculty CRUD views
│   └── prodi/             # Study program CRUD views
└── config/
    ├── database.php       # MySQL connection: root@localhost/pweb
    ├── autoload.php       # Auto-loads: database, session, form_validation, url, form
    └── routes.php         # Default route: dashboard
```

### CRUD Pattern (used by Mahasiswa, Fakultas, Prodi)

Every CRUD controller follows this 4-method pattern:

| Method       | Logic                                                                 |
|--------------|-----------------------------------------------------------------------|
| `index`      | Fetch all data via Model → render table view                          |
| `tambah`     | GET → show form. POST + validation passes → insert → redirect + swal  |
| `ubah($id)`  | GET → load entity by ID → show form. POST → update → redirect + swal  |
| `hapus($id)` | Check entity exists → delete → redirect + swal                        |

Each Model has: `getAll()`, `getById($id)`, `insert($data)`, `update($id, $data)`, `delete($id)`. Models use CI's Query Builder (`$this->db`).

### Key Authentication Flow

- `Auth::index()` → validates email/password → `MahasiswaModel::checkAccount()` (SHA1 password) → sets `user` session
- Every protected controller's `__construct()` checks `$this->session->userdata('user')` and redirects to `auth` if absent
- `Auth::logout()` destroys session

### View Template & Frontend

- **Layout**: `header.php` opens HTML, renders sidebar/navbar, sets `$title`. `footer.php` closes HTML with JS includes.
- **DataTable**: Tables with `id="datatable"` auto-initialized via footer.php with Indonesian locale.
- **SweetAlert2**: Flashdata-based (`$this->session->set_flashdata('swal', [...])`). Delete buttons with `class="btn-hapus"` get auto-confirmation.
- **Form validation**: Server-side via CI `form_validation`. Error state applies `is-invalid` class with red border; valid fields get `is-valid` with green border. Uses `set_value()` for repopulation.

### Database

- **Name**: `pweb`
- **Engine**: MySQL (mysqli driver)
- **Tables**: `mahasiswa`, `fakultas`, `prodi` (prodi.fakultas_id → fakultas.fakultas_id, ON DELETE CASCADE)
- **Passwords**: SHA1 hash (plain `sha1()`)

### Dependencies (all CDN-loaded)

- Bootstrap 5.3.5, Bootstrap Icons 1.11.3
- jQuery 3.7.1
- DataTables 1.13.8 (Bootstrap 5 integration)
- SweetAlert2
