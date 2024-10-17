<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $datas = Data::where('nama', 'LIKE', '%' . $request->search_data . '%')->orderBy('nama', 'ASC')->simplePaginate(5);
        return view('data.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nis' => 'required|numeric',
            'kelas' => 'required|string', // Ubah kelas menjadi string
            'asalSekolah' => 'required|string',
        ], [
            'name.required' => 'Nama harus diisi!',
            'nis.required' => 'nis harus diisi!',
            'kelas.required' => 'kelas harus diisi!',
            'name.max' => 'Nama obat maksimal 100 karakter!',
            'role.required' => 'role harus diisi!',
        ]);

        Data::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'asalSekolah' => $request->asalSekolah,
        ]);

        return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataSiswa = Data::find($id);

        if ($dataSiswa) {
            return view('data.edit', compact('dataSiswa'));
        } else {
        return redirect()->route('datas.index')->with('error', 'Data siswa tidak ditemukan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nis' => 'required|numeric',
            'kelas' => 'required',
            'asalSekolah' => 'required',
        ], [
            'name.required' => 'Nama harus diisi!',
            'nis.required' => 'Nis harus diisi!',
            'kelas.required' => 'Kelas harus diisi!',
            'asalSekolah.required' => 'Asal sekolah harus diisi!',
            'nama.max' => 'Nama obat maksimal 100 karakter!',
            'nis.min' => 'Tipe obat minimal 10 karakter!',
            'kelas.numeric' => 'Kelas harus berupa angka!',
        ]);


        Data::where('id', $id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'asalSekolah' => $request->asalSekolah,
        ]);

        $dataBefore = Data::where('id', $id)->first();

        $proses = $dataBefore->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        if ($proses) {
            return redirect()->route('datas.index')->with('success', 'Berhasil mengubah data siswa!');
        } else {
            return redirect()->back()->with('failed', 'Gagal mengubah data siswa!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Data::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
