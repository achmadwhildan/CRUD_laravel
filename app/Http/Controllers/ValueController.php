<?php

namespace App\Http\Controllers;

use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $values = Value::paginate(5);
        return view('value.index', compact('values'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('value.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_siswa' => 'required|min:3',
            'mata_pelajaran' => 'required',
            'nilai' => 'required|min:0|max:100', // Ubah kelas menjadi string
        ], [
            'name_siswa.required' => 'Nama harus diisi!',
            'mata_pelajaran.required' => 'nis harus diisi!',
            'kelas.required' => 'mata_pelajaran harus diisi!',
        ]);

        Value::create([
            'name_siswa' => $request->name_siswa,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai,
        ]);

        return redirect()->back()->with('success', 'Nilai siswa berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Value $value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $valueSiswa = Value::find($id);

        if ($valueSiswa) {
            return view('value.edit', compact('valueSiswa'));
        } else {
            return redirect()->route('values.index')->with('error', 'Nilai siswa tidak ditemukan!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_siswa' => 'required|string',
            'mata_pelajaran' => 'required|string',
            'nilai' => 'required|min:0|max:100',
        ], [
            'name_siswa.required' => 'Nama harus diisi!',
            'mata_pelajaran.required' => 'Nis harus diisi!',
            'nilai.required' => 'Kelas harus diisi!',
            'name_siswa.max' => 'Nama obat maksimal 100 karakter!',
        ]);

        $valueBefore = Value::where('id', $id)->first();

        $proses = $valueBefore->update([
            'name_siswa' => $request->name_siswa,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai,
        ]);

        if ($proses) {
            return redirect()->route('values.index')->with('success', 'Berhasil mengubah nilai siswa!');
        } else {
            return redirect()->back()->with('failed', 'Gagal mengubah nilai siswa!');
        }
    }

    // Menghapus nilai siswa
    public function destroy($id)
    {
        $values = Value::find($id);
        $values->delete();

        return redirect()->route('values.index')->with('success', 'Nilai siswa berhasil dihapus!');
    }
}
