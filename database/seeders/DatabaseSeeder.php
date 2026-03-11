<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // ==================== TABEL KEGIATANS ====================
        DB::table('kegiatans')->insert([
            [
                'nama' => 'Workshop Laravel',
                'tanggal' => '2026-04-01',
                'lokasi' => 'Aula SMK',
                'status' => 'belum_selesai',
            ],
            [
                'nama' => 'Seminar AI',
                'tanggal' => '2026-04-05',
                'lokasi' => 'Lab Komputer',
                'status' => 'selesai',
            ],
            [
                'nama' => 'Pelatihan Desain Grafis',
                'tanggal' => '2026-04-10',
                'lokasi' => 'Ruang Multimedia',
                'status' => 'belum_selesai',
            ],
            [
                'nama' => 'Lomba Robotik',
                'tanggal' => '2026-04-15',
                'lokasi' => 'Lapangan',
                'status' => 'selesai',
            ],
            [
                'nama' => 'Studi Banding Industri',
                'tanggal' => '2026-04-20',
                'lokasi' => 'Pabrik XYZ',
                'status' => 'belum_selesai',
            ],
        ]);

        // ==================== TABEL PANITIAS ====================
        DB::table('panitias')->insert([
            [
                'nama' => 'Ahmad Fauzi',
                'jabatan' => 'Ketua',
                'kelas' => 'X RPL',
                'telepon' => '081234567890',
                'quotes' => 'Semangat dan disiplin!',
            ],
            [
                'nama' => 'Siti Aisyah',
                'jabatan' => 'Sekretaris',
                'kelas' => 'XI TKJ',
                'telepon' => '082345678901',
                'quotes' => 'Kerja sama adalah kunci sukses.',
            ],
            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'Bendahara',
                'kelas' => 'XII RPL',
                'telepon' => '083456789012',
                'quotes' => 'Hidup itu belajar terus.',
            ],
            [
                'nama' => 'Rina Wijaya',
                'jabatan' => 'Koordinator Acara',
                'kelas' => 'XI RPL',
                'telepon' => '084567890123',
                'quotes' => 'Plan your work, work your plan.',
            ],
            [
                'nama' => 'Dedi Pratama',
                'jabatan' => 'Koordinator Dokumentasi',
                'kelas' => 'X TKJ',
                'telepon' => '085678901234',
                'quotes' => 'Dokumentasi adalah kenangan terbaik.',
            ],
        ]);

        // ==================== TABEL ABSENSIS ====================
        DB::table('absensis')->insert([
            [
                'kegiatan' => 'Workshop Laravel',
                'kelas' => 'X RPL',
                'jumlah_hadir' => 25,
            ],
            [
                'kegiatan' => 'Seminar AI',
                'kelas' => 'XI TKJ',
                'jumlah_hadir' => 30,
            ],
            [
                'kegiatan' => 'Pelatihan Desain Grafis',
                'kelas' => 'XII RPL',
                'jumlah_hadir' => 20,
            ],
            [
                'kegiatan' => 'Lomba Robotik',
                'kelas' => 'XI RPL',
                'jumlah_hadir' => 28,
            ],
            [
                'kegiatan' => 'Studi Banding Industri',
                'kelas' => 'X TKJ',
                'jumlah_hadir' => 22,
            ],
        ]);

        // ==================== TABEL SPONSORS ====================
        DB::table('sponsors')->insert([
            [
                'nama_sponsor' => 'PT. Teknologi Maju',
                'email_sponsor' => 'info@teknologimaju.com',
                'kegiatan_sponsor' => 'Workshop Laravel',
            ],
            [
                'nama_sponsor' => 'CV. Kreatif Media',
                'email_sponsor' => 'contact@kreatifmedia.com',
                'kegiatan_sponsor' => 'Seminar AI',
            ],
            [
                'nama_sponsor' => 'PT. Robotik Nusantara',
                'email_sponsor' => 'support@robotiknusantara.com',
                'kegiatan_sponsor' => 'Lomba Robotik',
            ],
            [
                'nama_sponsor' => 'SMK Alumni Association',
                'email_sponsor' => 'alumni@smk.edu',
                'kegiatan_sponsor' => 'Pelatihan Desain Grafis',
            ],
            [
                'nama_sponsor' => 'Pabrik XYZ',
                'email_sponsor' => 'marketing@pabrikxyz.com',
                'kegiatan_sponsor' => 'Studi Banding Industri',
            ],
        ]);

        // ==================== TABEL CATATANS ====================
        DB::table('catatans')->insert([
            [
                'kegiatan' => 'Workshop Laravel',
                'catatan' => 'Persiapkan materi dan perangkat komputer.',
            ],
            [
                'kegiatan' => 'Seminar AI',
                'catatan' => 'Pastikan speaker hadir tepat waktu.',
            ],
            [
                'kegiatan' => 'Pelatihan Desain Grafis',
                'catatan' => 'Siapkan software dan template latihan.',
            ],
            [
                'kegiatan' => 'Lomba Robotik',
                'catatan' => 'Cek semua robot peserta sebelum lomba.',
            ],
            [
                'kegiatan' => 'Studi Banding Industri',
                'catatan' => 'Konfirmasi transportasi dan izin kunjungan.',
            ],
        ]);
    }
}
