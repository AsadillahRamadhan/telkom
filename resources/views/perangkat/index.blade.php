@extends('layouts.main')
@section('container')
<form action="{{ url('perangkat') }}" method="POST">
    @csrf
    <div class="modal fade" id="addPerangkat" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5"">Add Perangkat</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" id="jenis" class="form-control">
                    <option value="AVOMETER">AVOMETER</option>
                    <option value="TANG METER">TANG METER</option>
                    <option value="GROUNDING TESTER">GROUNDING TESTER</option>
                </select>
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
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPerangkat">Tambah Perangkat</button>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perangkats as $perangkat)
                <tr>
                    <td>{{ $perangkat->nama }}</td>
                    <td>{{ $perangkat->jenis }}</td>
                    <td>{{ $perangkat->stok }}</td>
                    <td>
                        <form action="{{ url("/perangkat/$perangkat->id") }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                            <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#addStok{{ $perangkat->id }}">Tambah Stok</button>
                        </form>
                        
                    </td>
                </tr>
                <form action="{{ url("perangkat/$perangkat->id") }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal fade" id="addStok{{ $perangkat->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5"">Add Stok {{ $perangkat->nama }}</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="stok">Stok Tambahan</label>
                                <input type="number" name="stok" id="stok" class="form-control" required>
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection