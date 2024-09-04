<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Berita;
use App\Models\Brosur;
use App\Models\Materi;
use App\Models\Panduan;

class IndexController extends Controller
{
    //
    public function index()
        {
            $beritaTerbaru = Berita::where('status', 'accept')->orderBy('created_at', 'desc')->take(8)->get();
            $brosurTerbaru = Brosur::orderBy('created_at', 'desc')->take(1)->get();
            $materiTerbaru = Materi::orderBy('created_at', 'desc')->take(6)->get();
            $panduanTerbaru = Panduan::orderBy('created_at', 'desc')->take(1)->get();

            return view('index', compact('beritaTerbaru', 'brosurTerbaru', 'materiTerbaru', 'panduanTerbaru'));
        }
}
