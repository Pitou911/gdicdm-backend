<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller {
    public function index() {
        return response()->json(News::where('featured', false)->orderByDesc('id')->get());
    }

    public function featured() {
        return response()->json(News::where('featured', true)->first());
    }
    public function show($id) {
        return response()->json(\App\Models\News::findOrFail($id));
    }
}