<?php
namespace App\Http\Controllers;
use App\Models\CmsNews;
use Illuminate\Http\Request;

class CmsNewsController extends Controller {

    public function index() {
        return response()->json(CmsNews::orderByDesc('id')->get());
    }

    public function published() {
        return response()->json(CmsNews::where('status', 'published')->orderByDesc('id')->get());
    }

    public function show($id) {
        return response()->json(CmsNews::findOrFail($id));
    }

    public function store(Request $request) {
        $data = $request->except(['file', 'image', 'cover']);

        // news image
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'file|mimes:jpg,jpeg,png|max:10240']);
            $path              = $request->file('image')->store('cms/news', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        // cover image
        if ($request->hasFile('cover')) {
            $request->validate(['cover' => 'file|mimes:jpg,jpeg,png|max:10240']);
            $path              = $request->file('cover')->store('cms/covers', 'public');
            $data['cover_url'] = '/storage/' . $path;
        }

        return response()->json(CmsNews::create($data), 201);
    }

    public function update(Request $request, $id) {
        $item = CmsNews::findOrFail($id);
        $data = $request->except(['image', 'cover']);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'file|mimes:jpg,jpeg,png|max:10240']);
            $path              = $request->file('image')->store('cms/news', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('cover')) {
            $request->validate(['cover' => 'file|mimes:jpg,jpeg,png|max:10240']);
            $path              = $request->file('cover')->store('cms/covers', 'public');
            $data['cover_url'] = '/storage/' . $path;
        }

        $item->update($data);
        return response()->json($item);
    }

    public function publish($id) {
        $item = CmsNews::findOrFail($id);
        $item->update(['status' => 'published']);
        return response()->json($item);
    }

    public function destroy($id) {
        CmsNews::findOrFail($id)->delete();
        return response()->json(['deleted' => true]);
    }
}