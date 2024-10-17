@extends('layouts.template')

@section('content')
        <table class="table table-striped table-bordered table-hover" style="margin-top: 30px">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @if (count($values) < 1)
                <tr>
                    <td colspan="6" class="text-center">Data Siswa Kosong</td>
                </tr>
            @else
                @foreach ($values as $index => $value)
                    <tr>
                        <td>{{ ($values->currentPage() - 1) * $values->perPage() + ($index + 1) }}</td>
                        <td>{{ $value['name_siswa'] }}</td>
                        <td>{{ $value['mata_pelajaran'] }}</td>
                        <td>{{ $value['nilai'] }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('values.edit', $value['id']) }}" class="btn btn-warning me-3"><i class="bi bi-pencil-square"></i> Edit</a>
                            <form action="{{ route('values.delete', $value['id']) }}" method="POST">
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
                {{ $values->links() }}
            </div>
        </div>
@endsection

