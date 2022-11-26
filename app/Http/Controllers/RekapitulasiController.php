<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormAbsensi;

class RekapitulasiController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'Admin') {
            $rekapitulasi = FormAbsensi::all();
            return view('rekapitulasi', compact('rekapitulasi'));
        }else{
            $rekapitulasi = FormAbsensi::where('name', auth()->user()->name)->get();
            return view('rekapitulasi', compact('rekapitulasi'));
        }

    }


}
