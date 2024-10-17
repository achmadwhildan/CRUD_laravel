@extends('layouts.template')

@section('content')
        <form action="{{ route('datas.store') }}" method="post" class="card p-5">

            @csrf

            @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <h1 class="rombel text-center">Data Siswa</h1>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">NIS :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="nis" name="nis">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Kelas: </label>
                <div class="col-sm-10">
                    <select class="form-select" name="kelas" id="kelas">
                        <option selected disabled hidden>Pilih</option>
                        <option value="X" {{ old('kelas', $dataSiswa['kelas'] ?? '') == 'X' ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ old('kelas', $dataSiswa['kelas'] ?? '') == 'XI' ? 'selected' : '' }}>XI</option>
                        <option value="XII" {{ old('kelas', $dataSiswa['kelas'] ?? '') == 'XII' ? 'selected' : '' }}>XII</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="asalSekolah" class="col-sm-2 col-form-label">Asal Sekolah :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="asalSekolah" name="asalSekolah">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
        </form>
@endsection