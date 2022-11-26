<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormAbsensi;

class FormAbsensiController extends Controller
{
    //
    public function index()
    {
        $formAbsensi = new FormAbsensi();
        return view('form-absensi', compact('formAbsensi'));
    }

    public function store(Request $request)
    {


        $formAbsensi = FormAbsensi::create([
            'name' => $request->name,
            'email' => $request->email,
            'kehadiran' => $request->kehadiran,
            'keterangan' => $request->keterangan,
            'waktu_absensi' => $request->waktu_absensi
        ]);
        $formAbsensi->save();
        return redirect('/home');
    }

    public function edit(FormAbsensi $formAbsensi)
    {

        $formAbsensi = FormAbsensi::where('id', $formAbsensi->id)->first();
        return view('form-absensi', compact('formAbsensi'));
    }

    public function update(FormAbsensi $formAbsensi,Request $request)
    {

        $formAbsensi = FormAbsensi::where('id', $formAbsensi->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'kehadiran' => $request->kehadiran,
            'keterangan' => $request->keterangan,
            'waktu_absensi' => $request->waktu_absensi,
        ]);
        return redirect('/rekapitulasi');
    }

    public function destroy(FormAbsensi $formAbsensi)
    {
        FormAbsensi::find($formAbsensi->id)->delete();
        return redirect('/rekapitulasi');
    }
}
