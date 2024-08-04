@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-body">
        <table class="table table-striped text-center" id="logTable">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Perangkat</th>
                    <th>Jam Pinjam</th>
                    <th>Jam Pengembalian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->nama }}</td>
                    <td>{{ $peminjaman->perangkat->nama }}</td>
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
<script>
    let table = new DataTable('#logTable');

    setInterval(async () => {
        const req = await fetch(`{{ asset('/get-data-log') }}`);
        const res = await req.json();
        const data = res.map(item => [
                            item.nama,
                            item.perangkat.nama,
                            item.jam_masuk,
                            item.jam_keluar || "N/A",
                            item.jam_keluar ? `<form action="{{ asset("/log/") }}/${item.id}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-warning">Hapus</button>
                                                </form>` : 'N/A'
                        ]);
        
        table.clear();
        table.rows.add(data);
        table.draw();
        // res.forEach((r) => {
        //     let tr = document.createElement('tr');
        //     console.log(r);

        //     let td1 = r.nama;
        //     let td2 = r.
        //     // r.forEach((el) => {
        //     //     let td = document.createElement('td');
        //     //     td.innerHTML = el;
        //     //     tr.appendChild(td);
        //     // })

        //     let action = document.createElement('td');

        // });
    }, 500);
</script>
@endsection