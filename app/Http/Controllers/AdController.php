<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        // Tüm reklam verilerini getir
        $ads = Ad::all();
        return response()->json($ads);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'impressions' => 'required|integer',
            'clicks' => 'required|integer',
            'spend' => 'required|numeric',
            'revenue' => 'required|numeric',
        ]);
    
        $ad = Ad::create($validatedData);
    
        return response()->json($ad, 201);
    }
    

    public function show($id)
    {
        // Belirli bir reklam verisini getir
        $ad = Ad::find($id);
        return response()->json($ad);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'impressions' => 'required|integer',
            'clicks' => 'required|integer',
            'spend' => 'required|numeric',
            'revenue' => 'required|numeric',
        ]);
    
        $ad = Ad::findOrFail($id);
        $ad->update($validatedData);
    
        return response()->json($ad, 200);
    }
    

    public function destroy($id)
    {
        // Belirli bir reklam verisini sil
    }

    public function showDashboard()
    {
        $ads = Ad::all();
        return view('dashboard', compact('ads'));
    }

    // Metrikleri Hesaplayan Fonksiyonlar:
    public function calculateCPC($spend, $clicks)
    {
        return ($clicks != 0) ? ($spend / $clicks) : 0;
    }

    public function calculateCPI($spend, $impressions)
    {
        return ($impressions != 0) ? ($spend / $impressions) : 0;
    }

    public function calculateROI($revenue, $spend)
    {
        return ($spend != 0) ? (($revenue - $spend) / $spend * 100) : 0;
    }
}

