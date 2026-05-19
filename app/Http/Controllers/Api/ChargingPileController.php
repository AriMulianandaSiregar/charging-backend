<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChargingPile;

class ChargingPileController extends Controller
{
    public function update(Request $request)
    {
        // validasi input dari ChargingPile
        $request->validate([
            'chargerName' => 'required|string',
            'statusphs' => 'required|integer',
        ]);

        // cari charger berdasarkan chargerName
        $ChargingPile = ChargingPile::where('chargerName', $request->chargerName)->first();

        if (!$ChargingPile) {
            return response()->json([
                'message' => 'Charging pile tidak ditemukan'
            ], 404);
        }

        // update status
        $ChargingPile->phsStatus = $request->statusphs;
        $ChargingPile->save();

        return response()->json([
            'message' => 'Status berhasil diupdate',
            'data' => $ChargingPile
        ]);
    }
}