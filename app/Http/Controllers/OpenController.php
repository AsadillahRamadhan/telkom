<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\OpenLog;
use App\Models\Perangkat;
use Carbon\Carbon;
use CURLFile;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OpenController extends Controller
{
    public function open(Request $request){
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('photos', $fileName, 'public');


        $client = new Client();
        $response = $client->request('POST', 'http://127.0.0.1:5000/predict', [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($file->getPathname(), 'r'),
                    'filename' => $file->getClientOriginalName()
                ]
            ]
        ]);

        $responseBody = json_decode($response->getBody(), true);

        if($responseBody['result'] != null){
            OpenLog::create([
                'nama' => $responseBody['result'],
                'jam' => Carbon::now()->format('Y-m-d H:i:s'),
                'link_foto' => $filePath
            ]);
            return response()->json(['success' => true], $response->getStatusCode());
        }
        return response()->json(['success' => false], $response->getStatusCode());

    }

    public function rfid(Request $request){
        $uuid = $request->post('uuid');

        if($uuid){
            $openLog = OpenLog::orderBy('jam', 'DESC')->first();
            $perangkat = Perangkat::where('uuid', $uuid)->first();
            if($perangkat->status){
                Log::create([
                    'nama' => $openLog->nama,
                    'perangkat_id' => $perangkat->id,
                    'jam_masuk' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                $perangkat->status = false;
                $perangkat->save();
            } else {
                $log = Log::where('perangkat_id', $perangkat->id)->whereNull('jam_keluar')->first();
                $log->jam_keluar = Carbon::now()->format('Y-m-d H:i:s');
                $log->save();
                $perangkat->status = true;
                $perangkat->save();
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
