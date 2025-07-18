<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CryptoNewsController extends Controller
{
    public function index()
    {
        $apiKey = env('GNEWS_API_KEY');
        $url = "https://gnews.io/api/v4/search?q=crypto&lang=en&token={$apiKey}";

        $response = Http::withoutVerifying()->get($url);

        if ($response->successful()) {
            $news = $response->json()['articles'];
            return view('news', compact('news'));
        }

        return response()->json(['error' => 'Unable to fetch news.']);
    }
}
