@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-body">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Perangkat</th>
                    <th>Peminjam</th>
                    <th>Jam Pinjam</th>
                    <th>Jam Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->perangkat->nama }}</td>
                    <td>{{ $peminjaman->nama }}</td>
                    <td>{{ $peminjaman->jam_masuk }}</td>
                    <td>{{ $peminjaman->jam_keluar ? $peminjaman->jam_keluar : 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection