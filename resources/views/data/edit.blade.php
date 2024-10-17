@extends('layouts.template')

@section('content')
    <form action="{{ route('datas.update', $dataSiswa['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Siswa :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $dataSiswa['nama'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">Nis :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nis" name="nis" value="{{ $dataSiswa['nis'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas: </label>
            <div class="col-sm-10">
                <select class="form-select" name="kelas" id="kelas">
                    <option selected disabled hidden>Pilih</option>
                    <option value="X" {{ old('X') == 'X' ? 'selected' : '' }}>X</option>
                    <option value="XI" {{ old('XI') == 'XI' ? 'selected' : '' }}>XI</option>
                    <option value="XII" {{ old('XII') == 'XII' ? 'selected' : '' }}>XII</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="asalSekolah" class="col-sm-2 col-form-label">Asal Sekolah :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="asalSekolah" name="asalSekolah" value="{{ $dataSiswa['asalSekolah'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mte-3">Ubah Data</button>
    </form>
@endsection