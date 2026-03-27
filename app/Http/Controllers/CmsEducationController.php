<?php
namespace App\Http\Controllers;
use App\Models\CmsEducation;
use Illuminate\Http\Request;

class CmsEducationController extends Controller {

    public function index() {
        return response()->json(CmsEducation::orderByDesc('id')->get());
    }

    public function published() {
        return response()->json(CmsEducation::where('status', 'published')->orderByDesc('id')->get());
    }

    public function store(Request $request) {
        $data = $request->except('file');
        if ($request->hasFile('file')) {
            $request->validate(['file' => 'file|mimes:pdf,jpg,jpeg,png,mp4|max:102400']);
            $path             = $request->file('file')->store('cms/education', 'public');
            $data['file_url'] = '/storage/' . $path;
        }
        return response()->json(CmsEducation::create($data), 201);
    }

    public function update(Request $request, $id) {
        $item = CmsEducation::findOrFail($id);
        $data = $request->except('file');
        if ($request->hasFile('file')) {
            $request->validate(['file' => 'file|mimes:pdf,jpg,jpeg,png,mp4|max:102400']);
            $path             = $request->file('file')->store('cms/education', 'public');
            $data['file_url'] = '/storage/' . $path;
        }
        $item->update($data);
        return response()->json($item);
    }

    public function publish($id) {
        $item = CmsEducation::findOrFail($id);
        $item->update(['status' => 'published']);
        return response()->json($item);
    }

    public function destroy($id) {
        CmsEducation::findOrFail($id)->delete();
        return response()->json(['deleted' => true]);
    }
}