@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-body">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jam Buka</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($openlog as $log)
                <tr>
                    <td>{{ $log->nama }}</td>
                    <td>{{ $log->jam }}</td>
                    <td><img width="50" height="50" src="{{ asset('/storage/' . $log->link_foto) }}" alt="{{ $log->nama }}"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection