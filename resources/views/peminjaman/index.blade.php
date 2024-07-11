@extends('layouts.main')
@section('container')
<form action="{{ url('peminjaman') }}" method="POST">
    @csrf
    <div class="modal fade" id="peminjaman" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5">Peminjaman</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="perangkat">Perangkat</label>
                    <select name="perangkat" class="form-control" id="perangkat">
                        @foreach($perangkats as $perangkat)
                        <option value="{{ $perangkat->id }}">{{ $perangkat->nama }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
    </div>
</form>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#peminjaman">Peminjaman</button>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
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
                    <td>{{ $peminjaman->perangkat->nama }}</td>
                    <td>{{ $peminjaman->jumlah }}</td>
                    <td>{{ $peminjaman->jam_masuk }}</td>
                    <td>{{ $peminjaman->jam_keluar ? $peminjaman->jam_keluar : 'N/A' }}</td>
                    <td>
                        @if(!$peminjaman->jam_keluar)
                        <form action="{{ url("/peminjaman/$peminjaman->id") }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-warning">Kembalikan</button>
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