<?php
namespace App\Http\Controllers;

use App\Models\CmsDocument;
use App\Models\CmsEducation;
use App\Models\CmsNews;

class CmsDashboardController extends Controller {
    public function index() {
        $docs = CmsDocument::orderByDesc('id')->get()->map(fn($d) => [
            'id'       => 'doc_' . $d->id,
            'title'    => $d->title,
            'type'     => $d->type,
            'section'  => 'Documents',
            'language' => $d->language,
            'status'   => $d->status,
            'date'     => $d->date,
            'file_url' => $d->file_url,
        ]);

        $edu = CmsEducation::orderByDesc('id')->get()->map(fn($e) => [
            'id'       => 'edu_' . $e->id,
            'title'    => $e->title,
            'type'     => $e->type,
            'section'  => 'Education',
            'language' => $e->language,
            'status'   => $e->status,
            'date'     => $e->date,
            'file_url' => $e->file_url,
        ]);

        $news = CmsNews::orderByDesc('id')->get()->map(fn($n) => [
            'id'        => 'news_' . $n->id,
            'title'     => $n->title,
            'type'      => $n->category,
            'section'   => 'News',
            'language'  => 'EN',
            'status'    => $n->status,
            'date'      => $n->date,
            'image_url' => $n->image_url,
        ]);

        return response()->json(
            collect()->merge($docs)->merge($edu)->merge($news)->values()
        );
    }
}