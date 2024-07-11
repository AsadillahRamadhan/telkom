<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Perangkat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peminjaman.index', [
            'peminjamans' => Log::all(),
            'perangkats' => Perangkat::where('status', true)->get(),
            'title' => 'Log Peminjaman'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $perangkat = Perangkat::find($request->post('perangkat'));
        if($perangkat->stok < $request->post('jumlah')){
            return back();
        }
        Log::create([
            'user_id' => Auth::user()->id,
            'perangkat_id' => $request->post('perangkat'),
            'jumlah' => $request->post('jumlah'),
            'jam_masuk' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $perangkat = Perangkat::find($request->post('perangkat'));
        $perangkat->stok -= $request->post('jumlah');
        $perangkat->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peminjaman = Log::find($id);
        $peminjaman->jam_keluar = Carbon::now()->format('Y-m-d H:i:s');
        $peminjaman->save();

        $perangkat = Perangkat::find($peminjaman->perangkat_id);
        $perangkat->stok += $peminjaman->jumlah;
        $perangkat->save();
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
