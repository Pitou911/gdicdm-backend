<?php
namespace App\Http\Controllers;
use App\Models\CmsDocument;
use Illuminate\Http\Request;

class CmsDocumentController extends Controller {

    public function index() {
        return response()->json(CmsDocument::orderByDesc('id')->get());
    }

    public function published() {
        return response()->json(CmsDocument::where('status', 'published')->orderByDesc('id')->get());
    }

    public function store(Request $request) {
        $data = $request->except(['file', 'cover']);

        if ($request->hasFile('file')) {
            $request->validate(['file' => 'file|mimes:pdf|max:51200']);
            $path             = $request->file('file')->store('cms/documents', 'public');
            $data['file_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('cover')) {
            $request->validate(['cover' => 'file|mimes:jpg,jpeg,png|max:10240']);
            $path              = $request->file('cover')->store('cms/covers', 'public');
            $data['cover_url'] = '/storage/' . $path;
        }

        return response()->json(CmsDocument::create($data), 201);
    }

    public function update(Request $request, $id) {
        $item = CmsDocument::findOrFail($id);
        $data = $request->except(['file', 'cover']);

        if ($request->hasFile('file')) {
            $request->validate(['file' => 'file|mimes:pdf|max:51200']);
            $path             = $request->file('file')->store('cms/documents', 'public');
            $data['file_url'] = '/storage/' . $path;
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
        $item = CmsDocument::findOrFail($id);
        $item->update(['status' => 'published']);
        return response()->json($item);
    }

    public function destroy($id) {
        CmsDocument::findOrFail($id)->delete();
        return response()->json(['deleted' => true]);
    }
}