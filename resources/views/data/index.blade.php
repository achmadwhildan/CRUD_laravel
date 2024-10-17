@extends('layouts.template')

@section('content')
        <table class="table table-striped table-bordered table-hover" style="margin-top: 30px">

            <div class="d-flex justify-content-end my-3">
                <form method="GET" action="{{ route('datas.index') }}">
                    
                    <div class="d-flex">
                        <input type="text" name="search_data" class="form_control" placeholder="Cari nama data siswa..">
                        <button type="submit" class="btn btn-success ms-2">Cari</button>
                    </div>
                </form>

            </div>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nis</th>
                    <th>Kelas</th>
                    <th>Asal Sekolah</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @if (count($datas) < 1)
                <tr>
                    <td colspan="6" class="text-center">Data Siswa Kosong</td>
                </tr>
            @else
                @foreach ($datas as $index => $data)
                    <tr>
                        <td>{{ ($datas->currentPage() - 1) * $datas->perPage() + ($index + 1) }}</td>
                        <td>{{ $data['nama'] }}</td>
                        <td>{{ $data['nis'] }}</td>
                        <td>{{ $data['kelas'] }}</td>
                        <td>{{ $data['asalSekolah'] }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('datas.edit', $data['id']) }}" class="btn btn-warning me-3"><i class="bi bi-pencil-square"></i> Edit</a>
                            <form action="{{ route('datas.delete', $data['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="container">

            <table class="table table-bordered table striped">
            </table>

            <div class="d-flex justify-content-end">
                {{ $datas->links() }}
            </div>
        </div>
@endsection

