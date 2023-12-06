<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class MetricsController extends Controller
{
    public function show(Request $request, $platform)
    {
        $ads = Ad::where('platform', $platform)->get();
        // Platforma özgü metrik hesaplamalarını yapabilirsiniz
        // Örneğin:
        $totalImpressions = $ads->sum('impressions');
        $totalClicks = $ads->sum('clicks');
        $totalSpend = $ads->sum('spend');
        $totalRevenue = $ads->sum('revenue');

        return view('platform_metrics', compact('ads', 'totalImpressions', 'totalClicks', 'totalSpend', 'totalRevenue'));
    }}
