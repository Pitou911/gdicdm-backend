<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CmsDashboardController;
use App\Http\Controllers\CmsDocumentController;
use App\Http\Controllers\CmsEducationController;
use App\Http\Controllers\CmsNewsController;
use App\Http\Controllers\AuctionResultController;
use App\Http\Controllers\AuctionCalendarController;
use App\Http\Controllers\UserController;

// ── auth ──
Route::post('/login',  [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);
});

// ── public read endpoints ──
Route::get('/news',                       [NewsController::class, 'index']);
Route::get('/news/featured',              [NewsController::class, 'featured']);
Route::get('/news/{id}',                  [NewsController::class, 'show']);
Route::get('/documents',                  [DocumentController::class, 'index']);
Route::get('/resources',                  [ResourceController::class, 'index']);

Route::get('/auction-results',            [AuctionResultController::class, 'index']);
Route::get('/auction-calendar',           [AuctionCalendarController::class, 'index']);

Route::get('/cms',                        [CmsDashboardController::class, 'index']);
Route::get('/cms/documents',              [CmsDocumentController::class, 'index']);
Route::get('/cms/documents/published',    [CmsDocumentController::class, 'published']);
Route::get('/cms/education',              [CmsEducationController::class, 'index']);
Route::get('/cms/education/published',    [CmsEducationController::class, 'published']);
Route::get('/cms/education/{id}/stream',  [CmsEducationController::class, 'stream']);
Route::get('/cms/news',                   [CmsNewsController::class, 'index']);
Route::get('/cms/news/published',         [CmsNewsController::class, 'published']);
Route::get('/cms/news/{id}',              [CmsNewsController::class, 'show']);

// ── protected write endpoints (admin only) ──
Route::middleware('auth:sanctum')->group(function () {
    // auction results
    Route::post('/auction-results',            [AuctionResultController::class, 'store']);
    Route::put('/auction-results/{id}',        [AuctionResultController::class, 'update']);
    Route::delete('/auction-results/{id}',     [AuctionResultController::class, 'destroy']);

    // auction calendar
    Route::post('/auction-calendar',           [AuctionCalendarController::class, 'store']);
    Route::put('/auction-calendar/{id}',       [AuctionCalendarController::class, 'update']);
    Route::delete('/auction-calendar/{id}',    [AuctionCalendarController::class, 'destroy']);

    // cms documents
    Route::post('/cms/documents',              [CmsDocumentController::class, 'store']);
    Route::post('/cms/documents/{id}',         [CmsDocumentController::class, 'update']);
    Route::put('/cms/documents/{id}/publish',  [CmsDocumentController::class, 'publish']);
    Route::delete('/cms/documents/{id}',       [CmsDocumentController::class, 'destroy']);

    // cms education
    Route::post('/cms/education',              [CmsEducationController::class, 'store']);
    Route::post('/cms/education/{id}',         [CmsEducationController::class, 'update']);
    Route::put('/cms/education/{id}/publish',  [CmsEducationController::class, 'publish']);
    Route::delete('/cms/education/{id}',       [CmsEducationController::class, 'destroy']);

    // cms news
    Route::post('/cms/news',                   [CmsNewsController::class, 'store']);
    Route::post('/cms/news/{id}',              [CmsNewsController::class, 'update']);
    Route::put('/cms/news/{id}/publish',       [CmsNewsController::class, 'publish']);
    Route::delete('/cms/news/{id}',            [CmsNewsController::class, 'destroy']);

    // user / account management
    Route::get('/users',                       [UserController::class, 'index']);
    Route::post('/users',                      [UserController::class, 'store']);
    Route::put('/users/{id}/password',         [UserController::class, 'updatePassword']);
    Route::delete('/users/{id}',               [UserController::class, 'destroy']);
});
