<?php
namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Document;
use App\Models\Resource;
use App\Models\News;
use Illuminate\Http\Request;

class UploadController extends Controller {

    public function index() {
        $documents = Document::orderByDesc('id')->get()->map(fn($d) => [
            'id'       => 'doc_' . $d->id,
            'title'    => $d->title,
            'type'     => $d->type,
            'section'  => 'Documents',
            'language' => 'EN',
            'status'   => 'published',
            'date'     => $d->created_at->format('d M Y'),
        ]);

        $resources = Resource::orderByDesc('id')->get()->map(fn($r) => [
            'id'       => 'res_' . $r->id,
            'title'    => $r->title,
            'type'     => $r->type,
            'section'  => 'Education',
            'language' => 'EN',
            'status'   => 'published',
            'date'     => $r->created_at->format('d M Y'),
        ]);

        $news = News::where('featured', false)->orderByDesc('id')->get()->map(fn($n) => [
            'id'       => 'news_' . $n->id,
            'title'    => $n->title,
            'type'     => 'NEWS',
            'section'  => 'News',
            'language' => 'EN',
            'status'   => 'published',
            'date'     => $n->date,
        ]);

        $uploads = Upload::orderByDesc('id')->get()->map(fn($u) => [
            'id'       => 'upl_' . $u->id,
            'title'    => $u->title,
            'type'     => $u->type,
            'section'  => $u->section,
            'language' => $u->language,
            'status'   => $u->status,
            'date'     => $u->date,
        ]);

        $all = collect()
            ->merge($uploads)
            ->merge($documents)
            ->merge($resources)
            ->merge($news)
            ->values();

        return response()->json($all);
    }

    public function store(Request $request) {
        $upload = Upload::create($request->all());
        return response()->json(['id' => 'upl_' . $upload->id] + $upload->toArray(), 201);
    }

    public function update(Request $request, $id) {
        [$prefix, $realId] = $this->parseId($id);
        $model = $this->resolveModel($prefix);
        $item  = $model::findOrFail($realId);
        $item->update($this->filterFields($prefix, $request->all()));
        return response()->json($item);
    }

    public function destroy($id) {
        [$prefix, $realId] = $this->parseId($id);
        $model = $this->resolveModel($prefix);
        $model::findOrFail($realId)->delete();
        return response()->json(['deleted' => true]);
    }

    // ── helpers ───────────────────────────────────────────

    private function parseId($id): array {
        $parts = explode('_', $id, 2);
        return count($parts) === 2 ? $parts : ['upl', $id];
    }

    private function resolveModel(string $prefix): string {
        return match($prefix) {
            'doc'  => Document::class,
            'res'  => Resource::class,
            'news' => News::class,
            default => Upload::class,
        };
    }

    // only update fields that exist on each model
    private function filterFields(string $prefix, array $data): array {
        return match($prefix) {
            'doc', 'res' => array_intersect_key($data, array_flip(['title', 'type', 'meta', 'link_text'])),
            'news'       => array_intersect_key($data, array_flip(['title', 'category', 'date', 'icon'])),
            default      => $data,
        };
    }
}