<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller {
    public function index() {
        return response()->json(News::where('featured', false)->orderByDesc('id')->get());
    }

    public function featured() {
    // try latest cms_news first
    $latest = \App\Models\CmsNews::where('status', 'published')
        ->orderByDesc('id')
        ->first();

    if ($latest) {
        return response()->json([
            'id'       => $latest->id,
            'chip'     => '⭐ Latest · ' . $latest->category,
            'title'    => $latest->title,
            'excerpt'  => $latest->description,
            'date'     => $latest->date,
            'link_text'=> 'Read Full Article →',
            'icon'     => '🏛',
            'image_url'=> $latest->image_url ? 'http://localhost:8000' . $latest->image_url : null,
        ]);
    }

    // fallback — latest from seeded news table
    $seeded = \App\Models\News::where('featured', false)
        ->orderByDesc('id')
        ->first();

    if ($seeded) {
        return response()->json([
            'id'       => $seeded->id,
            'chip'     => '⭐ Latest · ' . $seeded->category,
            'title'    => $seeded->title,
            'excerpt'  => $seeded->excerpt,
            'date'     => $seeded->date,
            'link_text'=> 'Read Full Article →',
            'icon'     => $seeded->icon,
            'image_url'=> null,
        ]);
    }

    return response()->json(null);
}
    public function show($id) {
        return response()->json(\App\Models\News::findOrFail($id));
    }
}