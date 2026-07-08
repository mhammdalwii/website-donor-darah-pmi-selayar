<?php

namespace App\Http\Controllers;

use App\Models\StokDarah;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\Pendonor;
use App\Models\Jadwal;
use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        // Setup SEO untuk Landing Page
        SEOMeta::setTitle('PMI Selayar - Layanan Informasi Donor Darah');
        SEOMeta::setDescription('Layanan informasi resmi donor darah Kabupaten Kepulauan Selayar. Selamatkan jiwa, mulai dari Anda.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Layanan informasi resmi donor darah Kabupaten Kepulauan Selayar. Selamatkan jiwa, mulai dari Anda.');
        OpenGraph::setTitle('PMI Selayar - Layanan Informasi Donor Darah');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');

        // Mengambil data Stok Darah dari Database Anda
        $stokA = StokDarah::where('golongan_darah', 'A')->value('jumlah_kantong') ?? 0;
        $stokB = StokDarah::where('golongan_darah', 'B')->value('jumlah_kantong') ?? 0;
        $stokAB = StokDarah::where('golongan_darah', 'AB')->value('jumlah_kantong') ?? 0;
        $stokO = StokDarah::where('golongan_darah', 'O')->value('jumlah_kantong') ?? 0;

        // 1. Tambahan: Ambil 5 data pendonor terbaru untuk dipasang di Beranda
        $pendonors = Pendonor::latest()->take(5)->get();


        $beritas = Berita::where('status', 'publish')
            ->orderBy('tanggal_publikasi', 'desc')
            ->take(3)
            ->get();

        // Mengirimkan semua variabel yang dibutuhkan ke view 'pages.home'
        return view('pages.home', compact('stokA', 'stokB', 'stokAB', 'stokO', 'pendonors', 'beritas'));
    }

    public function daftar()
    {
        SEOMeta::setTitle('Daftar Pendonor - PMI Selayar');
        SEOMeta::setDescription('Daftar pahlawan kemanusiaan yang terdaftar sebagai pendonor darah di PMI Kabupaten Kepulauan Selayar.');

        $pendonors = Pendonor::latest()->paginate(15);

        return view('pages.donor.daftar', compact('pendonors'));
    }

    public function jadwal()
    {
        SEOMeta::setTitle('Jadwal Mobile Unit - PMI Selayar');
        SEOMeta::setDescription('Jadwal dan lokasi kegiatan donor darah keliling (Mobile Unit) resmi di wilayah Kabupaten Kepulauan Selayar.');

        // Mengambil seluruh jadwal kegiatan, diurutkan dari tanggal paling dekat ke depan
        $jadwals = Jadwal::orderBy('tanggal', 'asc')->get();

        // Mengarahkan ke file view di folder pages/donor/jadwal.blade.php
        return view('pages.donor.jadwal', compact('jadwals'));
    }

    public function berita()
    {
        SEOMeta::setTitle('Berita & Artikel - PMI Selayar');
        SEOMeta::setDescription('Kumpulan berita, artikel, dan informasi kegiatan terbaru dari PMI Kabupaten Kepulauan Selayar.');

        //  berita yang statusnya publish, urutkan dari yang terbaru, limit 9 per halaman
        $beritas = Berita::where('status', 'publish')
            ->orderBy('tanggal_publikasi', 'desc')
            ->paginate(9);

        return view('pages.berita.index', compact('beritas'));
    }

    public function showBerita($id)
    {
        // Cari berita berdasarkan ID, dan pastikan statusnya publish
        $berita = Berita::where('id', $id)->where('status', 'publish')->firstOrFail();

        // Setup SEO Khusus untuk Halaman Detail Berita
        SEOMeta::setTitle($berita->judul . ' - PMI Selayar');
        SEOMeta::setDescription(\Illuminate\Support\Str::limit(strip_tags($berita->konten), 150));

        OpenGraph::setTitle($berita->judul . ' - PMI Selayar');
        OpenGraph::setDescription(\Illuminate\Support\Str::limit(strip_tags($berita->konten), 150));

        if ($berita->gambar) {
            // Jika ada gambar, tampilkan gambar tersebut saat link di-share
            OpenGraph::addImage(asset('uploads/' . $berita->gambar));
        }

        return view('pages.berita.show', compact('berita'));
    }

    public function galeri()
    {
        SEOMeta::setTitle('Galeri Kegiatan - PMI Selayar');
        SEOMeta::setDescription('Dokumentasi dan galeri foto kegiatan kemanusiaan PMI Kabupaten Kepulauan Selayar.');

        // Mengambil foto dari yang terbaru, 12 foto per halaman
        $galeris = Galeri::latest()->paginate(16);

        // Arahkan ke file view galeri Anda
        return view('pages.galeri.galeri', compact('galeris'));
    }

    public function syarat()
    {
        SEOMeta::setTitle('Syarat & Manfaat Donor Darah - PMI Selayar');
        SEOMeta::setDescription('Informasi lengkap mengenai syarat, ketentuan, alur, dan manfaat melakukan donor darah di PMI Kabupaten Kepulauan Selayar.');

        return view('pages.donor.syarat');
    }

    public function visiMisi()
    {
        SEOMeta::setTitle('Visi & Misi - PMI Selayar');
        SEOMeta::setDescription('Visi dan Misi Palang Merah Indonesia (PMI) Kabupaten Kepulauan Selayar dalam melayani kemanusiaan.');

        return view('pages.profil.visi-misi');
    }
}
