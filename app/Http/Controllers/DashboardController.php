<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;

class DashboardController extends Controller
{
    public function index()
    {
        $jmlKos = Kos::where('status','=','aktifkan')->count();
        return view('pages.dashboard.index', compact('jmlKos'));
    }
}
