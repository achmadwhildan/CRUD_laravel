@extends('layouts.template')

@section('content')
        <form action="{{ route('values.update', $valueSiswa['id']) }}" method="POST" class="card p-5">

            @csrf
            @method('PATCH')
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

            <h1 class="nil text-center">Nilai Siswa</h1>

            <div class="mb-3 row">
                <label for="name_siswa" class="col-sm-2 col-form-label">Nama Siswa :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name_siswa" name="name_siswa">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="mata_pelajaran" class="col-sm-2 col-form-label">Mata Pelajaran :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nilai" class="col-sm-2 col-form-label">Nilai :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="nilai" name="nilai">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
        </form>
@endsection