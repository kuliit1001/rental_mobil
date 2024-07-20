<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Merk;
use App\Models\TipeMobil;
use Illuminate\Support\Facades\DB;

class MobilController extends Controller
{
    protected $arrayMobil = [];

    public function index()
    {
        $dataMobil = DB::table('mobils')
            ->join('merks', 'mobils.merk_id', '=', 'merks.id')
            ->join('tipemobils', 'mobils.tipe_mobil_id', '=', 'tipemobils.id')
            ->select('mobils.*', 'merks.merk as nama_merk', 'tipemobils.tipe as nama_tipe')
            ->get();
        // dd($dataMobil);
        return view('mobil.index', compact('dataMobil'));
    }

    public function create()
    {
        $merks = Merk::all();
        $tipemobils = TipeMobil::all();
        return view('mobil.form', compact(['merks','tipemobils']));
    }

    public function store(Request $request)
{
    // dd($request);
    // Proses penyimpanan data mobil
    $mobil = new Mobil();
    $mobil->nama_mobil = $request->nama_mobil;
    $mobil->merk_id = $request->merk_id;
    $mobil->tipe_mobil_id = $request->tipe_id; // Ubah merk_id menjadi tipe_id
    $mobil->cc = $request->cc;
    $mobil->nomor_polisi = $request->nomor_polisi;
    $mobil->warna = $request->warna;
    $mobil->tahun_mobil = $request->tahun_mobil;
     // Simpan file foto ke dalam direktori public/images
     if ($request->hasFile('foto')) {
        $fotoName = time() . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('images'), $fotoName);
        $mobil->foto = $fotoName;
    }
    // Simpan data mobil
    $mobil->save();

    // Redirect ke halaman mobil dengan pesan sukses
    return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil disimpan.');
}

public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        $merks = Merk::all();
        $tipemobils = TipeMobil::all();
        return view('mobil.edit', compact('mobil', 'merks', 'tipemobils'));
    }



    public function update(Request $request, $id)
    {

        $mobil = Mobil::findOrFail($id);
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->merk_id = $request->merk_id;
        $mobil->tipe_mobil_id = $request->tipe_id;
        $mobil->cc = $request->cc;
        $mobil->nomor_polisi = $request->nomor_polisi;
        $mobil->warna = $request->warna;
        $mobil->tahun_mobil = $request->tahun_mobil;

        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fotoName);
            $mobil->foto = $fotoName;
        }

        $mobil->save();

        return redirect('/mobil')->with('success', 'Data mobil berhasil diupdate.');
    }

    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);
        if ($mobil->foto && file_exists(public_path('images/' . $mobil->foto))) {
            unlink(public_path('images/' . $mobil->foto));
        }
        $mobil->delete();

        return redirect('/mobil')->with('success', 'Data mobil berhasil dihapus.');
    }
}
