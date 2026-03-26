<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\UploadController;

Route::get('/uploads',              [UploadController::class, 'index']);
Route::get('/uploads/published',    [UploadController::class, 'published']);
Route::post('/uploads',             [UploadController::class, 'store']);
Route::put('/uploads/{id}',         [UploadController::class, 'update']);
Route::put('/uploads/{id}/publish', [UploadController::class, 'publish']);
Route::delete('/uploads/{id}',      [UploadController::class, 'destroy']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/featured', [NewsController::class, 'featured']);
Route::get('/documents', [DocumentController::class, 'index']);
Route::get('/resources', [ResourceController::class, 'index']);
