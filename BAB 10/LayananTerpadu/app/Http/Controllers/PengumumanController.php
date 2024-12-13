<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Pengumuman;
use Barryvdh\DomPDF\Facade\Pdf;
class PengumumanController extends Controller
{
    public function cetak()
       {
           $pengumuman = pengumuman::all();
           $pdf = Pdf::loadview('kelola.pengumuman',compact('pengumuman'));
           return $pdf->download('laporan-pengelola.pdf');
       }
   
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman.index', compact('pengumuman'));
    }

    public function entry()
    {
        return view('pengumuman.entry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string|max:5000',
        ]);

        Pengumuman::create($request->all());
        return redirect()->route('pengumuman.index')->with('success', 'Data berhasil ditambahkan.');

    }

    public function edit($id)
    {
        $data=Pengumuman::findOrFail($id);
        return view('pengumuman.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        Pengumuman::create($request->only(['judul', 'isi']));
        $data->update($request->only(['judul', 'isi']));

        $data=Pengumuman::findOrFail($id);
        $data->update($request->all());
        return redirect('pengumuman')->with('success', 'Data berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect('pengumuman')->with('success', 'Data berhasil dihapus.');
    }
}