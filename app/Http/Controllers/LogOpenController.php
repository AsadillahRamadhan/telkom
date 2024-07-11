<?php

namespace App\Http\Controllers;

use App\Models\OpenLog;
use Illuminate\Http\Request;

class LogOpenController extends Controller
{
    public function index(){
        return view('log-akses.index', [
            'openlog' => OpenLog::orderBy('jam', 'DESC')->get(),
            'title' => 'Log Akses'
        ]);
    }
}
