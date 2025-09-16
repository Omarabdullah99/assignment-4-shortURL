<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $urls = Url::where('user_id', $user->id)->get();

        return response()->json($urls);
    }

    public function shorten(Request $request)
    {
        $request->validate([
            'original_url' => 'required'
        ]);

        $user = $request->user();
        $shortCode = Str::random(6);

        while (Url::where('short_code', $shortCode)->exists()) {
            $shortCode = Str::random(6);
        }

        $url = Url::create([
            'user_id' => $user->id,
            'original_url' => $request->original_url,
            'short_code' => $shortCode,
        ]);

        return response()->json([
            'original_url' => $url->original_url,
            'short_url' => url("/{$url->short_code}"),
        ], 201);
    }
}
