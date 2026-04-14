<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\Karyawan;

class GajiController extends Controller
{
    
    public function index(Request $request)
    {
    $query = Gaji::with('karyawan');

    if ($request->search) {
        $query->whereHas('karyawan', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    $gaji = $query->get();

    return view('gaji.index', compact('gaji'));
    }

    // CREATE (Form tambah)
    public function show()
    {
        // ambil semua karyawan untuk dropdown
        $karyawan = Karyawan::all();

        return view('gaji.tambah', compact('karyawan'));
    }

    // STORE (Simpan data)
    public function store(Request $request)
    {
        // validasi
        $validatedData = $request->validate([
            'karyawan_id' => 'required',
            'gaji' => 'required|numeric',
        ]);

        // simpan ke database
        Gaji::create([
            'karyawan_id' => $validatedData['karyawan_id'],
            'gaji' => $validatedData['gaji'],
        ]);

        // redirect ke halaman index
        return redirect('/gaji');
    }

    // EDIT (Form edit)
    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);
        $karyawan = Karyawan::all();

        return view('gaji.edit', compact('gaji', 'karyawan'));
    }

    // UPDATE (Update data)
    public function update($id, Request $request)
    {
        $gaji = Gaji::findOrFail($id);

        $request->validate([
            'karyawan_id' => 'required',
            'gaji' => 'required|numeric',
        ]);

        $gaji->update([
            'karyawan_id' => $request->karyawan_id,
            'gaji' => $request->gaji,
        ]);

        return redirect('/gaji');
    }

    // DELETE (Hapus data)
    public function destroy($id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->delete();

        return redirect('/gaji');
    }

    


}