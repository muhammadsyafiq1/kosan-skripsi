<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kos;

class KosController extends Controller
{
    public function getKos(Request $request)
    {
        $kos = new Kos();
        return $kos->getKos($request->lat, $request->lng, $request->rad)->get();
    }
}
