<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{

    //Read
    public function index()
    {
        $karyawan = Karyawan::all(); //select * from karyawan

        return view('karyawan.index', ['karyawan' => $karyawan]);

    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
        ]);

        Karyawan::create([
            'nama' => $validatedData['nama'],
            'posisi' => $validatedData['posisi'],
        ]);

        return redirect('/karyawan');
    }

    public function update($id, Request $request)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
        ]);

        $karyawan -> update ([
            'nama' => $request -> nama,
            'posisi' => $request -> posisi
        ]);

        return redirect('/karyawan');
    }

    public function destroy($id) {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect('/karyawan');
    }

    public function show()
    { 
        return view ('karyawan.tambah');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        return view('karyawan.edit', ['karyawan' => $karyawan]);
    }

}
