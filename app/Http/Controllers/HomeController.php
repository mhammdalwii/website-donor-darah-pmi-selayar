<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

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

        return view('pages.home');
    }
}
