@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-body">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Perangkat</th>
                    <th>Jumlah</th>
                    <th>Jam Pinjam</th>
                    <th>Jam Pengembalian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->user->username }}</td>
                    <td>{{ $peminjaman->perangkat->nama }}</td>
                    <td>{{ $peminjaman->jumlah }}</td>
                    <td>{{ $peminjaman->jam_masuk }}</td>
                    <td>{{ $peminjaman->jam_keluar ? $peminjaman->jam_keluar : 'N/A' }}</td>
                    <td>
                        @if($peminjaman->jam_keluar)
                        <form action="{{ url("/log/$peminjaman->id") }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-warning">Hapus</button>
                        </form>
                        @else
                        <span>N/A</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection