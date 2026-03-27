<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CmsDashboardController;
use App\Http\Controllers\CmsDocumentController;
use App\Http\Controllers\CmsEducationController;
use App\Http\Controllers\CmsNewsController;

// ── existing public endpoints (seeded data) ──
Route::get('/news',           [NewsController::class, 'index']);
Route::get('/news/featured',  [NewsController::class, 'featured']);
Route::get('/documents',      [DocumentController::class, 'index']);
Route::get('/resources',      [ResourceController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
// ── cms dashboard unified table ──
Route::get('/cms',            [CmsDashboardController::class, 'index']);

// ── cms documents ──
Route::get('/cms/documents',                    [CmsDocumentController::class, 'index']);
Route::get('/cms/documents/published',          [CmsDocumentController::class, 'published']);
Route::post('/cms/documents',                   [CmsDocumentController::class, 'store']);
Route::post('/cms/documents/{id}',              [CmsDocumentController::class, 'update']);
Route::put('/cms/documents/{id}/publish',       [CmsDocumentController::class, 'publish']);
Route::delete('/cms/documents/{id}',            [CmsDocumentController::class, 'destroy']);

// ── cms education ──
Route::get('/cms/education',                    [CmsEducationController::class, 'index']);
Route::get('/cms/education/published',          [CmsEducationController::class, 'published']);
Route::post('/cms/education',                   [CmsEducationController::class, 'store']);
Route::post('/cms/education/{id}',              [CmsEducationController::class, 'update']);
Route::put('/cms/education/{id}/publish',       [CmsEducationController::class, 'publish']);
Route::delete('/cms/education/{id}',            [CmsEducationController::class, 'destroy']);

// ── cms news ──
Route::get('/cms/news',                         [CmsNewsController::class, 'index']);
Route::get('/cms/news/published',               [CmsNewsController::class, 'published']);
Route::get('/cms/news/{id}',                    [CmsNewsController::class, 'show']);
Route::post('/cms/news',                        [CmsNewsController::class, 'store']);
Route::post('/cms/news/{id}',                   [CmsNewsController::class, 'update']);
Route::put('/cms/news/{id}/publish',            [CmsNewsController::class, 'publish']);
Route::delete('/cms/news/{id}',                 [CmsNewsController::class, 'destroy']);