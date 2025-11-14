# TODO List for CRUD Laravel Kegiatan, Panitia, Sponsor, Absensi, Catatan

## 1. Update Migrations

-   [x] Update kegiatans migration: add nama, deskripsi, tanggal, status (default 'belum_selesai')
-   [x] Update panitias migration: add nama, email, telepon
-   [x] Update sponsors migration: add nama, kontak, jenis_sponsorship
-   [x] Update absensis migration: add kegiatan_id (foreign), kelas (enum), jumlah_hadir
-   [x] Update catatans migration: add kegiatan_id (foreign), evaluasi, perbaikan
-   [x] Create kegiatan_panitia pivot migration
-   [x] Create kegiatan_sponsor pivot migration

## 2. Update Models

-   [x] Kegiatan: fillable, relationships (panitias, sponsors, absensis, catatan)
-   [x] Panitia: fillable, relationships (kegiatans)
-   [x] Sponsor: fillable, relationships (kegiatans)
-   [x] Absensi: fillable, relationships (kegiatan)
-   [x] Catatan: fillable, relationships (kegiatan)

## 3. Update Controllers

-   [x] KegiatanController: full CRUD + finish method
-   [x] PanitiaController: full CRUD + sync kegiatans
-   [x] SponsorController: full CRUD + sync kegiatans
-   [x] AbsensiController: full CRUD (only for finished kegiatan)
-   [x] CatatanController: full CRUD (only for finished kegiatan)

## 4. Update Routes

-   [x] Add POST, PUT, DELETE routes for all features

## 5. Update Views

-   [x] Kegiatan: index (table with finish button), create (form with multi-select panitia/sponsor), edit (same), modal detail
-   [x] Panitia: index (table), create (form with multi-select kegiatan), edit, modal detail
-   [x] Sponsor: index (table), create (form with multi-select kegiatan), edit, modal detail
-   [x] Absensi: index (table), create (select finished kegiatan, kelas, jumlah), edit, modal detail
-   [x] Catatan: index (table), create (select finished kegiatan, evaluasi, perbaikan), edit, modal detail

## 6. Followup

-   [x] Run migrations
-   [ ] Test functionality
